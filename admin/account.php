<?php
session_start();
if(!isset($_SESSION['userid'])) {
    include '../php/notlogin.php';
    die('<div class="alert alert-danger" role="alert">Sie sind zurzeit nicht angemeldet!</div>');
}
$config = parse_ini_file("../ini/db.ini");
$pdo =  new PDO(sprintf("mysql:host=%s;dbname=%s", $config['host'], $config['dbname']), $config['dbusername'], $config['dbpw']);
$users = "SELECT * FROM users";
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Account bearbeiten | Preistabelle</title>
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
          <a class="btn btn-dark" href='index.php'>Admin Panel</a>
          <a class="btn btn-dark" href='edit.php'>Einträge bearbeiten</a>
          <a class="btn btn-dark" href='add.php'>Eintrag hinzufügen</a>
          <a class="btn btn-dark" href='users.php'>Users</a>
          <a class="btn btn-dark active" href='account.php'>Account bearbeiten</a>
        </div>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
          <a class="btn btn-dark" href='../index.php'><i class="fas fa-home"></i> Zur Startseite</a>
          <a class="btn navbar-btn btn-dark"href='../php/logout.php'><i class="fas fa-sign-out-alt"></i> Logout</a>
        </ul>
        </div>
      </div>
    </nav>
    <h1 class="display-4">Account bearbeiten</h1>
    <hr>
    <form action ="?submit=1" method="post">
      <div class="form-group">
      <label>Username
      <input class="form-control" type="text" name="username" size="20" value="<?php username(); ?>">
    </label>
    <label>Passwort
    <input class="form-control" type="password" name="password" size="30" placeholder="neues Passwort">
  </label>
    <label>Email-Adresse
      <input class="form-control" type="email" name="email" value="<?php emailadr(); ?>">
    </label>
    <button class="btn btn-primary" type="submit">speichern</button>
  </div>
  </form>
  <?php if(!@$_GET['del']) {echo '<a class="btn btn-danger" href="?del=true">Account löschen</a>';}?>
  </body>
</html>
<?php
$id = $_SESSION['userid'];
$email = @$_POST['email'];
$username = @$_POST['username'];
$password = @$_POST['password'];
function username() {
require '../php/users.php';
$id = $_SESSION['userid'];
$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$exec = $user->execute(array($id));
while($row = $user->fetch()) {echo ($row['username']);}
}
function emailadr() {
require '../php/users.php';
$id = $_SESSION['userid'];
$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$exec = $user->execute(array($id));
while($row = $user->fetch()) {echo ($row['email']);}
}

  if (isset($_GET['submit'])) {
    $query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $exec = $query->execute(array($id));
    $query = $query->fetch();
    if($password != 0) {
      $pw = password_hash($password, PASSWORD_DEFAULT);
      echo $pw;
      $pwchange = $pdo->prepare("UPDATE users SET password = ? where id = $id");
      $pwchange -> execute(array($pw));
    }
    if($username) {
      if($username == $query['username']) {} else {
      $userchange = $pdo->prepare("UPDATE users SET username = ? where id = $id");
      $userchange -> execute(array($username));
      }
    }
    if($email) {
      if($email == $query['email']) {} else {
      $emailchange = $pdo->prepare("UPDATE users SET email = ? where id = $id");
      $emailchange -> execute(array($email));
      }
    }
    header('Location: account.php');
  }
  if (isset($_GET['del'])) {
    echo "<p></p>
    <form action='?delverify=yes' method='post'>
    <div class='form-group'>
    <div class='alert alert-danger' role='alert'>Sind sie Sicher, dass Sie ihr Account löschen wollen?
    <br>Ihr Account wird damit unwiderruflich gelöscht!</div>
    <button class='btn btn-danger' type='submit'>Löschen!</button></div></div>
    ";
  }
  if (isset($_GET['delverify'])) {
    $del = $pdo->prepare("DELETE FROM users where id = $id");
    $del -> execute(array($pw));
    session_destroy();
    header ("Location: ../index.php");
  }
 ?>
