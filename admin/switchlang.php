<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
  $change = $_POST['changelang'];
  switch($change) {
    case 1:
      file_put_contents("language/language.txt", 1);
      header('Location: settings.php');
      break;
    case 2:
      file_put_contents("language/language.txt", 2);
      header('Location: settings.php');
      break;
  }
 ?>
