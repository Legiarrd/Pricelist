<?php
if(file_exists('../ini/db.ini') == TRUE) {
  header ('Location: ../index.php');
} else {
$dbname = @$_POST['dbname'];
$dbusername = @$_POST['username'];
$host = @$_POST['host'];
$dbpw = @$_POST['dbpw'];
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SETUP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style/main.css">
  </head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Preistabelle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav">
      </div>
    </div>
  </nav>
<?php

  if (empty($dbname) OR empty($dbusername) OR empty($host)) {
    echo '<meta http-equiv="refresh" content="2; URL=index.php">';
    echo "<h1>Fehler!</h1><p>Vervollständigen Sie Ihre Angaben!</p>";
  }
    else {
  $file = fopen('../ini/db.ini', 'w') or die ('Datei konnte nicht gelesen werden');
  fwrite($file, 'host = ' . $host . "\r\n");
  fwrite($file, 'dbusername = ' . $dbusername . "\r\n");
  fwrite($file, 'dbpw = ' . $dbpw . "\r\n");
  fwrite($file, 'dbname = ' . $dbname . "\r\n");
  fclose($file);
  unlink('indicator.ini');
  header ('Location: ../index.php');
  }
}
?>
  </body>
</html>
