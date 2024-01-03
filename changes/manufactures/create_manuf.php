<?php

require_once '../../connection/connection.php';

$manufacturer_id = $_POST['manufacturer_id'];
$name = $_POST['name'];
$description = $_POST['description'];

mysqli_query($connect, "INSERT INTO `manufactures` (`manufacturer_id`, `name`, `description`) VALUES (NULL, '$name', '$description')");

header('Location: ' . $_SERVER['HTTP_REFERER']);
