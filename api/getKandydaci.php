<?php

    require_once("_authUser.php");

    if(/*Auth true*/){
        require_once('_database.php');

        if($_GET['year']){
            $query = "SELECT * FROM kandydaci INNER JOIN kursy ON kandydaci.id_kursu=kursy.id_kursu WHERE kursy.data=:year";
            $params = array(
                "year" => $_GET['year'];
            );

        }
        else{
            $query = "SELECT * FROM kandydaci";
        }
    }