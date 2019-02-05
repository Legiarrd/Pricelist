<?php
  require '../php/sql.php';
  $pdo->exec("
  CREATE TABLE `pricelist` (
    `id` int(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    )
  ")
 ?>
