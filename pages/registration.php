<?php
require_once '../connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Защита от SQL-инъекций
    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);
    $email = mysqli_real_escape_string($connect, $email);

    $query = "INSERT INTO users (username, password, email, created_at) VALUES ('$username', '$password', '$email', NOW())";

    if (mysqli_query($connect, $query)) {
        echo "Пользователь успешно зарегистрирован!";
        header('Location: authorization.php');
        exit();
    } else {
        echo "Ошибка: " . $query . "<br>" . mysqli_error($connect);
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
        <form method="post" class='reg'>
            <h2>Регистрация</h2>
            <label class="user" for="username">Логин:</label>
            <input type="text" name="username" required>
            <label class="user" for="password">Пароль:</label>
            <input type="password" name="password" minlength="5" required>
            <label class="user" for="email">Почта:</label>
            <input type="email" name="email" required>
            <button type="submit" class="enter">Войти!</button>
        </form>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
