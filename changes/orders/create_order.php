<?php
require_once '../../connection/connection.php';

$order_id = $_POST['order_id'];
$product = $_POST['product'];
$name = $_POST['name'];
$address = $_POST['address'];
$price = $_POST['price'];
$order_date = $_POST['order_date'];
$status = $_POST['status'];

mysqli_query($connect, "INSERT INTO `orders` (`order_id`, `product`, `name`, `address`, `price`, `order_date`, `status`) VALUES (NULL, '$product', '$name', '$address', '$price', '$order_date', '$status')");

header('Location: ' . $_SERVER['HTTP_REFERER']);
