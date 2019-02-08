<?php
if(file_exists('ini/db.ini') == FALSE) {
  header ('Location: SETUP/index.php');
}
session_start();
 require 'php/itemtable.php';
 ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Preistabelle</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/main.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg ml navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Preistabelle</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php if (@$_SESSION['userid'] == false) {
            echo '<a class=" btn btn-dark" href="login.php">Anmelden</a>';
            echo '<a class=" btn btn-dark" href="register.php">Registrieren</a>';
          } else {
            echo '<a class=" btn btn-dark" href="admin/index.php">Admin Panel</a>';
          }
          if(@$_GET['search'] OR @$_GET['sort'] OR @$_GET['sortbycat'] OR @$_GET['sortbysto']) {
          echo "<a class='btn btn-dark' href='index.php'>Zurück</a>";
          };
        ?>
          <div class="ml-auto">
          <form class="form-inline my-2 my-lg-0" method="get">
          <input class="form-control mr-sm-1" type="text" name="search" placeholder="Nach Artikel suchen" maxlength="255" size="70">
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
          <?php if (@$_SESSION['userid'] == true) {
            echo '<a class="btn btn-dark" href="php/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>';
          }
          ?>
        </form>
        </div>
      </div>
      </div>
    </nav>
  <section class="table">
    <table>
      <tr>
        <th><a href="?sort=yes">Artikel</a></th>
        <th><a href="?sortbycat=yes">Kategorie</a></th>
        <th>Preis</th>
        <th><a href="?sortbysto=yes">Markt</a></th>
        <th>Letzte Aktualisierung</th>
      </tr>
    <?php
    $sort = @$_GET['sort'];
    $search = @$_GET['search'];
    $sbc = @$_GET['sortbycat'];
    $sbs = @$_GET['sortbysto'];
    if ($sbc == "yes") {
      sortbycat();
    }
    else {
      if ($sbs == "yes") {
        sortbysto();
      } else {
        if ($search) {
          $select = "SELECT * FROM itemtable WHERE item LIKE '%$search%'";
          foreach ($pdo -> query($select) as $row) {
            echo "<tr><td>".$row['item']."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['pricetag']."€</td>";
            echo "<td>".$row['store']."</td>";
            echo "<td>".$row['last_update']."</td></tr>";
          }
        } else {
          if ($sort == "yes") {
            order();
          } else {
      foreach ($pdo -> query($table) as $row) {
        echo "<tr><td>".$row['item']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['pricetag']."€</td>";
        echo "<td>".$row['store']."</td>";
        echo "<td>".$row['last_update']."</td></tr>";
            }
      }
    }
  }
}
  function order() {
    include 'php/itemtable.php';
    $sortbycat = "SELECT * FROM itemtable ORDER BY item";
    foreach ($pdo -> query($sortbycat) as $row) {
      echo "<tr><td>".$row['item']."</td>";
      echo "<td>".$row['category']."</td>";
      echo "<td>".$row['pricetag']."€</td>";
      echo "<td>".$row['store']."</td>";
          echo "<td>".$row['last_update']."</td></tr>";
    }
  }

    function sortbycat() {
      include 'php/itemtable.php';
      $sortbycat = "SELECT * FROM itemtable ORDER BY category";
      foreach ($pdo -> query($sortbycat) as $row) {
        echo "<tr><td>".$row['item']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['pricetag']."€</td>";
        echo "<td>".$row['store']."</td>";
        echo "<td>".$row['last_update']."</td></tr>";
      }
    }
    function sortbysto() {
      include 'php/itemtable.php';
      $sortbysto = "SELECT * FROM itemtable ORDER BY store";
      foreach ($pdo -> query($sortbysto) as $row) {
        echo "<tr><td>".$row['item']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['pricetag']."€</td>";
        echo "<td>".$row['store']."</td>";
        echo "<td>".$row['last_update']."</td></tr>";
      }
    }
     ?>
   </table>
 </section>
 <hr>
 <!--<p align="center">made by <a href="https://github.com/legiarrd">Legiarrd</a></p> -->
  </body>
</html>
