<?php

$pdo = new PDO('mysql:host=localhost;dbname=intern-myanmar',"root","");
//s$con = new PDO('mysql:host=localhost;dbname=utycc', "root", "1234");
$pdo->exec("SET NAMES UTF-8;");
$pdo->exec("SET character_set_results=UTF-8;");
$pdo->exec("SET character_set_client=UTF-8;");
$pdo->exec("SET character_set_connection=UTF-8;");
$pdo->exec("SET collation_connection=UTF-8;");