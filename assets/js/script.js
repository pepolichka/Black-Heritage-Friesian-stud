document.addEventListener('DOMContentLoaded', function () {
    var header = document.getElementById('site-header');
    var menuToggle = document.querySelector('.menu-toggle');
    var nav = document.getElementById('site-nav');
    var navLinks = document.querySelectorAll('.nav-link');
    var requestButtons = document.querySelectorAll('.request-horse');
    var horseInterest = document.getElementById('horse_interest');
    var requestSection = document.getElementById('request');
    var preferredDate = document.getElementById('preferred_date');
    var requestForm = document.querySelector('.request-form');
    var formMessage = document.getElementById('form-message');

    function getLocalDate() {
        var now = new Date();
        var local = new Date(now.getTime() - now.getTimezoneOffset() * 60000);
        return local.toISOString().slice(0, 10);
    }

    function updateHeader() {
        if (!header) {
            return;
        }

        header.classList.toggle('scrolled', window.scrollY > 20);
    }

    updateHeader();
    window.addEventListener('scroll', updateHeader);

    if (preferredDate) {
        preferredDate.min = getLocalDate();
    }

    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function () {
            var isOpen = nav.classList.toggle('open');
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            document.body.classList.toggle('menu-open', isOpen);
            header.classList.toggle('menu-active', isOpen);
        });
    }

    navLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            var href = link.getAttribute('href');

            if (!href || href.charAt(0) !== '#') {
                return;
            }

            var target = document.querySelector(href);

            if (!target) {
                return;
            }

            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });

            if (nav && nav.classList.contains('open')) {
                nav.classList.remove('open');
                document.body.classList.remove('menu-open');
                header.classList.remove('menu-active');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    });

    var sections = Array.prototype.slice.call(navLinks)
        .map(function (link) {
            var href = link.getAttribute('href');
            return href && href.charAt(0) === '#' ? document.querySelector(href) : null;
        })
        .filter(Boolean);

    if ('IntersectionObserver' in window) {
        var navObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }

                navLinks.forEach(function (link) {
                    link.classList.toggle('active', link.getAttribute('href') === '#' + entry.target.id);
                });
            });
        }, {
            rootMargin: '-45% 0px -45% 0px',
            threshold: 0,
        });

        sections.forEach(function (section) {
            navObserver.observe(section);
        });

        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
        });

        document.querySelectorAll('.reveal').forEach(function (item) {
            revealObserver.observe(item);
        });
    } else {
        document.querySelectorAll('.reveal').forEach(function (item) {
            item.classList.add('visible');
        });
    }

    document.querySelectorAll('[data-gallery]').forEach(function (gallery) {
        var photos = gallery.querySelectorAll('.gallery-photo');
        var dots = gallery.querySelectorAll('.gallery-dot');
        var prev = gallery.querySelector('[data-gallery-prev]');
        var next = gallery.querySelector('[data-gallery-next]');
        var current = 0;

        function showPhoto(index) {
            if (!photos.length) {
                return;
            }

            current = (index + photos.length) % photos.length;

            photos.forEach(function (photo, photoIndex) {
                photo.classList.toggle('active', photoIndex === current);
            });

            dots.forEach(function (dot, dotIndex) {
                dot.classList.toggle('active', dotIndex === current);
            });
        }

        if (prev) {
            prev.addEventListener('click', function () {
                showPhoto(current - 1);
            });
        }

        if (next) {
            next.addEventListener('click', function () {
                showPhoto(current + 1);
            });
        }

        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                showPhoto(Number(dot.dataset.galleryDot));
            });
        });
    });

    var horseTabs = document.querySelectorAll('[data-horse-tab]');
    var horsePanels = document.querySelectorAll('[data-horse-panel]');

    horseTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var index = tab.dataset.horseTab;

            horseTabs.forEach(function (item) {
                item.classList.toggle('active', item.dataset.horseTab === index);
            });

            horsePanels.forEach(function (panel) {
                panel.classList.toggle('active', panel.dataset.horsePanel === index);
            });
        });
    });

    requestButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var horseName = button.dataset.horse || '';

            if (horseInterest) {
                horseInterest.value = horseName;
                horseInterest.classList.add('field-highlight');
                setTimeout(function () {
                    horseInterest.classList.remove('field-highlight');
                }, 1600);
            }

            if (requestSection) {
                requestSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    if (requestForm) {
        requestForm.addEventListener('submit', function (event) {
            var firstInvalid = null;
            var today = getLocalDate();
            var email = requestForm.querySelector('input[name="email"]');
            var requiredFields = requestForm.querySelectorAll('[required]');
            var messages = [];

            requiredFields.forEach(function (field) {
                var isCheckbox = field.type === 'checkbox';
                var isEmpty = isCheckbox ? !field.checked : field.value.trim() === '';

                if (isEmpty && !firstInvalid) {
                    firstInvalid = field;
                }
            });

            if (firstInvalid) {
                messages.push('Заполните обязательные поля.');
            }

            if (email && email.value.trim() !== '' && !email.checkValidity()) {
                messages.push('Введите корректный email.');
                firstInvalid = firstInvalid || email;
            }

            if (preferredDate && preferredDate.value && preferredDate.value < today) {
                messages.push('Дата просмотра не может быть прошедшей.');
                firstInvalid = firstInvalid || preferredDate;
            }

            if (messages.length > 0) {
                event.preventDefault();

                if (formMessage) {
                    formMessage.textContent = messages.join(' ');
                }

                if (firstInvalid) {
                    firstInvalid.classList.add('field-highlight');
                    firstInvalid.focus();
                    setTimeout(function () {
                        firstInvalid.classList.remove('field-highlight');
                    }, 1600);
                }
            }
        });
    }
});
