<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    require_once("funkcje.php");
    if (isset($_GET['czas'])) {
        $cookie_time = $_GET['czas'];
        setcookie("nazwa", "wartość" . $cookie_time, time() + $cookie_time, "/");
        if (isset($_COOKIE["nazwa"])) {
            echo "Pomyślnie utworzono cookie<br>";
        } else {
            echo "Utworzenie cookie nie powiodło się<br>";
        }
    }
    ?>
    <a href="index.php">Wstecz</a>
</body>

</html>