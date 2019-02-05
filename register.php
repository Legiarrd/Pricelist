<?php
  @require 'language.php';
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
          <button class="indexbutton btn btn-dark" onclick="window.location.href='login.php'"><?php echo $lang->lang_login; ?></button>
          <button  class="indexbutton btn btn-dark active" onclick="window.location.href='register.php'"><?php echo $lang->lang_register;?></button>
        </div>
      </div>
    </nav>
    <h1 class="display-4"><?php echo $lang->lang_register;?></h1>
    <hr>
    <form action="php/register.php" method="post">
    <div class="form-group">
      <label><?php echo $lang->lang_username;?>:
        <input class="form-control" type="text" name="username" minlength="3" required disabled>
      </label>
    </div>
      <div class="form-group">
      <label><?php echo $lang->lang_password;?>:
        <input class="form-control" type="password" name="password" minlength="8" required disabled>
      </label>
    </div>
    <div class="form-group">
      <label><?php echo $lang->lang_password_verify;?>:
        <input class="form-control" type="password" name="password_verify" minlength="8" required disabled>
      </label>
    <div>
    <div class="form-group">
      <label><?php echo $lang->lang_email;?>:
        <input class="form-control" type="email" name="email" required disabled>
      </label>
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" required disabled>
      <label class="form-check-label" >AGB akzeptieren</label>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit" name="submit" disabled><?php echo $lang->lang_register;?></button>
    </div>
    </form>
  </body>
</html>
