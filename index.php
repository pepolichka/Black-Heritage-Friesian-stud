<?php
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function asset_path($folder, $filename) {
    $path = $folder . '/' . $filename;

    if (is_file(__DIR__ . '/' . $path)) {
        return $path;
    }

    $patternName = str_replace('й', '*', $filename);
    $matches = glob(__DIR__ . '/' . $folder . '/' . $patternName);

    if (!empty($matches) && is_file($matches[0])) {
        return $folder . '/' . basename($matches[0]);
    }

    return '';
}

function render_image($src, $alt, $class = '') {
    if ($src !== '') {
        echo '<img src="' . e($src) . '" alt="' . e($alt) . '" class="' . e($class) . '">';
        return;
    }

    echo '<div class="image-placeholder ' . e($class) . '" role="img" aria-label="' . e($alt) . '">Изображение скоро будет</div>';
}

$navItems = [
    ['href' => '#home', 'label' => 'Главная'],
    ['href' => '#about', 'label' => 'О нас'],
    ['href' => '#horses', 'label' => 'На продажу'],
    ['href' => '#stallions', 'label' => 'Производители'],
    ['href' => '#contacts', 'label' => 'Контакты'],
];

$aboutCards = [
    ['title' => 'Селекция', 'text' => 'Подбор пар по происхождению, типу, движению и характеру будущего потомства.'],
    ['title' => 'KFPS', 'text' => 'Ориентация на стандарты Studbook, инспекции, линии Ster, Sport и Preferent.'],
    ['title' => 'Здоровье', 'text' => 'Регулярный ветеринарный контроль, прозрачные Vet Check и документы по запросу.'],
    ['title' => 'Содержание', 'text' => 'Просторные денники, выгулы, тренинг, уход и спокойная среда для роста.'],
];

$facilityImages = [
    ['file' => 'онас.png', 'alt' => 'Главный корпус Black Heritage Friesian Stud'],
    ['file' => 'охозяйстве платц.png', 'alt' => 'Плац для работы фризских лошадей'],
    ['file' => 'охозяйствевыгул.png', 'alt' => 'Выгул для лошадей'],
    ['file' => 'охозяйстведенники.png', 'alt' => 'Премиальные денники'],
    ['file' => 'охозяйствеспа.png', 'alt' => 'Зона ухода и восстановления'],
];

