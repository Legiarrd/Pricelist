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
        </div>
      </div>
    </nav>
    <h1 class="display-4">Passwort zurücksetzen</h1>
    <hr>
<?php
require 'php/sql.php';
require 'php/users.php';

if(!isset($_GET['userid']) || !isset($_GET['code'])) {
 die("Leider wurde beim Aufruf dieser Website kein Code zum Zurücksetzen deines Passworts übermittelt");
}

$userid = $_GET['userid'];
$code = $_GET['code'];

//Abfrage des Nutzers
$statement = $pdo->prepare("SELECT * FROM users WHERE id = :userid");
$result = $statement->execute(array('userid' => $userid));
$user = $statement->fetch();

//Überprüfe dass ein Nutzer gefunden wurde und dieser auch ein passwordcode hat
if($user === null || $user['passwordcode'] === null) {
 die("Es wurde kein passender Benutzer gefunden");
}

if($user['passwordcode_time'] === null || strtotime($user['passwordcode_time']) < (time()-24*3600) ) {
 die("Dein Code ist leider abgelaufen");
}


//Überprüfe den passwordcode
if(sha1($code) != $user['passwordcode']) {
 die("Der übergebene Code war ungültig. Stell sicher, dass du den genauen Link in der URL aufgerufen hast.");
}

//Der Code war korrekt, der Nutzer darf ein neues Passwort eingeben

if(isset($_GET['send'])) {
 $password = @$_POST['password'];
 $password_verify = @$_POST['password2'];

 if($password != $password_verify) {
 echo "Bitte identische Passwörter eingeben";
 } else { //Speichere neues Passwort und lösche den Code
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
