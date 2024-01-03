<?php
require_once '../connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    $manufac = mysqli_query($connect, "SELECT * FROM `manufactures`");
    $manufac = mysqli_fetch_all($manufac);
    ?>
    <div class="footer_all">
        <div class="contacts">
            <p>Контакты</p>
            <ul>
                <li>Молдова, Кишинев</li>
                <li>069696969</li>
            </ul>
        </div>
        <div class='manufactures'>
            <p>Компании</p>
            <a href="rehau.php"><?= $manufac[0][1] ?></a>
            <a href="makel.php"><?= $manufac[1][1] ?></a>
            <a href="kahrs.php"><?= $manufac[2][1] ?></a>
            <a href="caparol.php"><?= $manufac[3][1] ?></a>
            <a href="lafarge.php"><?= $manufac[4][1] ?></a>
        </div>
    </div>
</body>

</html>