$horses = [
    [
        'name' => 'BH ECLIPSE',
        'status' => 'KFPS / Ster / Sport',
        'year' => '2019',
        'sex' => 'жеребец',
        'color' => 'вороной',
        'height' => '168 см',
        'origin' => 'Gjalt 426 x Olof 315',
        'direction' => 'выездка / шоу / разведение',
        'character' => 'уравновешенный, контактный, работоспособный',
        'vet' => 'доступен по запросу',
        'sale' => 'в продаже',
        'description' => 'Выразительный фризский жеребец с сильным типом, правильной линией верха и мощным движением. Отличается стабильным характером, обучаемостью и потенциалом для выездки, шоу и племенной работы.',
        'icon' => asset_path('images', 'конь№1иконка.png'),
        'photos' => [
            asset_path('images', 'конь№1(1).png'),
            asset_path('images', 'конь№1(2).png'),
            asset_path('images', 'конь№1(3).png'),
        ],
    ],
    [
        'name' => 'BH AMADEUS',
        'status' => 'KFPS / Ster / Preferent',
        'year' => '2020',
        'sex' => 'жеребец',
        'color' => 'вороной',
        'height' => '166 см',
        'origin' => 'Julius 486 x Tsjalle 454',
        'direction' => 'разведение / Dressage',
        'character' => 'смелый, внимательный, быстро включается в работу',
        'vet' => 'полный пакет доступен',
        'sale' => 'резерв открыт',
        'description' => 'Элегантный молодой жеребец с хорошим импульсом, сухими ногами и выразительной шеей. Подходит для владельца, который ищет перспективу в спорте и племенной программе.',
        'icon' => asset_path('images', 'конь№2иконка.png'),
        'photos' => [
            asset_path('images', 'конь№2(1).png'),
            asset_path('images', 'конь№2(2).png'),
            asset_path('images', 'конь№2(3).png'),
        ],
    ],
    [
        'name' => 'BH VALOR',
        'status' => 'KFPS / Ster / Sport',
        'year' => '2018',
        'sex' => 'мерин',
        'color' => 'вороной',
        'height' => '169 см',
        'origin' => 'Alwin 469 x Doaitsen 420',
        'direction' => 'выездка / шоу',
        'character' => 'спокойный, честный, уверенный',
        'vet' => 'доступен по запросу',
        'sale' => 'в продаже',
        'description' => 'Надежный партнер для любительского и профессионального маршрута. Имеет ровные аллюры, хорошую базовую подготовку и уверенно работает в новой обстановке.',
        'icon' => asset_path('images', 'конь№3иконка.png'),
        'photos' => [
            asset_path('images', 'конь№3(1).png'),
            asset_path('images', 'конь№3(2).png'),
            asset_path('images', 'конь№3(3).png'),
        ],
    ],
    [
        'name' => 'BH MAGNUS',
        'status' => 'KFPS / Studbook / ABFP',
        'year' => '2021',
        'sex' => 'жеребец',
        'color' => 'вороной',
        'height' => '164 см',
        'origin' => 'Fonger 478 x Norbert 444',
        'direction' => 'спорт / инспекции',
        'character' => 'энергичный, любознательный, яркий',
        'vet' => 'базовый Vet Check пройден',
        'sale' => 'по запросу',
        'description' => 'Молодой фриз с большим шагом, активной рысью и выразительным присутствием. Рассматривается как перспективный проект для ABFP, IBOP и дальнейшей спортивной подготовки.',
        'icon' => asset_path('images', 'конь№4иконка.png'),
        'photos' => [
            asset_path('images', 'конь№4(1).png'),
            asset_path('images', 'конь№4(2).png'),
            asset_path('images', 'конь№4(3).png'),
        ],
    ],
    [
        'name' => 'BH RAVENNA',
        'status' => 'KFPS / Ster Mare',
        'year' => '2017',
        'sex' => 'кобыла',
        'color' => 'вороная',
        'height' => '165 см',
        'origin' => 'Beart 411 x Anton 343',
        'direction' => 'разведение / частное владение',
        'character' => 'мягкая, спокойная, ориентирована на человека',
        'vet' => 'доступен по запросу',
        'sale' => 'в продаже',
        'description' => 'Породная кобыла с сильной материнской линией, хорошим корпусом и приятным темпераментом. Подходит для племенной программы и комфортного частного владения.',
        'icon' => asset_path('images', 'конь№5иконка.png'),
        'photos' => [
            asset_path('images', 'конь№5(1).png'),
            asset_path('images', 'конь№5(2).png'),
            asset_path('images', 'конь№5(3).png'),
        ],
    ],
    [
        'name' => 'BH CELESTE',
        'status' => 'KFPS / Crown Prospect',
        'year' => '2022',
        'sex' => 'кобыла',
        'color' => 'вороная',
        'height' => '162 см',
        'origin' => 'Tiede 501 x Jasper 366',
        'direction' => 'молодняк / разведение',
        'character' => 'деликатная, контактная, пластичная',
        'vet' => 'первичный осмотр пройден',
        'sale' => 'в продаже',
        'description' => 'Перспективная молодая кобыла с красивой линией верха, мягким выражением и легким движением. Хороший вариант для будущего разведения и бережной спортивной подготовки.',
        'icon' => asset_path('images', 'конь№6иконка.png'),
        'photos' => [
            asset_path('images', 'конь№6(1).png'),
            asset_path('images', 'конь№6(2).png'),
            asset_path('images', 'конь№6(3).png'),
        ],
    ],
];

