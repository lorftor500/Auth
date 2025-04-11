<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: welcome.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-btns">
                <button class="btn active" id="loginBtn">Вход</button>
                <button class="btn" id="registerBtn">Регистрация</button>
            </div>
            
            <form id="loginForm" class="form active-form" action="auth.php" method="POST">
                <h2>Авторизация</h2>
                <?php if (isset($_SESSION['login_error'])): ?>
                    <div class="message error"><?= $_SESSION['login_error'] ?></div>
                    <?php unset($_SESSION['login_error']); ?>
                <?php endif; ?>
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="email" id="loginEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Пароль</label>
                    <input type="password" id="loginPassword" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Войти</button>
            </form>
            
            <form id="registerForm" class="form" action="register.php" method="POST">
                <h2>Регистрация</h2>
                <?php if (isset($_SESSION['register_error'])): ?>
                    <div class="message error"><?= $_SESSION['register_error'] ?></div>
                    <?php unset($_SESSION['register_error']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['register_success'])): ?>
                    <div class="message success"><?= $_SESSION['register_success'] ?></div>
                    <?php unset($_SESSION['register_success']); ?>
                <?php endif; ?>
                <div class="form-group">
                    <label for="regName">Имя</label>
                    <input type="text" id="regName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="regEmail">Email</label>
                    <input type="email" id="regEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="regPassword">Пароль</label>
                    <input type="password" id="regPassword" name="password" required>
                </div>
                <div class="form-group">
                    <label for="regConfirmPassword">Подтвердите пароль</label>
                    <input type="password" id="regConfirmPassword" name="confirm_password" required>
                </div>
                <button type="submit" class="submit-btn">Зарегистрироваться</button>
            </form>
        </div>
    </div>

    <script>
        // Переключение между формами
        const loginBtn = document.getElementById('loginBtn');
        const registerBtn = document.getElementById('registerBtn');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        
        loginBtn.addEventListener('click', () => {
            loginBtn.classList.add('active');
            registerBtn.classList.remove('active');
            loginForm.classList.add('active-form');
            registerForm.classList.remove('active-form');
        });
        
        registerBtn.addEventListener('click', () => {
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');
            registerForm.classList.add('active-form');
            loginForm.classList.remove('active-form');
        });

        // Показать форму с сообщением об ошибке/успехе
        <?php if (isset($_SESSION['show_register_form'])): ?>
            registerBtn.click();
            <?php unset($_SESSION['show_register_form']); ?>
        <?php endif; ?>
    </script>
</body>
</html>