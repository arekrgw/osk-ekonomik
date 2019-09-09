<?php

require("../database.php");

$result = Db::fetch("SELECT * FROM data_kursu")->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
