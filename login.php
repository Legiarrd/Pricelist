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
    <h1><?php echo $lang->lang_login;?></h1>
    <hr>
    <form action="php/login.php" method="post">
      <label><?php echo $lang->lang_username;?>:
        <input type="text" name="username" minlength="3" maxlength="32" required>
      </label>
      <label><?php echo $lang->lang_password;?>:
        <input type="password" name="password" minlength="8" maxlength="32" required>
      </label>
      <button type="submit" name="submit"><?php echo $lang->lang_login;?></button>
    </form>
  </body>
</html>
