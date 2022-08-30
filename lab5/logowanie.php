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

    $login = test_input($_POST["login"]);
    $password = test_input($_POST["password"]);
    // if(isset($login)) echo "Login " .$login . "</br>";
    // if(isset($password)) echo "Haslo " . $password . "</br>";
    if($login == $osoba1->login && $password == $osoba1->haslo) { 
        $_SESSION['zalogowanyImie'] = $osoba1->imieNazwisko;
        $_SESSION['zalogowany'] = 1;
        header("Location: user.php");
    } else {
        header("Location: index.php");
    }    
?>
</body>

</html>