<?php

//error_reporting(0);
//ini_set('display_errors', 0);

include 'database/connection.php';
include 'classes/function.php';
$super_admin_table="super_admin";
$company_table="tbl_company";
$tbl_admin="tbl_admin";
global $pdo;
$post   = new Post($pdo);
?>
