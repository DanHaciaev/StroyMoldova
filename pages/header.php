<?php
require_once '../connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $categories = mysqli_query($connect, "SELECT * FROM `categories`");
    $categories = mysqli_fetch_all($categories);
    ?>
    <div class="header"> <!-- Эмблема -->
        <div class="emblem">
            <a href="main.php"><img width="100px" height="100px" src="../img/logo.svg" alt="Something went wrong..."></a>
        </div>

        <hr class="header_hr">

        <div class="details_of_header"><!-- Основная часть header-а -->
            <div>
                <button id="openCatalog">
                    <img width="20px" height="20px" src="../img/catalog.svg" alt="Something went wrong...">
                    <p>Каталог товаров</p>
                </button>
                <div id="catalogModal" class="modal"> <!-- Модальное окно категорий -->
                    <a href="canal.php"><?= $categories[0][1] ?></a>
                    <a href="elec.php"><?= $categories[1][1] ?></a>
                    <a href="pol.php"><?= $categories[2][1] ?></a>
                    <a href="kraska.php"><?= $categories[3][1] ?></a>
                    <a href="cement.php"><?= $categories[4][1] ?></a>
                </div>
            </div>
            <!-- Авторизация -->
            <div class="basket">
                <button id="openProfile">
                    <img width="30px" height="30px" src="../img/profile.svg" alt="Something went wrong...">
                </button>
                <div id="window" class="window">
                    <?php if (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] === true) : ?>
                        <!-- Контент для вошедшего админа -->
                        <p>Вы вошли!</p>
                        <a href="logout.php">Выйти</a>
                        <style>
                            .window {
                                margin-top: 140px;
                                margin-left: -30px;
                            }
                        </style>
                        <?php elseif (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] === false) : ?>
                        <!-- Контент для вошедшего админа -->
                        <p>Вы вошли!</p>
                        <a href="logout.php">Выйти</a>
                        <style>
                            .window {
                                margin-top: 140px;
                                margin-left: -30px;
                            }
                        </style>
                    <?php else : ?>
                        <!-- Контент для не вошедшего админа -->
                        <a href="authorization.php">Войти!</a>
                        <a href="registration.php">Новый клиент?</a>
                    <?php endif; ?>
                </div>
                <a href="basket.php"><img width="30px" height="30px" src="../img/basket.svg" alt="Something went wrong..."></a>
            </div>

        </div>
    </div>

</body>
<script src="script.js"></script>

</html>