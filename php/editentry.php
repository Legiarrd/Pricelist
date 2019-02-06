<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include 'notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
require 'sql.php';
require 'itemtable.php';
$itemnumber = $_POST['itemnumber'];
$itemname = $_POST['item'];
$cat = $_POST['category'];
$sto = $_POST['store'];
$price = $_POST['pricetag'];
$changeentry = $pdo->prepare("UPDATE itemtable SET item = ?, category = ?, pricetag = ?, store = ? where id = $itemnumber");
$changeentry -> execute(array($itemname, $cat, $price, $sto));
header ('Location: ../admin/edit.php');
?>
