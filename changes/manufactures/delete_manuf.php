<?php

require_once '../../connection/connection.php';

$manufacturer_id = $_POST['manufacturer_id'];

mysqli_query($connect, "DELETE FROM `manufactures` WHERE `manufactures`.`manufacturer_id` = '$manufacturer_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
