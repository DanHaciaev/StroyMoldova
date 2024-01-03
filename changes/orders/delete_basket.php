<?php

require_once '../../connection/connection.php';

$order_id = $_POST['order_id'];


mysqli_query($connect, "DELETE FROM `orders` WHERE `orders`.`order_id` = '$order_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
