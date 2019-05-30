<?php
session_start();
include('../init.php');
if (isset($_GET['delete_admin']) && isset($_GET['admin_id']) && $_GET['token'] == $_SESSION['token']){
$rowCount= $post->deletAdmin($_GET['admin_id']);
if($rowCount==1) header("Location:../../menu.php?token=".$_SESSION['token']);


}
else header("Location:logout.php");
exit();