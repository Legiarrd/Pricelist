<?php
require '../language.php';
require 'sql.php';
require 'users.php';
$username = $_POST['username'];
$password = $_POST['password'];

$statement = $pdo -> prepare("SELECT * FROM users WHERE username = :username");
$result = $statement -> execute(array('username' => $username));
$user = $statement -> fetch();
echo $lang->lang_register;
if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        if(isset($_POST['angemeldet_bleiben'])) {
            $identifier = random_string();
            $securitytoken = random_string();

            $insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
            $insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
            setcookie("identifier",$identifier,time()+(3600*24*365)); //1 Jahr Gültigkeit
            setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //1 Jahr Gültigkeit
         }
        die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
?>
