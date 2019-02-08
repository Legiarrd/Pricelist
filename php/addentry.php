<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include 'notlogin.php';
    die('<div class="alert alert-danger" role="alert">Sie sind zurzeit nicht angemeldet!</div>');
}
require 'sql.php';
require 'itemtable.php';

$item = $_POST['item'];
$category = $_POST['category'];
$pricetag = $_POST['pricetag'];
$store = $_POST['store'];
$addentry = $pdo->prepare("INSERT INTO itemtable (item, category, pricetag, store) VALUES (?,?,?,?)");
$addentry -> execute(array($item, $category, $pricetag, $store));
header  ('Location: ../admin/edit.php');
 ?>
