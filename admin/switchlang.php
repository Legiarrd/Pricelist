<?php
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
