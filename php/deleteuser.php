<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include 'notlogin.php';
    die('<div class="alert alert-danger" role="alert">Sie sind zurzeit nicht angemeldet!</div>');
}
require 'users.php';
$del = @$_GET['delete'];
$delete = $pdo->prepare("DELETE FROM users WHERE id = ?");
$delete->execute(array($del));
header ('Location: ../admin/users.php')
 ?>
