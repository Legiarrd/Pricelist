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
    <div id="header">
    <button class="indexbutton" onclick="window.location.href='login.php'"><?php echo $lang->lang_login; ?></button>
    <button  class="indexbutton" onclick="window.location.href='register.php'"><?php echo $lang->lang_register;?></button>
    <button  class="indexbutton" onclick="window.location.href='add.php'"><?php echo $lang->lang_add;?></button>
    <section class="search">
    <form method="get">
    <input type="text" name="search" placeholder="Suche" maxlength="255">
    <button type="submit">Los</button>
  </form>
  </section>
  </div>
  <section class="table">
    <table>
      <tr>
        <th><?php echo $lang->lang_table_item ?></th>
        <th><a href="?sortbycat=yes"><?php echo $lang->lang_table_category ?></a></th>
        <th><?php echo $lang->lang_table_pricetag ?></th>
        <th><a href="?sortbysto=yes"><?php echo $lang->lang_table_store ?></a></th>
      </tr>
    <?php
    $search = @$_GET['search'];
    $sbc = @$_GET['sortbycat'];
    $sbs = @$_GET['sortbysto'];
    if ($sbc == "yes") {
      echo "<form action'#'><button class='indexbutton' type='submit'>Zurück</button></form>";
      sortbycat();
    }
    else {
      if ($sbs == "yes") {
        echo "<form action'#'><button class='indexbutton' type='submit'>Zurück</button></form>";
        sortbysto();
      } else {
        if ($search) {
          echo "<form action'#'><button class='indexbutton' type='submit'>Zurück</button></form>";
          $select = "SELECT * FROM itemtable WHERE item == '$search'";
          foreach ($pdo -> query($select) as $row) {
            echo "<tr><td>".$row['item']."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['pricetag']."</td>";
            echo "<td>".$row['store']."</td></tr>";
          }
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
