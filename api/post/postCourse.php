<?php
require("../_verify.php");

if(isset($_POST['verify']) && $_POST['verify'] === $verify) {

require("../database.php");

  if(isset($_POST['date'])) {
    Db::fetch("UPDATE data_kursu SET data_kursu=:date WHERE id_kurs=:id", array(
      "date" => $_POST['date'],
      "id" => 1
    ));
  }

  if(isset($_POST['place'])) {
    Db::fetch("UPDATE data_kursu SET miejsce_kursu=:place WHERE id_kurs=:id", array(
      "place" => $_POST['place'],
      "id" => 1
    ));
  }


  if(isset($_POST['hour'])) {
    Db::fetch("UPDATE data_kursu SET godzina_kursu=:hour WHERE id_kurs=:id", array(
      "hour" => $_POST['hour'],
      "id" => 1
    ));
  }
}