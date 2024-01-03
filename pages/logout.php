<?php
session_start();
session_unset();
session_destroy();
header("Location: main.php"); // Перенаправление на главную страницу или иную страницу после выхода
exit();
?>
