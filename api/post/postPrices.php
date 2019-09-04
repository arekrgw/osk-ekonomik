<?php

require("../database.php");

$query ='UPDATE ceny_kursow SET cena=:price, ilosc_godz=:hours WHERE nazwa=:kurs';
$queryNoP ='UPDATE ceny_kursow SET ilosc_godz=:hours WHERE nazwa=:kurs';
$queryNoH ='UPDATE ceny_kursow SET cena=:price WHERE nazwa=:kurs';


if(isset($_POST['cat-b'])) {
  $catArray = explode("+", $_POST["cat-b"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "B" ));
  }
  else if($catArray[0] == "null" && count($catArray) == 2) {
    Db::fetch($queryNoP, array("hours" => $catArray[1],"kurs" => "B" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "B" ));
  }
  echo count($catArray);
}

if(isset($_POST['cat-am'])) {
  $catArray = explode("+", $_POST["cat-am"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "AM" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "AM" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-a1'])) {
  $catArray = explode("+", $_POST["cat-a1"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "A1" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "A1" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-a2'])) {
  $catArray = explode("+", $_POST["cat-a2"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "A2" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "A2" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-a'])) {
  $catArray = explode("+", $_POST["cat-a"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "A" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "A" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-c'])) {
  $catArray = explode("+", $_POST["cat-c"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "C" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "C" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-ce'])) {
  $catArray = explode("+", $_POST["cat-ce"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "C+E" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "C+E" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-cce'])) {
  $catArray = explode("+", $_POST["cat-cce"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "C/C+E" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "C/C+E" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-db'])) {
  $catArray = explode("+", $_POST["cat-bb"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "D/B" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "D/B" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-dc'])) {
  $catArray = explode("+", $_POST["cat-dc"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "D/C" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "D/C" ));
  }
  echo json_encode($catArray);
}

if(isset($_POST['cat-t'])) {
  $catArray = explode("+", $_POST["cat-t"]);
  if(count($catArray) == 1) {
    Db::fetch($queryNoH, array("price" => $catArray[0], "kurs" => "T" ));
  }
  else {
    Db::fetch($query, array("price" => $catArray[0], "hours" => $catArray[1],"kurs" => "T" ));
  }
  echo json_encode($catArray);
}