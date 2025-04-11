<?php
session_start();

// Простая "база данных" в сессии
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Поиск пользователя
$user = null;
foreach ($_SESSION['users'] as $u) {
    if ($u['email'] === $email && $u['password'] === $password) {
        $user = $u;
        break;
    }
}

if ($user) {
    $_SESSION['user'] = $user;
    header('Location: welcome.php');
} else {
    $_SESSION['login_error'] = 'Неверный email или пароль!';
    header('Location: index.php');
}
exit;