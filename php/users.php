<?php
  $config = parse_ini_file("../ini/db.ini");
  $pdo =  new PDO(sprintf("mysql:host=%s;dbname=%s", $config['host'], $config['dbname']), $config['dbusername'], $config['dbpw']);
  $users = "SELECT * FROM users";
?>
