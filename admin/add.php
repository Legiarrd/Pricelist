<?php
session_start();
require '../php/sql.php';
require '../php/users.php';
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<div class="alert alert-danger" role="alert">Sie sind zurzeit nicht angemeldet!</div>');
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
    <title>Eintrag hinzufügen | Preistabelle</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
          <a class="btn btn-dark" href='index.php'>Admin Panel</a>
          <a class="btn btn-dark" href='edit.php'>Einträge bearbeiten</a>
          <a class="btn btn-dark active" href='add.php'>Eintrag hinzufügen</a>
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
    <h1 class="display-4">Eintrag hinzufügen</h1>
    <hr>
    <form action="../php/addentry.php" method="post">
      <div class="form-group">
      <label>Artikel
      <input class="form-control" type="text" name="item" minlength="3" size="42" placeholder="Artikel" required>
    </label>
  </div>
  <div class="form-group">
    <label>Kategorie
      <select class="form-control" name="category" class="adds" required>
        <option value="Lebensmittel">Lebensmittel</option>
        <option value="alkoholfreie Getränke">alkoholfreie Getränke</option>
        <option value="alkoholische Getränke">alkoholische Getränke</option>
        <option value="koffeinhaltige Getränke">koffeinhaltige Getränke</option>
        <option value="Kosmetik">Kosmetik</option>
        <option value="Sonstiges">Sonstiges</option>
      </select>
    </label>

    <label>Preis
      <input class="form-control" type="number" name="pricetag" step="0.01" min="0" placeholder="0,00" required>
    </label>
    <label>Markt
      <select name="store" class="form-control" required>
        <option value="EDEKA">EDEKA</option>
        <option value="EDEKA Fleischer">EDEKA Fleischer</option>
        <option value="Bäcker">Bäcker</option>
      </select>
    </label>
  </div>
  <div class="form-group">
    <button class="btn btn-primary" type="submit" name="submit">Senden</button>
  </div>
  </form>
</body>
</html>