$stallions = [
    [
        'name' => 'BH IMPERATOR',
        'status' => 'KFPS / Approved Stallion / Preferent',
        'origin' => 'Teun 505 x Beart 411',
        'achievements' => 'IBOP 86.5, ABFP finalist, CDI Small Tour, FEI Dressage results',
        'value' => 'Передает сильный верх, активный зад и выразительный породный тип.',
        'description' => 'Флагман племенной программы Black Heritage. Используется для кобыл, которым нужно усилить движение, рамку и спортивную перспективу.',
        'image' => asset_path('images', 'наши_производители№1.png'),
    ],
    [
        'name' => 'BH MAXIMUS',
        'status' => 'KFPS / Ster / Sport',
        'origin' => 'Tsjalle 454 x Jasper 366',
        'achievements' => 'Grand Prix training, IBOP, стабильные оценки экстерьера',
        'value' => 'Добавляет рост, мощь корпуса и устойчивую психику.',
        'description' => 'Производитель с сильной линией движения и спокойным характером. Подходит для спортивных кобыл и программ Dressage.',
        'image' => asset_path('images', 'наши_производители№2.png'),
    ],
    [
        'name' => 'BH DOMINION',
        'status' => 'KFPS / Studbook / Sport',
        'origin' => 'Nane 492 x Olof 315',
        'achievements' => 'FEI young horse classes, ABFP, высокий балл за рысь',
        'value' => 'Улучшает баланс, шею, линию плеча и работоспособность.',
        'description' => 'Современный тип фризского жеребца для кобыл, которым требуется больше легкости и гибкости без потери породы.',
        'image' => asset_path('images', 'наши_производители№3.png'),
    ],
    [
        'name' => 'BH OBSIDIAN',
        'status' => 'KFPS / Ster / Preferent Prospect',
        'origin' => 'Hessel 480 x Doaitsen 420',
        'achievements' => 'IBOP, региональные шоу, стабильно высокий Vet Check',
        'value' => 'Передает выразительную голову, хорошую спину и спокойный темперамент.',
        'description' => 'Жеребец с мягким характером и чистым, породным силуэтом. Используется для частных программ и сохранения классического типа.',
        'image' => asset_path('images', 'наши_производители№4.png'),
    ],
];

$youngstock = [
    ['name' => 'BH ONYX', 'year' => '2024', 'sex' => 'жеребчик', 'origin' => 'BH Imperator x Ster mare', 'prospect' => 'Dressage / Studbook', 'description' => 'Сильный корпус, смелый шаг и ранняя контактность.', 'image' => asset_path('images', 'жеребенок№1.png')],
    ['name' => 'BH SERAPHINA', 'year' => '2024', 'sex' => 'кобылка', 'origin' => 'BH Maximus x Crown mare', 'prospect' => 'Ster prospect', 'description' => 'Легкая, женственная кобылка с мягким характером.', 'image' => asset_path('images', 'жеребенок№2.png')],
    ['name' => 'BH ASTORIA', 'year' => '2023', 'sex' => 'кобылка', 'origin' => 'BH Dominion x Model mare', 'prospect' => 'Breeding / Show', 'description' => 'Породный тип, хороший верх и выразительный перед.', 'image' => asset_path('images', 'жеребенок№3.png')],
    ['name' => 'BH CALYPSO', 'year' => '2023', 'sex' => 'жеребчик', 'origin' => 'BH Obsidian x Ster mare', 'prospect' => 'Sport prospect', 'description' => 'Активная рысь, стабильная психика и интерес к работе.', 'image' => asset_path('images', 'жеребенок№4.png')],
    ['name' => 'BH SIRIUS', 'year' => '2024', 'sex' => 'жеребчик', 'origin' => 'BH Imperator x Preferent line', 'prospect' => 'ABFP / Dressage', 'description' => 'Крупный формат, сильный толчок и уверенное поведение.', 'image' => asset_path('images', 'жеребенок№5.png')],
    ['name' => 'BH VIVIENNE', 'year' => '2024', 'sex' => 'кобылка', 'origin' => 'BH Maximus x Ster mare', 'prospect' => 'Breeding prospect', 'description' => 'Нежный тип, правильные ноги и спокойная социализация.', 'image' => asset_path('images', 'жеребенок№6.png')],
];

