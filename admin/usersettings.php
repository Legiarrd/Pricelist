<?php
session_start();
require '../php/sql.php';
require '../php/users.php';
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<h1 class"display-1">Bitte zuerst <a href="../login.php">einloggen</a></h1>');
}
$permission = $pdo->prepare("SELECT permission FROM users WHERE id = ?");
$result = $permission->execute(array($_SESSION['userid']));
$verifyper = $permission->fetch();
$verifyper = implode($verifyper);
if(!$verifyper == "admin") {
    include '../php/noperm.php';
    die('<h1 class"display-1">Sie haben nicht die benötigten Berechtigungen</h1>');
}
function username() {
require '../php/sql.php';
require '../php/users.php';
$id = $_GET['edit'];
$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$exec = $user->execute(array($id));
while($row = $user->fetch()) {echo ($row['username']);}
}
function emailadr() {
  require '../php/sql.php';
  require '../php/users.php';
$id = $_GET['edit'];
$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$exec = $user->execute(array($id));
while($row = $user->fetch()) {echo ($row['email']);}
}
function group() {
  require '../php/sql.php';
  require '../php/users.php';
$id = $_GET['edit'];
$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$exec = $user->execute(array($id));
while($row = $user->fetch()) {echo ($row['permission']);}
}
function id() {
  require '../php/sql.php';
  require '../php/users.php';
$id = $_GET['edit'];
$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$exec = $user->execute(array($id));
while($row = $user->fetch()) {echo ($row['id']);}
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../index.php">Preistabelle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="navbar-nav">
        <a class="btn btn-dark"href='users.php'><i class="fas fa-chevron-left"></i> Zurück</a>
      </div>
    </div>
  </nav>
  <br>
  <form action ="../php/changeusersettings.php" method="post">
    <div class="form-group">
    <input class="form-control" type="text" name="id" size="20" value="<?php id(); ?>" readonly hidden>
    <label>Username
    <input class="form-control" type="text" name="username" size="20" value="<?php username(); ?>">
  </label>
  <label>Passwort
  <input class="form-control" type="password" name="password" size="30" placeholder="neues Passwort">
</div>
</label>
  <div class="form-group">
  <label>Email-Adresse
    <input class="form-control" type="text" name="email" value="<?php emailadr(); ?>">
  </label>
  <label>Rechte
    <input class="form-control" type="text" name="permission" min="0" max="1" maxlength="1" value="<?php group(); ?>">
  </label>
</div>
  <div class="form-group">
  <button class="btn btn-primary" type="submit">speichern</button>
</form>
  </body>
</html>
