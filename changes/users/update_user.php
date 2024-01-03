<?php

require_once '../../connection/connection.php';

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

mysqli_query($connect, "UPDATE `users` SET `username` = '$username', `password` = '$password', `email` = '$email' WHERE `users`.`user_id` = '$user_id'");

header('Location: ' . $_SERVER['HTTP_REFERER']);
