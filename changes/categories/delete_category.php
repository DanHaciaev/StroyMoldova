<?php

require_once '../../connection/connection.php';

$category_id = $_POST['category_id'];

mysqli_query($connect, "DELETE FROM `categories` WHERE `categories`.`category_id` = '$category_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
