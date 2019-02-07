<?php
session_start();
if ($_SESSION == true) {
  header('Location: index.php');
}
  @require 'language.php';
  require 'php/sql.php';
  require 'php/users.php';
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
          <a class="btn btn-dark" href='login.php'>Anmelden</a>
          <a class="btn btn-dark active" href='register.php'>Registrieren</a>
          <a class="btn btn-dark" href='index.php'>Zurück</a>
        </div>
      </div>
    </nav>
    <?php
    $showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
    if($showFormular) {
    ?>
      <h1 class="display-4"><?php echo $lang->lang_register;?></h1>
      <hr>
      <form action="?register=1" method="post">
      <div class="form-group">
        <label><?php echo $lang->lang_username;?>:
          <input class="form-control" type="text" name="username" minlength="3" required>
        </label>
      </div>
        <div class="form-group">
        <label><?php echo $lang->lang_password;?>:
          <input class="form-control" type="password" name="password" minlength="8" required>
        </label>
      </div>
      <div class="form-group">
        <label><?php echo $lang->lang_password_verify;?>:
          <input class="form-control" type="password" name="password_verify" minlength="8" required>
        </label>
      <div>
      <div class="form-group">
        <label><?php echo $lang->lang_email;?>:
          <input class="form-control" type="email" name="email" required>
        </label>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" required>
        <label class="form-check-label" >AGB akzeptieren</label>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="submit" name="submit"><?php echo $lang->lang_register;?></button>
      </div>
      </form>
    </form>

    <?php
    } //Ende von if($showFormular)

    if(isset($_GET['register'])) {
        $error = false;
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_verify = $_POST['password_verify'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger" role="alert">Bitte eine gültige E-Mail-Adresse eingeben</div>';
            $error = true;
        }
        if(strlen($username) < 3) {
            echo '<div class="alert alert-danger" role="alert">Bitte geben Sie ein Username mit mindestens 3 Zeichen ein!</div>';
            $error = true;
        }
        if(strlen($password) == 0) {
            echo '<div class="alert alert-danger" role="alert">Bitte ein Passwort angeben</div>';
            $error = true;
        }
        if(strlen($password) < 8) {
            echo '<div class="alert alert-danger" role="alert">Bitte geben Sie ein Passwort mit mindestens 8 Zeichen ein!</div>';
            $error = true;
        }
        if($password != $password_verify) {
            echo '<div class="alert alert-danger" role="alert">Die Passwörter müssen übereinstimmen</div>';
            $error = true;
        }
        if(!$error) {
            $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $result = $statement->execute(array('email' => $email));
            $user = $statement->fetch();
            if($user !== false) {
                echo '<div class="alert alert-danger" role="alert">Diese E-Mail-Adresse ist bereits vergeben</div>';
                $error = true;
            }
        }
        if(!$error) {
          $statement = $pdo->prepare("SELECT * FROM users WHERE username = :user");
          $result = $statement->execute(array('user' => $username));
          $user = $statement->fetch();

          if($user !== false) {
              echo '<div class="alert alert-danger" role="alert">Dieser Username ist bereits vergeben</div>';
              $error = true;
          }
        }
        if(!$error) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $statement = $pdo->prepare("INSERT INTO users (username ,email, password) VALUES (:user, :email, :password)");
            $result = $statement->execute(array('user' => $username, 'email' => $email, 'password' => $password_hash));

            if($result) {
                $placeholder = "'login.php'";
                echo '<script type="text/javascript">';
                echo 'window.setTimeout("window.location = '. $placeholder . '",5000);</script>';
                echo '<div class="alert alert-success" role="alert"><p>Du wurdest erfolgreich registriert. Sie werden in 5 Sekunden automatisch weitergeleitet.</p>
                 <p>Falls sie nicht weitergeleitet werden, klicken sie auf diesen Link: <a href="login.php">Anmelden</a></p></div>';
                $showFormular = false;
            } else {
                echo '<div class="alert alert-danger" role="alert">Beim Abspeichern ist leider ein Fehler aufgetreten</div>';
            }
        }
    }
    ?>
  </body>
</html>
