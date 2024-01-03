<?php
session_start();
require_once '../connection/connection.php';

// Запрос к базе данных для получения информации о продукте
$product = mysqli_query($connect, "SELECT * FROM `products`");
$product = mysqli_fetch_all($product);

// Получаем ID производителя из информации о продукте
$manufacturerID = $product[0][5];

// Запрос к таблице производителей для получения названия
$manufacturer = mysqli_query($connect, "SELECT `name` FROM `manufactures` WHERE `manufacturer_id` = $manufacturerID");
$manufacturer = mysqli_fetch_assoc($manufacturer);
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
            width: 200px;
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
                        <th class="table">Product ID</th>
                        <th class="table">Name</th>
                        <th class="table">Manufacture</th>
                        <th class="table">Price</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `products`";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="border: 1px solid black;"><?php echo $row['product_id'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['name'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['manufacture_id'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['price'] ?></td>

                        </tr>
                    <?php
                    }
                    ?>

                </table>
                <table class="form">
                    <form id="product-form" action="" method="post">
                        <tr>
                            <th colspan="2" class="table_header">
                                <h3 class="table_header_text">Редактор продуктов</h3>
                            </th>
                        </tr>
                        <tbody class="text_and_inputs">
                            <tr>
                                <td>
                                    <p class="left-align">ID продукта</p>
                                </td>
                                <td><input type="number" name="product_id" placeholder="Для изменения/удаления" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Название</p>
                                </td>
                                <td><input type="text" name="name" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Производитель</p>
                                </td>
                                <td><input type="text" name="manufacture_id" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Цена</p>
                                </td>
                                <td><input type="text" name="price" class="input-redactor"></td>
                            </tr>
                        </tbody>
                        <tr>
                            <td colspan="2" class="button-container">
                                <button type="button" id="create-product" class="button-redactor">Добавить</button>
                                <button type="button" id="update-product" class="button-redactor">Изменить</button>
                                <button type="button" id="delete-product" class="button-redactor">Удалить</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>

            <div class="blocks">
                <div class="block">
                    <img width="200px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($product[12][3]) ?>" alt="Изображение">
                    <p><?= $product[12][1] ?></p>
                    <a href="rehau.php">
                        <p><?= $manufacturer['name'] ?></p>
                    </a>
                    <p><?= $product[12][2] ?> лей</p>
                    <button><a href="basket.php">Оформить заказ</a></button>

                </div>
                <div class="block">
                    <img width="200px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($product[13][3]) ?>" alt="Изображение">
                    <p><?= $product[13][1] ?></p>
                    <a href="rehau.php">
                        <p><?= $manufacturer['name'] ?></p>
                    </a>
                    <p><?= $product[13][2] ?> лей</p>
                    <button><a href="basket.php">Оформить заказ</a></button>

                </div>
                <div class="block">
                    <img width="200px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($product[14][3]) ?>" alt="Изображение">
                    <p><?= $product[14][1] ?></p>
                    <a href="rehau.php">
                        <p><?= $manufacturer['name'] ?></p>
                    </a>
                    <p><?= $product[14][2] ?> лей</p>
                    <button><a href="basket.php">Оформить заказ</a></button>

                </div>
            </div>
        </div>
    <?php else : ?>
        <!-- Если администратор не вошел, показываем основной контент -->
        <div class="blocks">
            <form id="product-form" action="add_product.php" method="post">
                <div class="block">
                    <img width="200px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($product[12][3]) ?>" alt="Изображение">
                    <p><?= $product[12][1] ?></p>
                    <a href="rehau.php">
                        <p><?= $manufacturer['name'] ?></p>
                    </a>
                    <p><?= $product[12][2] ?> лей</p>
                    <button><a href="basket.php">Оформить заказ</a></button>

                </div>
            </form>
            <div class="block">
                <img width="200px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($product[13][3]) ?>" alt="Изображение">
                <p><?= $product[13][1] ?></p>
                <a href="rehau.php">
                    <p><?= $manufacturer['name'] ?></p>
                </a>
                <p><?= $product[13][2] ?> лей</p>
                <button><a href="basket.php">Оформить заказ</a></button>

            </div>
            <div class="block">
                <img width="200px" height="150px" src="data:image/jpeg;base64,<?= base64_encode($product[14][3]) ?>" alt="Изображение">
                <p><?= $product[14][1] ?></p>
                <a href="rehau.php">
                    <p><?= $manufacturer['name'] ?></p>
                </a>
                <p><?= $product[14][2] ?> лей</p>
                <button><a href="basket.php">Оформить заказ</a></button>

            </div>
        <?php endif; ?>
        </div>
        <?php include 'footer.php' ?>
</body>
<script src="../connection/crud.js"></script>

</html>