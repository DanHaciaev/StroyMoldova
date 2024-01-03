<?php

require_once '../../connection/connection.php';

$user_id = $_POST['user_id'];

mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`user_id` = '$user_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
