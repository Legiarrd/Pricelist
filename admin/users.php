<?php
session_start();
require '../php/users.php';
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<div class="alert alert-danger" role="alert">Sie sind zurzeit nicht angemeldet!</div>');
}
$permission = $pdo->prepare("SELECT permission FROM users WHERE id = ?");
$result = $permission->execute(array($_SESSION['userid']));
$verifyper = $permission->fetch();
$verifyper = implode($verifyper);
if(!$verifyper == "admin") {
    include '../php/noperm.php';
    die('<div class="alert alert-danger" role="alert">Sie besitzen nicht die benötigten Berechtigungen!</div>');
}
require '../php/users.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Users | Preistabelle</title>
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
          <a class="btn btn-dark" href='edit.php'>Einträge bearbeiten</a>
          <a class="btn btn-dark" href='add.php'>Eintrag hinzufügen</a>
          <a class="btn btn-dark active" href='users.php'>Users</a>
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
    <section class="table">
      <table>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <th>Permissions</th>
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
          echo "<td><a class='btn btn-info' href='usersettings.php?edit=".$row['id']."'>Bearbeiten</a></td>";
          echo "<td><a class='btn btn-danger' href='../php/deleteuser.php?delete=".$row['id']."'>Löschen</a></td></tr>";
              }
         ?>
      </section>
  </body>
</html>