$services = [
    ['title' => 'Племенное разведение', 'text' => 'Отбор по стандартам KFPS, происхождению, экстерьеру и движению.', 'icon' => asset_path('icons', 'иконкаплеменноеразведение.png')],
    ['title' => 'Покрытие и ИИ', 'text' => 'Свежее и замороженное семя от проверенных производителей.', 'icon' => asset_path('icons', 'иконкапокрытие.png')],
    ['title' => 'Эмбриотрансфер', 'text' => 'Современные репродуктивные технологии.', 'icon' => asset_path('icons', 'иконкаэмбриотрансфер.png')],
    ['title' => 'Продажа лошадей', 'text' => 'Подбор фризских лошадей для спорта, разведения и частного владения.', 'icon' => asset_path('icons', 'иконкапродажалошадей.png')],
    ['title' => 'Подготовка к показам', 'text' => 'Подготовка к IBOP, ABFP, инспекциям и шоу.', 'icon' => asset_path('icons', 'иконкаподготовкакпоказам.png')],
    ['title' => 'Консультации', 'text' => 'Сопровождение при выборе пары, покупке и подборе лошади.', 'icon' => asset_path('icons', 'иконкаконсультации.png')],
];

$achievements = [
    ['number' => '30+', 'label' => 'лет опыта'],
    ['number' => '120+', 'label' => 'племенных кобыл'],
    ['number' => '25+', 'label' => 'утвержденных жеребцов'],
    ['number' => '900+', 'label' => 'потомков по миру'],
    ['number' => '85%', 'label' => 'Ster / Sport в приплоде'],
    ['number' => '15+', 'label' => 'стран-клиентов'],
];

$advantages = [
    ['title' => 'KFPS-ориентированное разведение', 'text' => 'Пары подбираются с учетом Studbook, типа, движения и материнских линий.', 'icon' => asset_path('icons', 'иконкакфпс.png')],
    ['title' => 'Элитные материнские линии', 'text' => 'В работе используются кобылы Ster, Crown, Model и Preferent-линий.', 'icon' => asset_path('icons', 'иконкаматлинии.png')],
    ['title' => 'Полная ветеринарная прозрачность', 'text' => 'Документы, снимки, Vet Check и история наблюдений доступны покупателю.', 'icon' => asset_path('icons', 'иконкаветеринарная.png')],
    ['title' => 'Подготовка к спорту и инспекциям', 'text' => 'Лошади готовятся к IBOP, ABFP, шоу и начальной спортивной работе.', 'icon' => asset_path('icons', 'иконкаподготовка.png')],
    ['title' => 'Премиальное содержание', 'text' => 'Денники, выгул, тренинг, восстановление и уход объединены в одну систему.', 'icon' => asset_path('icons', 'иконкасодержание.png')],
];

$goals = ['Спорт', 'Разведение', 'Шоу', 'Частное владение', 'Молодняк'];
$viewingFormats = ['Визит на завод', 'Онлайн-презентация', 'Консультация по подбору'];

