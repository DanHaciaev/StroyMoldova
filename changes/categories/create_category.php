<?php

require_once '../../connection/connection.php';

$category_id = $_POST['category_id'];
$name = $_POST['name'];

mysqli_query($connect, "INSERT INTO `categories` (`category_id`, `name`) VALUES (NULL, '$name')");

header('Location: ' . $_SERVER['HTTP_REFERER']);
