<?php
session_start();
require_once '../connection/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $product_name = $_POST['product_order'];
    $name = $_POST['name_order'];
    $address = $_POST['address_order'];
    $status = 'holding'; // Устанавливаем статус 'holding'

    // Получение цены выбранного продукта
    $product_query = mysqli_query($connect, "SELECT price FROM `products` WHERE name = '$product_name'");
    $product = mysqli_fetch_assoc($product_query);
    $price = $product['price'];

    // Устанавливаем текущую дату
    $order_date = date('Y-m-d H:i:s');

    // Вставка данных в таблицу orders
    $sql = "INSERT INTO orders (product, name, address, price, order_date, status) VALUES ('$product_name', '$name', '$address', '$price', '$order_date', '$status')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        // Успешно добавлено
        echo "<script>window.location = 'main.php';</script>";
    } else {
        // Ошибка при добавлении
        echo "Ошибка при оформлении заказа: " . mysqli_error($connect);
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
    <style>
        /* Стили для разделения экрана */
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
                        <th class="table">Order ID</th>
                        <th class="table">Product</th>
                        <th class="table">Name</th>
                        <th class="table">Address</th>
                        <th class="table">Price</th>
                        <th class="table">Date</th>
                        <th class="table">Status</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM `orders`";
                    $result = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="border: 1px solid black;"><?php echo $row['order_id'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['product'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['name'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['address'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['price'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['order_date'] ?></td>
                            <td style="border: 1px solid black;"><?php echo $row['status'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

                <table class="form">
                    <form id="basket-form" action="" method="post">
                        <tr>
                            <th colspan="2" class="table_header">
                                <h3 class="table_header_text">Редактор заказов</h3>
                            </th>
                        </tr>
                        <tbody class="text_and_inputs">
                            <tr>
                                <td>
                                    <p class="left-align">ID заказа</p>
                                </td>
                                <td><input type="number" name="order_id" placeholder="Для изменения/удаления" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Товар</p>
                                </td>
                                <td>
                                    <select name="product" class="input-redactor">
                                        <option value="">Выберите товар</option>
                                        <?php
                                        $result = mysqli_query($connect, "SELECT * FROM `products`");

                                        while ($product = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $product['name'] . '">' . $product['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Имя</p>
                                </td>
                                <td><input type="text" name="name" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Адрес</p>
                                </td>
                                <td><input type="text" name="address" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Дата заказа</p>
                                </td>
                                <td><input type="text" name="order_date" class="input-redactor" value="<?php echo date('Y-m-d H:i:s'); ?>"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Цена</p>
                                </td>
                                <td><input type="text" name="price" class="input-redactor"></td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="left-align">Статус</p>
                                </td>
                                <td>
                                    <select name="status" class="input-redactor">
                                        <option value="">Выберите статус</option>
                                        <?php
                                        $result = mysqli_query($connect, "SHOW COLUMNS FROM `orders` WHERE Field = 'status'");
                                        $row = mysqli_fetch_assoc($result);

                                        // Получение списка ENUM значений
                                        $enum_values = explode("','", substr($row['Type'], 6, -2));

                                        // Вывод элементов <option> для каждого значения ENUM
                                        foreach ($enum_values as $enum_value) {
                                            echo '<option value="' . $enum_value . '">' . $enum_value . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tr>
                            <td colspan="2" class="button-container">
                                <button type="button" id="create-basket" class="button-redactor">Добавить</button>
                                <button type="button" id="update-basket" class="button-redactor">Изменить</button>
                                <button type="button" id="delete-basket" class="button-redactor">Удалить</button>
                            </td>
                        </tr>
                    </form>
                </table>

                <div class='content'>
                    <!-- Основной контент для зарегистрированных пользователей -->
                    <form action="" method="post">
                        <div class='form_admin'>Админам доступно только редактирование. Админы могут взять товар со склада. Необязательно заказывать</div>
                    </form>
                </div>
            </div>
        </div>
    <?php else : ?>
        <!-- Если администратор не вошел, показываем основной контент -->
        <div class='form_all'>
            <form action="" method="post" class="order_form">
                <div>
                    <p>Выберите товар:</p>
                    <select name="product_order" class="input-redactor">
                        <option value=""></option>
                        <?php
                        $result = mysqli_query($connect, "SELECT * FROM `products`");

                        while ($product = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $product['name'] . '">' . $product['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <p>Введите свое имя:</p>
                    <input type="text" name="name_order" class="input-redactor">
                </div>
                <div>
                    <p>Введите свой адрес:</p>
                    <input type="text" name="address_order" class="input-redactor">
                </div>
                <button class='zakaz'>Оформить заказ</button>
            </form>
        </div>
        </div>
    <?php endif; ?>

    <?php include 'footer.php' ?>
</body>
<script src="../connection/basket.js"></script>

</html>