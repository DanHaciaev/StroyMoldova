<?php

require_once '../../connection/connection.php';

$product_id = $_POST['product_id'];

mysqli_query($connect, "DELETE FROM products WHERE `products`.`product_id` = '$product_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
