<?php
require 'sql.php';
#require 'language.php';
require 'itemtable.php';

$item = $_POST['item'];
$category = $_POST['category'];
$pricetag = $_POST['pricetag'];
$store = $_POST['store'];
$addentry = $pdo->prepare("INSERT INTO itemtable (item, category, pricetag, store) VALUES (?,?,?,?)");
$addentry -> execute(array($item, $category, $pricetag, $store));
header  ('Location: ../index.php');
 ?>
