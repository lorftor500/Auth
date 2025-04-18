
---

# 🌐 lordtor500 — Авторизация и Регистрация

Простой и адаптивный интерфейс на **HTML/CSS** с поддержкой **PHP и MySQL** для регистрации и авторизации пользователей.

---



## 📁 Структура проекта

```plaintext
temperi/
├── index.html         # Основная страница с формами авторизации и регистрации
├── css/
│   └── styles.css     # Стилизация форм
├── login.php          # Обработка входа пользователя
├── register.php       # Обработка регистрации пользователя
├── db.php             # Подключение к базе данных
└── README.md          # Документация проекта (этот файл)
```

---

## 🚀 Как использовать

1. **Клонируйте репозиторий:**

   ```bash
   git clone https://github.com/твой-юзернейм/lordtor500.git
   cd lordtor500
   ```

2. **Создайте базу данных в MySQL:**

   ```sql
   CREATE DATABASE lordtor500;
   USE lordtor500;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL
   );
   ```

3. **Настройте подключение к базе данных в `db.php`:**

   ```php
   <?php
   $host = 'localhost';
   $db   = 'lordtor500';
   $user = 'root';
   $pass = ''; // или свой пароль

   $conn = new mysqli($host, $user, $pass, $db);

   if ($conn->connect_error) {
       die("Ошибка подключения: " . $conn->connect_error);
   }
   ?>
   ```

4. **Запустите локальный сервер:**

   - С помощью XAMPP / OpenServer / MAMP
   - Или встроенного сервера PHP:

     ```bash
     php -S localhost:8000
     ```

   - Перейдите в браузере: [http://localhost:8000](http://localhost:8000)

---

## ✨ Возможности

- 🔄 Переключение между формами входа и регистрации
- ✅ Валидированные поля
- 🎨 Стильный и адаптивный интерфейс
- 💾 Простая интеграция с MySQL

---

## 🛠 Рекомендации

- Используйте подготовленные SQL-запросы (prepared statements) для безопасности
- Реализуйте сессии (`$_SESSION`) для управления авторизацией
- Добавьте капчу или подтверждение email для предотвращения спама и ботов
- Шифруйте пароли с помощью `password_hash()` и `password_verify()`

---

## 👨‍💻 Автор

**lordtor500 Web Project** — для быстрого старта ваших проектов.

---
