<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include 'notlogin.php';
    die('<div class="alert alert-danger" role="alert">Sie sind zurzeit nicht angemeldet!</div>');
}
require 'sql.php';
require 'itemtable.php';
$itemnumber = $_POST['itemnumber'];
$itemname = $_POST['item'];
$cat = $_POST['category'];
$sto = $_POST['store'];
$price = $_POST['pricetag'];
$changeentry = $pdo->prepare("UPDATE itemtable SET item = ?, category = ?, pricetag = ?, store = ?, last_update = now() where id = $itemnumber");
$changeentry -> execute(array($itemname, $cat, $price, $sto));
header ('Location: ../admin/edit.php');
?>
