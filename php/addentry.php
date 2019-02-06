<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include 'notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
require 'sql.php';
#require 'language.php';
require 'itemtable.php';

$item = $_POST['item'];
$category = $_POST['category'];
$pricetag = $_POST['pricetag'];
$store = $_POST['store'];
$addentry = $pdo->prepare("INSERT INTO itemtable (item, category, pricetag, store) VALUES (?,?,?,?)");
$addentry -> execute(array($item, $category, $pricetag, $store));
header  ('Location: ../admin/edit.php');
 ?>
