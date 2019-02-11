<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include 'notlogin.php';
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
require 'users.php';
$del = @$_GET['delete'];
$delete = $pdo->prepare("DELETE FROM users WHERE id = ?");
$delete->execute(array($del));
header ('Location: ../admin/users.php')
 ?>
