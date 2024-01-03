<?php
session_start();
require_once '../connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StroyMoldova</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Стили для разделения экрана */
        .split-screen {
            display: flex;
        }

        .admin-panel {
            display: flex;
            flex-direction: row;
            flex: 1;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .content {
            flex: 3;
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    <?php if (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] === true) : ?>
        <!-- Если администратор вошел, показываем админ-панель -->
        <div class="split-screen">
            <div class="admin-panel">
                <h2>Админ-панель</h2>
                <table class="table">
                    <tr>
                        <th class="table">Category ID</th>
                        <th class="table">Name</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="border: 1px solid black;"><?php echo $row['category_id'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['name'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>

                <table class="form">
                    <form id="category-form" action="" method="post">
                        <tr>
                            <th colspan="2" class="table_header">
                                <h3 class="table_header_text">Редактор компаний</h3>
                            </th>
                        </tr>
                        <tbody class="text_and_inputs">
                            <tr>
                                <td>
                                    <p class="left-align">ID категории</p>
                                </td>
                                <td><input type="number" name="category_id" placeholder="Для изменения/удаления" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Название</p>
                                </td>
                                <td><input type="text" name="name" class="input-redactor"></td>
                            </tr>
                        </tbody>
                        <tr>
                            <td colspan="2" class="button-container">
                                <button type="button" id="create-category" class="button-redactor">Добавить</button>
                                <button type="button" id="update-category" class="button-redactor">Изменить</button>
                                <button type="button" id="delete-category" class="button-redactor">Удалить</button>
                            </td>
                        </tr>
                    </form>
                </table>

                <table class="table">
                    <tr>
                        <th class="table">User ID</th>
                        <th class="table">Userame</th>
                        <th class="table">Password</th>
                        <th class="table">Email</th>
                        <th class="table">Date</th>

                    </tr>

                    <?php
                    $sql = "SELECT * FROM `users`";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="border: 1px solid black;"><?php echo $row['user_id'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['username'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['password'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['email'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['created_at'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>

                <table class="form">
                    <form id="users-form" action="" method="post">
                        <tr>
                            <th colspan="2" class="table_header">
                                <h3 class="table_header_text">Редактор пользователей</h3>
                            </th>
                        </tr>
                        <tbody class="text_and_inputs">
                            <tr>
                                <td>
                                    <p class="left-align">ID пользователя</p>
                                </td>
                                <td><input type="number" name="user_id" placeholder="Для изменения/удаления" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Логин</p>
                                </td>
                                <td><input type="text" name="username" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Пароль</p>
                                </td>
                                <td><input type="text" name="password" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Почта</p>
                                </td>
                                <td><input type="text" name="email" class="input-redactor"></td>
                            </tr>
                        </tbody>
                        <tr>
                            <td colspan="2" class="button-container">
                                <button type="button" id="create-user" class="button-redactor">Добавить</button>
                                <button type="button" id="update-user" class="button-redactor">Изменить</button>
                                <button type="button" id="delete-user" class="button-redactor">Удалить</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>

        </div>

        <div class='content'>
            <!-- Основной контент для зарегистрированных пользователей -->
            <div class="page_photo">
                <img class='main_photo' width="900px" height="600px" src="../img/main-photo.jpg" alt="">
            </div>
        </div>
        </div>
    <?php else : ?>
        <!-- Если администратор не вошел, показываем основной контент -->
        <div class="page_photo">
            <img class='main_photo' width="900px" height="600px" src="../img/main-photo.jpg" alt="">
        </div>
    <?php endif; ?>



    <?php include 'footer.php' ?>
</body>
<script src="../connection/category.js"></script>
<script src="../connection/user.js"></script>

</html>