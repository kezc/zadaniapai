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
    $wyloguj = test_input($_POST["wyloguj"]);
    if ($wyloguj == "wyloguj") $_SESSION['zalogowany'] = 0;

    echo "<h1>Nasz system</h1>";
    ?>
    <form method="post" action="logowanie.php">
    <fieldset>
    <legend>Logowanie:</legend>
        <label>Username : </label>
        <input type="text" placeholder="Enter Username" name="login" required> </br>
        <label>Password : </label>
        <input type="password" placeholder="Enter Password" name="password" required> </br>
        <button type="submit">Login</button>
    </fieldset>
    </form>
    <a href="user.php">User</a>
</body>


<h2>Ciasteczka</h2>
<form action="cookie.php" method="get">
<fieldset>
    <legend>Ustaw ciacho:</legend>
    <label for="czas">Czas cookie:</label>
    <input type="number" name="czas" style="width:40px;" value="10">
    <input type="submit" name="utworzCookie" value="Utwórz cookie" />
</fieldset>
</form>

<?php
if (isset($_COOKIE['nazwa'])) {
    $val = $_COOKIE['nazwa'];
    echo " Pobrana wartość: $val";
}
?>


</html>