<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include 'notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
require 'sql.php';
require 'itemtable.php';
$del = @$_GET['delete'];
$delete = $pdo->prepare("DELETE FROM itemtable WHERE id = ?");
$delete->execute(array($del));
header ('Location: ../admin/edit.php')

 ?>
