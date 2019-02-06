<?php
function item() {
  include '../php/sql.php';
  include '../php/itemtable.php';
  $entryid = $_GET['edit'];
  $idsearch = $pdo-> prepare("SELECT * FROM itemtable WHERE id = ?");
  $idsearch -> execute(array($entryid));
  while($row = $idsearch->fetch()) {echo $row['item'];}
}
function store() {
  include '../php/sql.php';
  include '../php/itemtable.php';
  $entryid = $_GET['edit'];
  $idsearch = $pdo-> prepare("SELECT * FROM itemtable WHERE id = ?");
  $idsearch -> execute(array($entryid));
  while($row = $idsearch->fetch()) {echo $row['store'];}
}
function pricetag() {
  include '../php/sql.php';
  include '../php/itemtable.php';
  $entryid = $_GET['edit'];
  $idsearch = $pdo-> prepare("SELECT * FROM itemtable WHERE id = ?");
  $idsearch -> execute(array($entryid));
  while($row = $idsearch->fetch()) {echo $row['pricetag'];}
}
function category() {
  include '../php/sql.php';
  include '../php/itemtable.php';
  $entryid = $_GET['edit'];
  $idsearch = $pdo-> prepare("SELECT * FROM itemtable WHERE id = ?");
  $idsearch -> execute(array($entryid));
  while($row = $idsearch->fetch()) {echo $row['category'];}
}
function id() {
  include '../php/sql.php';
  include '../php/itemtable.php';
  $entryid = $_GET['edit'];
  $idsearch = $pdo-> prepare("SELECT * FROM itemtable WHERE id = ?");
  $idsearch -> execute(array($entryid));
  while($row = $idsearch->fetch()) {echo $row['id'];}
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $lang->lang_register;?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">Preistabelle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav">
        <button class="indexbutton btn btn-dark" onclick="window.location.href='edit.php'">Zurück</button>
      </div>
    </div>
  </nav>
  <br>
  <form action ="../php/editentry.php" method="post">
    <input type="number" name="itemnumber" value="<?php id();?>" hidden>
    <div class="form-group">
    <label>Artikel
    <input class="form-control" type="text" name="item" size="64" value="<?php item(); ?>">
  </label>
</div>
  <div class="form-group">
  <label>Kategorie
    <input class="form-control" type="text" name="category" value="<?php category(); ?>">
  </label>
  <label>Preis in EUR
    <input class="form-control" type="text" name="pricetag" size="5" value="<?php pricetag(); ?>">
  </label>
  <label>Markt
    <input class="form-control" type="text" name="store" value="<?php store(); ?>">
  </label>
</div>
  <div class="form-group">
  <button class="btn btn-primary" type="submit">speichern</button>
</form>
  </body>
</html>


<?php



 ?>
