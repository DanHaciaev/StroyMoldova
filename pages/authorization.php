<?php
session_start();
require_once '../connection/connection.php';

// Проверка логина и пароля
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Здесь используется "admin" в качестве логина и пароля для демонстрации
    if ($username === 'admin' && $password === 'admin') {
        $_SESSION['isAdminLoggedIn'] = true; // Устанавливаем сессию для админа
        header("Location: main.php"); // Перенаправляем на главную страницу
        exit();
    } else {
        $_SESSION['isAdminLoggedIn'] = false; // Неправильные учетные данные для админа
        header("Location: main.php"); // Перенаправляем на главную страницу
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StroyMoldova</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php' ?>
    <div>
        <form method="post" class='auth'>
            <h2>Авторизация</h2>
            <label class="user" for="username">Логин:</label>
            <input type="text" name="username" required>
            <label class="user" for="password">Пароль:</label>
            <input type="password" name="password" minlength="5" required>
            <button type="submit" class="enter">Войти!</button>
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