$heroImage = asset_path('images', 'главное выездка.png');
$achievementImage = asset_path('images', 'достижение.png');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Heritage Friesian Stud</title>
    <meta name="description" content="Учебное веб-приложение для племенного завода фризских лошадей Black Heritage Friesian Stud.">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="site-header" id="site-header">
        <div class="header-inner">
            <a href="#home" class="brand" aria-label="Black Heritage Friesian Stud">
                <span>Black Heritage</span>
                <small>Friesian Stud</small>
            </a>

            <button class="menu-toggle" type="button" aria-label="Открыть меню" aria-controls="site-nav" aria-expanded="false">☰</button>

            <nav class="site-nav" id="site-nav">
                <?php foreach ($navItems as $item): ?>
                    <a href="<?= e($item['href']) ?>" class="nav-link"><?= e($item['label']) ?></a>
                <?php endforeach; ?>
            </nav>

            <a href="#request" class="btn btn-outline header-action">Запросить просмотр</a>
        </div>
    </header>

    <main>
        <section class="hero section-dark" id="home">
            <div class="hero-backdrop">
                <?php render_image($heroImage, 'Фризская лошадь в выездке на главном экране', 'hero-image'); ?>
            </div>
            <div class="hero-content reveal">
                <p class="eyebrow">Friesian · KFPS · Excellence</p>
                <h1>Наследие в крови. Сила в движении. Престиж в типе.</h1>
                <p class="hero-text">Black Heritage Friesian Stud — племенной завод фризских лошадей, где селекция, экстерьер, движение и характер объединяются в лошадях высокого класса.</p>
                <div class="hero-actions">
                    <a href="#horses" class="btn btn-primary">Смотреть лошадей</a>
                    <a href="#request" class="btn btn-outline">Запросить частный просмотр</a>
                </div>
            </div>
        </section>

        <section class="section about-section" id="about">
            <div class="container">
                <div class="section-heading reveal">
                    <p class="section-label">О заводе</p>
                    <h2>О хозяйстве</h2>
                </div>

                <div class="about-grid reveal">
                    <div class="about-text">
                        <p>Black Heritage Friesian Stud — частный племенной завод, специализирующийся на разведении фризских лошадей премиального уровня. В основе работы — подбор кровных линий, контроль здоровья, выращивание, подготовка к спортивной и племенной карьере.</p>
                        <p>Мы уделяем особое внимание экстерьеру, качеству движения, темпераменту и обучаемости. Каждая лошадь проходит постепенное развитие от раннего воспитания и работы в руках до подготовки под седлом, участия в показах, инспекциях и выездковых тренировках.</p>
                        <a href="#services" class="btn btn-outline">Узнать больше о нас</a>
                    </div>
                    <div class="about-main-photo">
                        <?php render_image(asset_path('images', 'онас.png'), 'Территория племенного завода Black Heritage Friesian Stud', 'cover-image'); ?>
                    </div>
                </div>

                <div class="about-cards">
                    <?php foreach ($aboutCards as $card): ?>
                        <article class="small-card reveal">
                            <h3><?= e($card['title']) ?></h3>
                            <p><?= e($card['text']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>

                <div class="facility-strip reveal">
                    <?php foreach (array_slice($facilityImages, 1) as $image): ?>
                        <figure>
                            <?php render_image(asset_path('images', $image['file']), $image['alt'], 'cover-image'); ?>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section horses-section section-black" id="horses">
            <div class="container">
                <div class="section-heading reveal">
                    <p class="section-label">Каталог</p>
                    <h2>Лошади на продажу</h2>
                    <p>Каждая лошадь проходит тщательный отбор по происхождению, экстерьеру, темпераменту и качеству движения. Данные используются как демонстрационное наполнение учебного проекта.</p>
                </div>

                <div class="horse-catalog reveal">
                    <div class="horse-tabs" aria-label="Список лошадей на продажу">
                        <?php foreach ($horses as $index => $horse): ?>
                            <button class="horse-tab <?= $index === 0 ? 'active' : '' ?>" type="button" data-horse-tab="<?= $index ?>">
                                <?php render_image($horse['icon'], 'Иконка лошади ' . $horse['name'], 'horse-tab-icon'); ?>
                                <span>
                                    <strong><?= e($horse['name']) ?></strong>
                                    <small><?= e($horse['year']) ?> · <?= e($horse['status']) ?></small>
                                </span>
                            </button>
                        <?php endforeach; ?>
                    </div>

                    <div class="horse-panels">
                        <?php foreach ($horses as $index => $horse): ?>
                            <article class="horse-panel <?= $index === 0 ? 'active' : '' ?>" data-horse-panel="<?= $index ?>">
                                <div class="horse-gallery" data-gallery>
                                    <button class="gallery-btn gallery-prev" type="button" data-gallery-prev aria-label="Предыдущее фото">‹</button>
                                    <div class="gallery-window">
                                        <?php foreach ($horse['photos'] as $photoIndex => $photo): ?>
                                            <?php render_image($photo, 'Фото ' . $horse['name'] . ' ' . ($photoIndex + 1), 'gallery-photo ' . ($photoIndex === 0 ? 'active' : '')); ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <button class="gallery-btn gallery-next" type="button" data-gallery-next aria-label="Следующее фото">›</button>
                                    <div class="gallery-dots">
                                        <?php foreach ($horse['photos'] as $photoIndex => $photo): ?>
                                            <button type="button" class="gallery-dot <?= $photoIndex === 0 ? 'active' : '' ?>" data-gallery-dot="<?= $photoIndex ?>" aria-label="Фото <?= $photoIndex + 1 ?>"></button>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="horse-details">
                                    <p class="section-label"><?= e($horse['sale']) ?></p>
                                    <h3><?= e($horse['name']) ?></h3>
                                    <dl>
                                        <div><dt>Статус</dt><dd><?= e($horse['status']) ?></dd></div>
                                        <div><dt>Год рождения</dt><dd><?= e($horse['year']) ?></dd></div>
                                        <div><dt>Пол</dt><dd><?= e($horse['sex']) ?></dd></div>
                                        <div><dt>Масть</dt><dd><?= e($horse['color']) ?></dd></div>
                                        <div><dt>Рост</dt><dd><?= e($horse['height']) ?></dd></div>
                                        <div><dt>Происхождение</dt><dd><?= e($horse['origin']) ?></dd></div>
                                        <div><dt>Направление</dt><dd><?= e($horse['direction']) ?></dd></div>
                                        <div><dt>Характер</dt><dd><?= e($horse['character']) ?></dd></div>
                                        <div><dt>Vet Check</dt><dd><?= e($horse['vet']) ?></dd></div>
                                    </dl>
                                    <p><?= e($horse['description']) ?></p>
                                    <button type="button" class="btn btn-primary request-horse" data-horse="<?= e($horse['name']) ?>">Запросить просмотр</button>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="section stallions-section" id="stallions">
            <div class="container">
                <div class="section-heading centered reveal">
                    <p class="section-label">Племенная программа</p>
                    <h2>Наши производители</h2>
                    <p>Производители подбираются по KFPS-документам, результатам IBOP и ABFP, спортивной перспективе, Vet Check и качеству потомства.</p>
                </div>

                <div class="stallion-list">
                    <?php foreach ($stallions as $stallion): ?>
                        <article class="stallion-card reveal">
                            <div class="stallion-photo">
                                <?php render_image($stallion['image'], 'Производитель ' . $stallion['name'], 'cover-image'); ?>
                            </div>
                            <div class="stallion-info">
                                <p class="section-label"><?= e($stallion['status']) ?></p>
                                <h3><?= e($stallion['name']) ?></h3>
                                <dl>
                                    <div><dt>Происхождение</dt><dd><?= e($stallion['origin']) ?></dd></div>
                                    <div><dt>Достижения</dt><dd><?= e($stallion['achievements']) ?></dd></div>
                                    <div><dt>Племенная ценность</dt><dd><?= e($stallion['value']) ?></dd></div>
                                </dl>
                                <p><?= e($stallion['description']) ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section youngstock-section" id="youngstock">
            <div class="container">
                <div class="section-heading centered reveal">
                    <p class="section-label">жеребята</p>
                    <h2>Молодняк</h2>
                    <p>Молодняк выращивается в спокойных условиях, проходит раннюю социализацию, привыкает к человеку, уходу, движению в руках и базовой работе.</p>
                </div>

                <div class="card-grid youngstock-grid">
                    <?php foreach ($youngstock as $young): ?>
                        <article class="young-card reveal">
                            <div class="young-photo">
                                <?php render_image($young['image'], 'Молодняк ' . $young['name'], 'cover-image'); ?>
                            </div>
                            <div class="card-body">
                                <h3><?= e($young['name']) ?></h3>
                                <p class="muted"><?= e($young['year']) ?> · <?= e($young['sex']) ?></p>
                                <p><strong>Происхождение:</strong> <?= e($young['origin']) ?></p>
                                <p><strong>Перспектива:</strong> <?= e($young['prospect']) ?></p>
                                <p><?= e($young['description']) ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section services-section section-black" id="services">
            <div class="container">
                <div class="section-heading reveal">
                    <p class="section-label">Сопровождение</p>
                    <h2>Услуги</h2>
                </div>

                <div class="service-grid">
                    <?php foreach ($services as $service): ?>
                        <article class="service-card reveal">
                            <?php render_image($service['icon'], 'Иконка услуги ' . $service['title'], 'service-icon'); ?>
                            <h3><?= e($service['title']) ?></h3>
                            <p><?= e($service['text']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="achievements" id="achievements">
            <div class="achievement-bg">
                <?php render_image($achievementImage, 'Достижения Black Heritage Friesian Stud', 'achievement-image'); ?>
            </div>
            <div class="container achievement-content reveal">
                <div class="section-heading">
                    <p class="section-label">Достижения</p>
                    <h2>Селекция, подтвержденная результатами</h2>
                    <p>Достижения Black Heritage Friesian Stud — это результат многолетней селекционной работы, внимательного отбора производителей и системного подхода к выращиванию фризских лошадей. Данные используются как демонстрационное наполнение учебного проекта.</p>
                </div>

                <div class="achievement-grid">
                    <?php foreach ($achievements as $item): ?>
                        <div class="achievement-item">
                            <strong><?= e($item['number']) ?></strong>
                            <span><?= e($item['label']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section advantages-section" id="advantages">
            <div class="container">
                <div class="section-heading reveal">
                    <p class="section-label">Преимущества</p>
                    <h2>Почему выбирают нас</h2>
                </div>

                <div class="advantage-grid">
                    <?php foreach ($advantages as $advantage): ?>
                        <article class="advantage-card reveal">
                            <?php render_image($advantage['icon'], 'Иконка преимущества ' . $advantage['title'], 'advantage-icon'); ?>
                            <h3><?= e($advantage['title']) ?></h3>
                            <p><?= e($advantage['text']) ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section request-section" id="request">
            <div class="container request-grid">
                <div class="request-copy reveal">
                    <p class="section-label">Частный просмотр и подбор лошади</p>
                    <h2>Отправьте заявку</h2>
                    <p>Оставьте заявку на частный просмотр, подбор лошади или консультацию по племенной программе. Мы свяжемся с вами, уточним цели и предложим подходящие варианты.</p>
                    <div class="contact-note">
                        <p><strong>Телефон:</strong> +7 (901) 909-90-99</p>
                        <p><strong>E-mail:</strong> info@blackheritage.ru</p>
                        <p><strong>Адрес:</strong> Московская область, Россия</p>
                        <p><strong>График:</strong> ежедневно с 09:00 до 20:00</p>
                    </div>
                </div>

                <form class="request-form reveal" action="save_request.php" method="post" novalidate>
                    <div class="form-row">
                        <label for="name">Ваше имя *</label>
                        <input type="text" id="name" name="name" required placeholder="Введите ваше имя">
                    </div>

                    <div class="form-row">
                        <label for="phone">Телефон *</label>
                        <input type="tel" id="phone" name="phone" required placeholder="+7 999 000-00-00">
                    </div>

                    <div class="form-row">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required placeholder="example@mail.ru">
                    </div>

                    <div class="form-row">
                        <label for="horse_interest">Интересующая лошадь</label>
                        <input type="text" id="horse_interest" name="horse_interest" placeholder="Можно выбрать из каталога">
                    </div>

                    <div class="form-row">
                        <label for="goal">Цель подбора *</label>
                        <select id="goal" name="goal" required>
                            <option value="">Выберите цель</option>
                            <?php foreach ($goals as $goal): ?>
                                <option value="<?= e($goal) ?>"><?= e($goal) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="viewing_format">Формат просмотра *</label>
                        <select id="viewing_format" name="viewing_format" required>
                            <option value="">Выберите формат</option>
                            <?php foreach ($viewingFormats as $format): ?>
                                <option value="<?= e($format) ?>"><?= e($format) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="preferred_date">Удобная дата *</label>
                        <input type="date" id="preferred_date" name="preferred_date" required>
                    </div>

                    <div class="form-row form-wide">
                        <label for="comment">Комментарий</label>
                        <textarea id="comment" name="comment" rows="4" placeholder="Расскажите, какая лошадь вам нужна"></textarea>
                    </div>

                    <label class="check-row form-wide">
                        <input type="checkbox" name="privacy_agreement" value="1" required>
                        <span>Я согласна на обработку персональных данных *</span>
                    </label>

                    <button type="submit" class="btn btn-primary form-wide">Запросить частный просмотр</button>
                    <p class="form-message" id="form-message" aria-live="polite"></p>
                </form>
            </div>
        </section>
    </main>

    <footer class="site-footer" id="contacts">
        <div class="container footer-grid">
            <div>
                <h2>Black Heritage Friesian Stud</h2>
                <p>Племенной завод фризских лошадей премиального уровня.</p>
            </div>
            <div>
                <h3>Контакты</h3>
                <p>+7 (901) 909-90-99</p>
                <p>info@blackheritage.ru</p>
                <p>Московская область, Россия</p>
            </div>
            <div>
                <h3>Разделы</h3>
                <?php foreach ($navItems as $item): ?>
                    <a href="<?= e($item['href']) ?>"><?= e($item['label']) ?></a>
                <?php endforeach; ?>
                <a href="admin.php">Административная страница</a>
            </div>
        </div>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
