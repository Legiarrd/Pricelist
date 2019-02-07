<?php
session_start();
require '../php/sql.php';
require '../php/users.php';
require '../php/itemtable.php';
$permission = $pdo->prepare("SELECT permission FROM users WHERE id = ?");
$result = $permission->execute(array($_SESSION['userid']));
$verifyper = $permission->fetch();
$verifyper = implode($verifyper);
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
if(!$verifyper == "admin") {
    include '../php/noperm.php';
    die('<h1 class"display-1">Sie haben nicht die benötigten Berechtigungen</h1>');
}
require '../php/sql.php';
require '../php/itemtable.php';
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
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
          <a class="btn btn-dark" href='index.php'>Admin Panel</a>
          <a class="btn btn-dark active" href='edit.php'>Einträge bearbeiten</a>
          <a class="btn btn-dark" href='add.php'>Eintrag hinzufügen</a>
          <a class="btn btn-dark" href='users.php'>Users</a>
          <a class="btn btn-dark" href='account.php'>Account bearbeiten</a>
        </div>
        <div class=" collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <a class="btn btn-dark" href='../index.php'><i class="fas fa-home"></i> Zur Startseite</a>
            <a class="btn navbar-btn btn-dark"href='../php/logout.php'><i class="fas fa-sign-out-alt"></i> Logout</a>
        </ul>
        </div>
      </div>
    </nav>
    <div class="row justify-content-center align-items-center">
    <form id="searchadmin" class="form-inline" method="get">
    <input class="form-control" type="text" name="search" placeholder="Nach Artikel suchen" maxlength="255" size="70">
    <button class="btn btn-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    <?php
    if(@$_GET['search']) {
      echo "<a class='btn btn-outline-info' href='edit.php'>Zurück</a>";
    }
    ?>
  </form>
</div>
    <section class="table">
      <table>
        <tr>
          <th>ID</th>
          <th>Artikel</th>
          <th>Kategorie</th>
          <th>Preis</th>
          <th>Markt</th>
          <th></th>
          <th></th>
        </tr>
        <?php
        $table = "SELECT * FROM itemtable ORDER BY id";
        $search = @$_GET['search'];
        if ($search) {
          $select = "SELECT * FROM itemtable WHERE item LIKE '%$search%'";
          foreach ($pdo -> query($select) as $row) {
            echo "<tr><td>".$row['id']."</td>";
            echo "<td>".$row['item']."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['pricetag']."</td>";
            echo "<td>".$row['store']."</td>";
            echo "<td><a class='btn btn-info' href='editentry.php?edit=".$row['id']."'>Bearbeiten</a></td>";
            echo "<td><a class='btn btn-danger' href='../php/delete.php?delete=".$row['id']."'>Löschen</a></td></tr>";
            }
          } else {
        foreach ($pdo -> query($table) as $row) {
          echo "<tr><td>".$row['id']."</td>";
          echo "<td>".$row['item']."</td>";
          echo "<td>".$row['category']."</td>";
          echo "<td>".$row['pricetag']."</td>";
          echo "<td>".$row['store']."</td>";
          echo "<td><a class='btn btn-info' href='editentry.php?edit=".$row['id']."'>Bearbeiten</a></td>";
          echo "<td><a class='btn btn-danger' href='../php/delete.php?delete=".$row['id']."'>Löschen</a></td></tr>";
              }
            }

         ?>
      </section>
  </body>
</html>
