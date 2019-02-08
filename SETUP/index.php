<?php
if(file_exists('../ini/db.ini') == TRUE) {
  header ('Location: ../index.php');
}
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
  <div class="container">
    <h1>SETUP</h1>
    <hr>
    <div class="row">
        <div class="col">
          <h4>Datenbankkonfiguration</h4>
          <form action="setup.php" method="post">
            <div class="form-group">
              <label>Host
                <input class="form-control" type="text" name="host">
              </label>
            </div>
            <div class="form-group">
              <label>Datenbankname
                <input class="form-control" type="text" name="dbname">
              </label>
            </div>
            <div class="form-group">
              <label>Username
                <input class="form-control" type="text" name="username">
              </label>
            </div>
            <div class="form-group">
              <label>Passwort
                <input class="form-control" type="text" name="dbpw">
              </label>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">speichern</button>
            </div>
          </div>
      </div>
      </div>

  </body>
</html>
