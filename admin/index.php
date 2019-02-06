<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<br><p class="h4">Sie sind zurzeit nicht angemeldet.</p>');
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
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="nav navbar-nav">
          <button class="indexbutton btn btn-dark active" onclick="window.location.href='index.php'">Admin Panel</button>
          <button class="indexbutton btn btn-dark " onclick="window.location.href='edit.php'">Einträge bearbeiten</button>
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='add.php'">Eintrag hinzufügen</button>
        </div>
        <div class=" collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='../index.php'"><i class="fas fa-home"></i> Zur Startseite</button>
          <button  class="indexbutton btn navbar-btn btn-dark" onclick="window.location.href='../php/logout.php'"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </ul>
        </div>
      </div>
    </nav>
  </body>
</html>