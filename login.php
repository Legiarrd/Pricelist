<?php
session_start();
@require 'language.php';
if ($_SESSION == true) {
  header('Location: index.php');
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $lang->lang_register;?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/main.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav">
          <a class="btn btn-dark active" href='login.php'>Anmelden</a>
          <a class="btn btn-dark" href='register.php'>Registrieren</a>
          <a class="btn btn-dark" href='index.php'>Zurück</a>
        </div>
      </div>
    </nav>
    <h1 class="display-4"><?php echo $lang->lang_login;?></h1>
    <hr>
    <form action="php/login.php?login=1" method="post">
      <div class="form-group">
      <label>Email:
        <input class="form-control" type="email" name="email" minlength="3" placeholder="name@domain.tld" required>
      </label>
      <label><?php echo $lang->lang_password;?>:
        <input class="form-control" type="password" name="password" minlength="6" placeholder="password" required>
      </label>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit" name="submit"><?php echo $lang->lang_login;?></button>
    </form>
  </div>
  </body>
</html>
