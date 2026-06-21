<?php
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function show_result_page($title, $message, $type, $details = []) {
    ?>
    <!doctype html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= e($title) ?> — Black Heritage Friesian Stud</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="result-page">
        <main class="result-card <?= e($type) ?>">
            <p class="section-label">Black Heritage Friesian Stud</p>
            <h1><?= e($title) ?></h1>
            <p><?= e($message) ?></p>

            <?php if (!empty($details)): ?>
                <ul>
                    <?php foreach ($details as $detail): ?>
                        <li><?= e($detail) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="result-actions">
                <a href="index.php#request" class="btn btn-outline">Вернуться к форме</a>
                <a href="index.php" class="btn btn-primary">На главную</a>
            </div>
        </main>
    </body>
    </html>
    <?php
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    show_result_page('Некорректный запрос', 'Форма должна отправляться методом POST.', 'error');
}

$allowedGoals = ['Спорт', 'Разведение', 'Шоу', 'Частное владение', 'Молодняк'];
$allowedFormats = ['Визит на завод', 'Онлайн-презентация', 'Консультация по подбору'];

$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$horseInterest = trim($_POST['horse_interest'] ?? '');
$goal = trim($_POST['goal'] ?? '');
$viewingFormat = trim($_POST['viewing_format'] ?? '');
$preferredDate = trim($_POST['preferred_date'] ?? '');
$comment = trim($_POST['comment'] ?? '');
$privacyAgreement = isset($_POST['privacy_agreement']);

$errors = [];

if ($name === '') {
    $errors[] = 'Введите имя клиента.';
}

if ($phone === '') {
    $errors[] = 'Введите телефон.';
}

if ($email === '') {
    $errors[] = 'Введите email.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Введите корректный email.';
}

if (!in_array($goal, $allowedGoals, true)) {
    $errors[] = 'Выберите цель подбора из списка.';
}

if (!in_array($viewingFormat, $allowedFormats, true)) {
    $errors[] = 'Выберите формат просмотра из списка.';
}

$dateObject = DateTime::createFromFormat('Y-m-d', $preferredDate);
$dateErrors = DateTime::getLastErrors();

if ($dateErrors === false) {
    $dateErrors = ['warning_count' => 0, 'error_count' => 0];
}

if (!$dateObject || $dateErrors['warning_count'] > 0 || $dateErrors['error_count'] > 0) {
    $errors[] = 'Выберите корректную дату.';
} else {
    $today = new DateTime('today');
    if ($dateObject < $today) {
        $errors[] = 'Дата просмотра не может быть прошедшей.';
    }
}

if (!$privacyAgreement) {
    $errors[] = 'Необходимо согласие на обработку персональных данных.';
}

if (!empty($errors)) {
    show_result_page('Заявка не отправлена', 'Проверьте данные формы и попробуйте снова.', 'error', $errors);
}

require __DIR__ . '/includes/db.php';

if ($pdo === null) {
    show_result_page('Заявка не отправлена', 'Сейчас не удалось подключиться к базе данных. Проверьте настройки MySQL в includes/db.php.', 'error');
}

try {
    $sql = 'INSERT INTO viewing_requests
        (name, phone, email, horse_interest, goal, viewing_format, preferred_date, comment, privacy_agreement)
        VALUES
        (:name, :phone, :email, :horse_interest, :goal, :viewing_format, :preferred_date, :comment, :privacy_agreement)';

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':horse_interest' => $horseInterest,
        ':goal' => $goal,
        ':viewing_format' => $viewingFormat,
        ':preferred_date' => $preferredDate,
        ':comment' => $comment,
        ':privacy_agreement' => $privacyAgreement,
    ]);

    show_result_page('Заявка отправлена', 'Спасибо! Мы получили заявку и свяжемся с вами для уточнения деталей просмотра.', 'success');
} catch (PDOException $exception) {
    show_result_page('Заявка не отправлена', 'Не удалось сохранить заявку. Попробуйте позже или проверьте подключение к базе данных.', 'error');
}
