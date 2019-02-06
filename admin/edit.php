<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
require '../php/sql.php';
require '../php/itemtable.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $lang->lang_register;?></title>
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
          <button class="indexbutton btn btn-dark" onclick="window.location.href='index.php'">Admin Panel</button>
          <button class="indexbutton btn btn-dark active" onclick="window.location.href='edit.php'">Einträge bearbeiten</button>
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='add.php'">Eintrag hinzufügen</button>
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='../index.php'">Zur Hauptseite</button>
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='../php/logout.php'">Logout</button>
        </div>
      </div>
    </nav>
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
        foreach ($pdo -> query($table) as $row) {
          echo "<tr><td>".$row['id']."</td>";
          echo "<td>".$row['item']."</td>";
          echo "<td>".$row['category']."</td>";
          echo "<td>".$row['pricetag']."</td>";
          echo "<td>".$row['store']."</td>";
          echo "<td><a class='btn btn-info' href='?change=".$row['id']."'>Bearbeiten</a></td>";
          echo "<td><a class='btn btn-danger' href='?delete=".$row['id']."'>Löschen</a></td></tr>";
              }
          $del = @$_GET['delete'];
          if ($del != 0) {
          $delete = $pdo->prepare("DELETE FROM itemtable WHERE id = ?");
          $delete->execute(array($del));
          header ('Location: edit.php');
          }

         ?>
      </section>
  </body>
</html>
