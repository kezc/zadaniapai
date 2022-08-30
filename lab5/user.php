<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    require('funkcje.php');

    echo "<h1>ZALOGOWANO</h1>";
    if($_SESSION['zalogowany'] != 1) {
        header("Location: index.php");
    }
    echo $_SESSION['zalogowanyImie'];

    $currentDir = getcwd();
    $uploadDirectory = "/zdjeciaUzytkownikow/";
    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $uploadPath = $currentDir . $uploadDirectory . "zdjecie";
    if ($fileName != "" and ($fileType == 'image/png' or $fileType == "image/jpeg" or $fileType == 'image/JPEG' or $fileType == 'image/PNG')) {
        echo "</br>";
        echo $fileTmpName;
        echo "</br>";
        echo $uploadPath;
        if (move_uploaded_file($fileTmpName, $uploadPath)) echo "Zdjecie zostało załadowane";
        else echo "zdjecie nie zostalo dodane";
    }
    echo '<img src="' . "zdjeciaUzytkownikow/" . "zdjecie" . '" alt="Tekst alternatywny...">';
    ?>
    <a href="index.php">Index</a>

    <form action='user.php' method='POST' enctype='multipart/form-data'>
        <input name="myfile" type="file"/>
        <button type="submit">Upload</button>
    </form>

    <form method="post" action="index.php">
        <button type="submit" name="wyloguj" value="wyloguj">Wyloguj</button>
    </form>
</body>

</html>