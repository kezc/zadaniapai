<?php session_start(); ?>

 <html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 </head>
 <body>
     <?php
     if (isset($_SESSION['error'])) {
         echo "NO NIE WYSZLO";
         unset($_SESSION['error']);
     }
     ?>
 <form action="form06_redirect.php" method="POST">
 id_prac <input type="text" name="id_prac">
 nazwisko <input type="text" name="nazwisko">
 <input type="submit" value="Wstaw">
 <input type="reset" value="Wyczysc">
 </form>
