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
    <?php
    $manuf = mysqli_query($connect, "SELECT * FROM `manufactures`");
    $manuf = mysqli_fetch_all($manuf);
    ?>
    <?php include 'header.php' ?>
    <?php if (isset($_SESSION['isAdminLoggedIn']) && $_SESSION['isAdminLoggedIn'] === true) : ?>
        <!-- Если администратор вошел, показываем админ-панель -->
        <div class="split-screen">
            <div class="admin-panel">
                <h2>Админ-панель</h2>
                <table class="table">
                    <tr>
                        <th class="table">Product ID</th>
                        <th class="table">Name</th>
                        <th class="table">Manufacture</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `manufactures`";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="border: 1px solid black;"><?php echo $row['manufacturer_id'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['name'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['description'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>

                <table class="form">
                    <form id="manufacture-form" action="" method="post">
                        <tr>
                            <th colspan="2" class="table_header">
                                <h3 class="table_header_text">Редактор производителей</h3>
                            </th>
                        </tr>
                        <tbody class="text_and_inputs">
                            <tr>
                                <td>
                                    <p class="left-align">ID производителя</p>
                                </td>
                                <td><input type="number" name="manufacturer_id" placeholder="Для изменения/удаления" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Название</p>
                                </td>
                                <td><input type="text" name="name" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Описание</p>
                                </td>
                                <td><input type="text" name="description" class="input-redactor"></td>
                            </tr>                            
                        </tbody>
                        <tr>
                            <td colspan="2" class="button-container">
                                <button type="button" id="create-manufac" class="button-redactor">Добавить</button>
                                <button type="button" id="update-manufac" class="button-redactor">Изменить</button>
                                <button type="button" id="delete-manufac" class="button-redactor">Удалить</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>

        <div class='content'>

            <div class='rehau_all'>
                <p><?= $manuf[0][1] ?></p>
                <img width="350px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($manuf[0][3]) ?>" alt="Изображение">
                <p><?= $manuf[0][2] ?></p>
            </div>
        </div>
    <?php else : ?>
        <!-- Если администратор не вошел, показываем основной контент -->
        <div class='rehau_all'>
            <p><?= $manuf[0][1] ?></p>
            <img width="350px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($manuf[0][3]) ?>" alt="Изображение">
            <p><?= $manuf[0][2] ?></p>
        </div>
    <?php endif; ?>

    </div>

    <?php include 'footer.php' ?>

</body>
<script src="../connection/manufacture.js"></script>

</html>