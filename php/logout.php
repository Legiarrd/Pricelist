<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
session_destroy();
echo '<!doctype html>
<html>
  <head>
    <meta http-equiv="refresh" content="3; URL=../index.php">
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
      <div class="navbar-nav">';
      echo  '<button  class="indexbutton btn btn-dark" onclick="window.location.';
      echo "href='../index.php'\"";
      echo ">Zurück</button>;
      </div>
    </div>
  </nav>";
echo "<h1 class='display-4'>Logout erfolgreich</1>
</body>
</html>";
?>
