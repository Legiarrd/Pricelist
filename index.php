<?php
 @require 'language.php';
 require 'php/sql.php';
 require 'php/itemtable.php';
 ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $lang->lang_pricelist;?></title>
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
          <button class="indexbutton btn btn-dark" onclick="window.location.href='login.php'"><?php echo $lang->lang_login; ?></button>
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='register.php'"><?php echo $lang->lang_register;?></button>
          <button  class="indexbutton btn btn-dark" onclick="window.location.href='add.php'"><?php echo $lang->lang_add;?></button>
          <form class="form-inline my-2 my-lg-0" method="get">
          <input class="form-control mr-sm-1" type="text" name="search" placeholder="Suche" maxlength="255">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Los</button>
        </form>
        </div>
      </div>
    </nav>
    <div id="header">
  </div>
  <section class="table">
    <table>
      <tr>
        <th><a href="?sort=yes"><?php echo $lang->lang_table_item ?></a></th>
        <th><a href="?sortbycat=yes"><?php echo $lang->lang_table_category ?></a></th>
        <th><?php echo $lang->lang_table_pricetag ?></th>
        <th><a href="?sortbysto=yes"><?php echo $lang->lang_table_store ?></a></th>
      </tr>
    <?php
    $sort = @$_GET['sort'];
    $search = @$_GET['search'];
    $sbc = @$_GET['sortbycat'];
    $sbs = @$_GET['sortbysto'];
    if ($sbc == "yes") {
      echo "<form action'#'><button class='indexbutton btn btn-link' type='submit'>Zurück</button></form>";
      sortbycat();
    }
    else {
      if ($sbs == "yes") {
        echo "<form action'#'><button class='indexbutton btn btn-link' type='submit'>Zurück</button></form>";
        sortbysto();
      } else {
        if ($search) {
          echo "<form action'#'><button class='indexbutton btn btn-link' type='submit'>Zurück</button></form>";
          $select = "SELECT * FROM itemtable WHERE item LIKE '%$search%'";
          foreach ($pdo -> query($select) as $row) {
            echo "<tr><td>".$row['item']."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['pricetag']."</td>";
            echo "<td>".$row['store']."</td></tr>";
          }
        } else {
          if ($sort == "yes") {
          echo "<form action'#'><button class='indexbutton btn btn-link' type='submit'>Zurück</button></form>";
            order();
          } else {
      foreach ($pdo -> query($table) as $row) {
        echo "<tr><td>".$row['item']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['pricetag']."</td>";
        echo "<td>".$row['store']."</td></tr>";
            }
      }
    }
  }
}
  function order() {
    include 'php/sql.php';
    $sortbycat = "SELECT * FROM itemtable ORDER BY item";
    foreach ($pdo -> query($sortbycat) as $row) {
      echo "<tr><td>".$row['item']."</td>";
      echo "<td>".$row['category']."</td>";
      echo "<td>".$row['pricetag']."</td>";
      echo "<td>".$row['store']."</td></tr>";
    }
  }

    function sortbycat() {
      include 'php/sql.php';
      $sortbycat = "SELECT * FROM itemtable ORDER BY category";
      foreach ($pdo -> query($sortbycat) as $row) {
        echo "<tr><td>".$row['item']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['pricetag']."</td>";
        echo "<td>".$row['store']."</td></tr>";
      }
    }
    function sortbysto() {
      include 'php/sql.php';
      $sortbysto = "SELECT * FROM itemtable ORDER BY store";
      foreach ($pdo -> query($sortbysto) as $row) {
        echo "<tr><td>".$row['item']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['pricetag']."</td>";
        echo "<td>".$row['store']."</td></tr>";
      }
    }
     ?>
   </table>
 </section>
 <hr>
<!-- <p align="center">made by <a href="https://github.com/legiarrd">Legiarrd</a></p> -->
  </body>
</html>
