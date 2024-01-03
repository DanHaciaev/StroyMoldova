<?php

require_once '../../connection/connection.php';

$product_id = $_POST['product_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$manufacture_id = $_POST['manufacture_id'];

mysqli_query($connect, "UPDATE `products` SET `product_id` = '$product_id', `name` = '$name', `price` = '$price', `manufacture_id` = '$manufacture_id' WHERE `products`.`product_id` = '$product_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
