<?php

require("../database.php");

$result = Db::fetch("SELECT * FROM ceny_kursow")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
