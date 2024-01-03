<?php 

    $connect = mysqli_connect("localhost", "root", "", "stroymoldova");

    if (!$connect) {
        die("Ошибка подключения к базе данных: " . $mysqli->connect_error);
    }
    
?>