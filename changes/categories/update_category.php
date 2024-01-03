<?php

require_once '../../connection/connection.php';

$category_id = $_POST['category_id'];
$name = $_POST['name'];

mysqli_query($connect, "UPDATE `categories` SET `category_id` = '$category_id', `name` = '$name' WHERE `categories`.`category_id` = '$category_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
