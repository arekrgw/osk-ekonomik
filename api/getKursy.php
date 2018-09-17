<?php

    require_once("_authUser.php");

    if(/*Auth true*/){
        require_once('_database.php');

        switch($_GET['option']){
            case "all":
                $query = "SELECT * FROM kursy";
            break;
        }
    }