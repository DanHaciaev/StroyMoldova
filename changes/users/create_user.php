<?php

require_once '../../connection/connection.php';

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


mysqli_query($connect, "INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES (NULL, '$username', '$password', '$email')");

header('Location: ' . $_SERVER['HTTP_REFERER']);
