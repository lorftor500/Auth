<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="welcome-container">
            <h1>Добро пожаловать, <?= htmlspecialchars($user['name']) ?>!</h1>
            <p>Вы успешно вошли в систему с email: <?= htmlspecialchars($user['email']) ?></p>
            <a href="logout.php" class="logout-btn">Выйти</a>
        </div>
    </div>
</body>
</html>