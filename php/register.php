<?php
  require '../language.php';
  require 'sql.php';
  require 'users.php';
  $username = @$_POST['username'];
  $password = @$_POST['password'];
  $password_verify = @$_POST['password_verify'];
  $email = @$_POST['email'];
  if (strlen($username) < 3) {
    echo $lang->lang_register_username_under_min;
  } else {
    if (strlen($password) < 8) {
      echo $lang->lang_register_password_under_min;
    } else {
      if ($password == $password_verify) {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $add = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?)");
      $add -> execute(array($username, $password, $email));
      echo $lang->lang_register_created;
      echo "<div><button onclick='window.location.href=`../login.php`'>$lang->lang_login</button></div>";
    } else {
      echo $lang->lang_password_not_equal;
    }
  }
}
 ?>
