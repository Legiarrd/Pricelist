<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
          <button class="indexbutton btn btn-dark" onclick="window.location.href='index.php'">Admin Panel</button>
          <button class="indexbutton btn btn-dark" onclick="window.location.href='edit.php'">Einträge bearbeiten</button>
          <button  class="indexbutton btn btn-dark active" onclick="window.location.href='add.php'">Eintrag hinzufügen</button>
        </div>
        <div class=" collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='../index.php'"><i class="fas fa-home"></i> Zur Startseite</button>
          <button  class="indexbutton btn navbar-btn btn-dark" onclick="window.location.href='../php/logout.php'"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </ul>
        </div>
      </div>
    </nav>
    <h1 class="display-4">Eintrag hinzufügen</h1>
    <hr>
    <form action="../php/addentry.php" method="post">
      <div class="form-group">
      <label>Artikel
      <input class="form-control" type="text" name="item" minlength="3" size="42" required>
    </label>
  </div>
  <div class="form-group">
    <label>Kategorie
      <select class="form-control" name="category" class="adds" required>
        <option value="Lebensmittel">Lebensmittel</option>
        <option value="Getränke">Getränke</option>
      </select>
    </label>

    <label>Preis
      <input class="form-control" type="text" name="pricetag" size="5" required>
    </label>
    <label>Markt
      <select name="store" class="form-control" required>
        <option value="Edeka">Edeka</option>
        <option value="Fleischer">Fleischer</option>
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
