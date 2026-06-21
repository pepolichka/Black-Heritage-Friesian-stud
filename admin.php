<?php
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

require __DIR__ . '/includes/db.php';

$requests = [];
$loadError = false;

if ($pdo === null) {
    $loadError = true;
} else {
    try {
        $stmt = $pdo->query('SELECT id, name, phone, email, horse_interest, goal, viewing_format, preferred_date, comment, created_at FROM viewing_requests ORDER BY created_at DESC');
        $requests = $stmt->fetchAll();
    } catch (PDOException $exception) {
        $loadError = true;
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная страница — Black Heritage Friesian Stud</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="admin-page">
    <main class="admin-shell">
        <div class="admin-header">
            <div>
                <p class="section-label">Учебная административная страница</p>
                <h1>Заявки на частный просмотр</h1>
            </div>
            <a href="index.php" class="btn btn-outline">Вернуться на сайт</a>
        </div>

        <?php if ($loadError): ?>
            <div class="admin-message error">Не удалось загрузить заявки. Проверьте подключение к базе данных.</div>
        <?php elseif (empty($requests)): ?>
            <div class="admin-message">Заявок пока нет.</div>
        <?php else: ?>
            <div class="table-wrap">
                <table class="requests-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Интересующая лошадь</th>
                            <th>Цель подбора</th>
                            <th>Формат просмотра</th>
                            <th>Удобная дата</th>
                            <th>Комментарий</th>
                            <th>Дата создания</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requests as $request): ?>
                            <tr>
                                <td><?= e($request['id']) ?></td>
                                <td><?= e($request['name']) ?></td>
                                <td><?= e($request['phone']) ?></td>
                                <td><?= e($request['email']) ?></td>
                                <td><?= e($request['horse_interest'] ?: 'Не указана') ?></td>
                                <td><?= e($request['goal']) ?></td>
                                <td><?= e($request['viewing_format']) ?></td>
                                <td><?= e($request['preferred_date']) ?></td>
                                <td><?= e($request['comment'] ?: 'Без комментария') ?></td>
                                <td><?= e($request['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
