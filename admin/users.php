<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
require '../php/sql.php';
require '../php/users.php';
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
          <a class="btn btn-dark" href='edit.php'>Einträge bearbeiten</a>
          <a class="btn btn-dark" href='add.php'>Eintrag hinzufügen</a>
          <a class="btn btn-dark active" href='users.php'>Users</a>
          <a class="btn btn-dark" href='#' onclick="alert('Funktion wird im späteren Verlauf eingefügt')">Account bearbeiten</a>

        </div>
        <div class=" collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <a class="btn btn-dark" href='../index.php'><i class="fas fa-home"></i> Zur Startseite</a>
            <a class="btn navbar-btn btn-dark"href='../php/logout.php'><i class="fas fa-sign-out-alt"></i> Logout</a>
        </ul>
        </div>
      </div>
    </nav>
    <section class="table">
      <table>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Gruppe</th>
          <th>Account erstellt</th>
          <th></th>
          <th></th>
        </tr>
        <?php
        $table = "SELECT * FROM users ORDER BY id";
        foreach ($pdo -> query($table) as $row) {
          echo "<tr><td>".$row['id']."</td>";
          echo "<td>".$row['username']."</td>";
          echo "<td>".$row['email']."</td>";
          echo "<td>".$row['permission']."</td>";
          echo "<td>".$row['created']."</td>";
          echo "<td><a class='btn btn-info' href='#?edit=".$row['id']."'>Bearbeiten</a></td>";
          echo "<td><a class='btn btn-danger' href='#?delete=".$row['id']."'>Löschen</a></td></tr>";
              }
         ?>
         <div class="alert alert-warning" role="alert">
           Bearbeiten und Löschen kommt später
         </div>
      </section>
  </body>
</html>
