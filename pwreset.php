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
          <a class="btn btn-dark" href='login.php'>Zurück</a>
        </div>
      </div>
    </nav>
    <h1 class="display-4">Passwort zurücksetzen</h1>
    <hr>
    <?php
    require 'php/sql.php';
    require 'php/users.php';
    function random_string() {
     if(function_exists('random_bytes')) {
     $bytes = random_bytes(16);
     $str = bin2hex($bytes);
     } else if(function_exists('openssl_random_pseudo_bytes')) {
     $bytes = openssl_random_pseudo_bytes(16);
     $str = bin2hex($bytes);
     } else if(function_exists('mcrypt_create_iv')) {
     $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
     $str = bin2hex($bytes);
     } else {
     //Bitte euer_geheim_string durch einen zufälligen String mit >12 Zeichen austauschen
     $str = md5(uniqid('Fh#!iSQ^6!9Z', true));
     }
     return $str;
    }


    $showForm = true;

    if(isset($_GET['send']) ) {
     if(!isset($_POST['email']) || empty($_POST['email'])) {
     $error = "<b>Bitte eine E-Mail-Adresse eintragen</b>";
     } else {
     $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
     $result = $statement->execute(array('email' => $_POST['email']));
     $user = $statement->fetch();

     if($user === false) {
     $error = "<b>Kein Benutzer gefunden</b>";
     } else {
     //Überprüfe, ob der User schon einen Passwortcode hat oder ob dieser abgelaufen ist
     $passwortcode = random_string();
     $statement = $pdo->prepare("UPDATE users SET passwordcode = :passwordcode, passwordcode_time = NOW() WHERE id = :userid");
     $result = $statement->execute(array('passwordcode' => sha1($passwortcode), 'userid' => $user['id']));

     $empfaenger = $user['email'];
     $betreff = "Passwort zurücksetzen";
     $from = "From: NoReply <noreply@test.tld>";
     $url_passwortcode = 'http://localhost/php/reset.php?userid='.$user['id'].'&code='.$passwortcode;
     $text = 'Hallo '.$user['username'].',
    Um ein neues Passwort zu vergeben, rufe innerhalb der nächsten 24 Stunden die folgende Website auf:
    '.$url_passwortcode.'

    Sollte dir dein Passwort wieder eingefallen sein oder hast du dies nicht angefordert, so bitte ignoriere diese E-Mail.';

     mail($empfaenger, $betreff, $text, $from);

     echo "Ein Link um dein Passwort zurückzusetzen wurde an deine E-Mail-Adresse gesendet.";
     $showForm = false;
     }
     }
    }

    if($showForm):
    ?>
    <?php
    if(isset($error) && !empty($error)) {
     echo $error;
    }
    ?>

    <form action="?send=1" method="post">
    <div class="form-group">
    <label>E-Mail:
    <input class="form-control" type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlentities($_POST['email']) : ''; ?>">
  </label>
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Neues Passwort">
  </div>
    </form>

    <?php
    endif; //Endif von if($showForm)
    ?>
  </body>
</html>

<?php
