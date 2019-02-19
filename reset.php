<?php
session_start();
if ($_SESSION == true) {
  header('Location: index.php');
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Passwort zurücksetzen | Preistabelle</title>
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
        </div>
      </div>
    </nav>
    <h1 class="display-4">Passwort zurücksetzen</h1>
    <hr>
<?php
$config = parse_ini_file("ini/db.ini");
$pdo =  new PDO(sprintf("mysql:host=%s;dbname=%s", $config['host'], $config['dbname']), $config['dbusername'], $config['dbpw']);
$users = "SELECT * FROM users";

if(!isset($_GET['userid']) || !isset($_GET['code'])) {
 die("Leider wurde beim Aufruf dieser Website kein Code zum Zurücksetzen deines Passworts übermittelt");
}

$userid = $_GET['userid'];
$code = $_GET['code'];

$statement = $pdo->prepare("SELECT * FROM users WHERE id = :userid");
$result = $statement->execute(array('userid' => $userid));
$user = $statement->fetch();

if($user === null || $user['passwordcode'] === null) {
 die("Es wurde kein passender Benutzer gefunden");
}

if($user['passwordcode_time'] === null || strtotime($user['passwordcode_time']) < (time()-24*3600) ) {
 die("Dein Code ist leider abgelaufen");
}


if(sha1($code) != $user['passwordcode']) {
 die("Der übergebene Code war ungültig. Stell sicher, dass du den genauen Link in der URL aufgerufen hast.");
}

if(isset($_GET['send'])) {
 $password = @$_POST['password'];
 $password_verify = @$_POST['password2'];

 if($password != $password_verify) {
 echo "Bitte identische Passwörter eingeben";
 } else {
 $passwordhash = password_hash($password, PASSWORD_DEFAULT);
 $statement = $pdo->prepare("UPDATE users SET password = :passwordhash, passwordcode = NULL, passwordcode_time = NULL WHERE id = :userid");
 $result = $statement->execute(array('passwordhash' => $passwordhash, 'userid'=> $userid ));

 if($result) {
 die("Dein Passwort wurde erfolgreich geändert");
 }
 }
}
?>
<form action="?send=1&amp;userid=<?php echo htmlentities($userid); ?>&amp;code=<?php echo htmlentities($code); ?>" method="post">
<div class="form-group">
<label>Neues Passwort:
<input class="form-control" type="password" name="password"></label>
<label>Passwort bestätigen:
<input class="form-control" type="password" name="password2"></label>
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit">Passwort speichern</button>
</div>
</form>
</body>
</html>
