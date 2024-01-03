<?php

require_once '../../connection/connection.php';

$product_id = $_POST['product_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$manufacture_id = $_POST['manufacture_id'];


mysqli_query($connect, "INSERT INTO `products` (`product_id`, `name`, `price`, `manufacture_id`) VALUES (NULL, '$name', '$price', '$manufacture_id')");

header('Location: ' . $_SERVER['HTTP_REFERER']);
