<?php
session_start();
require 'sql.php';
require 'users.php';
if(isset($_GET['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $result = $statement->execute(array('email' => $email));
  $user = $statement->fetch();
  
  if ($user !== false && password_verify($password, $user['password'])) {
      $_SESSION['userid'] = $user['id'];
      die(header ('Location: ../index.php'));
  } else {
      $errorMessage = header('Location: loginfailure.php');
  }

}
?>
