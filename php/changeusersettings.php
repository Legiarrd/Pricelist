<?php
session_start();
require '../php/sql.php';
require '../php/users.php';
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<div class="alert alert-danger" role="alert">Sie sind zurzeit nicht angemeldet!</div>');
}
$permission = $pdo->prepare("SELECT permission FROM users WHERE id = ?");
$result = $permission->execute(array($_SESSION['userid']));
$verifyper = $permission->fetch();
$verifyper = implode($verifyper);
if(!$verifyper == "admin") {
    include '../php/noperm.php';
    die('<div class="alert alert-danger" role="alert">Sie besitzen nicht die benötigten Berechtigungen!</div>');
}
$id = @$_POST['id'];
$username = @$_POST['username'];
$email = @$_POST['email'];
$password = @$_POST['password'];
$perm = @$_POST['permission'];

$query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$exec = $query->execute(array($id));
$query = $query->fetch();
if($password != 0) {
  $pw = password_hash($password, PASSWORD_DEFAULT);
  echo $pw;
  $pwchange = $pdo->prepare("UPDATE users SET password = ? where id = $id");
  $pwchange -> execute(array($pw));
}
if($username) {
  if($username == $query['username']) {} else {
  $userchange = $pdo->prepare("UPDATE users SET username = ? where id = $id");
  $userchange -> execute(array($username));
  }
}
if($email) {
  if($email == $query['email']) {} else {
  $emailchange = $pdo->prepare("UPDATE users SET email = ? where id = $id");
  $emailchange -> execute(array($email));
  }
}
if($perm){
$permchange = $pdo->prepare("UPDATE users SET permission = ? where id = $id");
$permchange -> execute(array($perm));}
else {
  $permchange = $pdo->prepare("UPDATE users SET permission = ? where id = $id");
  $permchange -> execute(array(NULL));}

header ("Location: ../admin/users.php");
?>
