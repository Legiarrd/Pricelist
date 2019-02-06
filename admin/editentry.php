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
  while($row = $idsearch->fetch()) {echo floatval($row['pricetag']);}
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
        <a class="btn btn-dark"href='edit.php'><i class="fas fa-chevron-left"></i> Zurück</a>
      </div>
    </div>
  </nav>
  <br>
  <form action ="../php/editentry.php" method="post">
    <div class="form-group">
    <label>Artikel
    <input class="form-control" type="text" name="item" size="72" value="<?php item(); ?>" required>
  </label>
</div>
  <div class="form-group">
    <label>ID
  <input id="idfield" class="numinput form-control" type="text" name="itemnumber" value="<?php id();?>" readonly>
</label>
  <label>Kategorie
    <input class="form-control" type="text" name="category" value="<?php category(); ?>" required>
  </label>
  <label>Preis in €
    <input class="form-control" type="number" step="0.01" name="pricetag" size="5" value="<?php pricetag(); ?>" required>
  </label>
  <label>Markt
    <input class="form-control" type="text" name="store" value="<?php store(); ?>" required>
  </label>
</div>
  <div class="form-group">
  <button class="btn btn-primary" type="submit">speichern</button>
</form>
  </body>
</html>


<?php



 ?>
