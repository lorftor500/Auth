<?php
session_start();

// Инициализация "базы данных" в сессии
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Валидация
if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
    $_SESSION['register_error'] = 'Все поля обязательны для заполнения!';
    $_SESSION['show_register_form'] = true;
    header('Location: index.php');
    exit;
}

if ($password !== $confirm_password) {
    $_SESSION['register_error'] = 'Пароли не совпадают!';
    $_SESSION['show_register_form'] = true;
    header('Location: index.php');
    exit;
}

if (strlen($password) < 6) {
    $_SESSION['register_error'] = 'Пароль должен содержать минимум 6 символов!';
    $_SESSION['show_register_form'] = true;
    header('Location: index.php');
    exit;
}

// Проверка на существование пользователя
foreach ($_SESSION['users'] as $user) {
    if ($user['email'] === $email) {
        $_SESSION['register_error'] = 'Пользователь с таким email уже существует!';
        $_SESSION['show_register_form'] = true;
        header('Location: index.php');
        exit;
    }
}

// Регистрация пользователя
$new_user = [
    'name' => $name,
    'email' => $email,
    'password' => $password
];

$_SESSION['users'][] = $new_user;
$_SESSION['register_success'] = 'Регистрация успешна! Теперь вы можете войти.';
header('Location: index.php');
exit;