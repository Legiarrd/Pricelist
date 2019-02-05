<?php
 $language = file_get_contents('admin/language/language.txt');
  $deu = "xml/de.xml";
  $eng = "xml/en.xml";
  switch($language) {
    case 1:
        $lang = simplexml_load_file("$deu");
      break;
    case 2:
        $lang = simplexml_load_file("$eng");
      break;
    default:
        $lang = simplexml_load_file("$deu");
      break;
  }
 ?>
