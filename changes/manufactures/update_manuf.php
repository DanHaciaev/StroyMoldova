<?php

require_once '../../connection/connection.php';

$manufacturer_id = $_POST['manufacturer_id'];
$name = $_POST['name'];
$description = $_POST['description'];

mysqli_query($connect, "UPDATE `manufactures` SET `manufacturer_id` = '$manufacturer_id', `description` = '$description' WHERE `manufactures`.`manufacturer_id` = '$manufacturer_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
