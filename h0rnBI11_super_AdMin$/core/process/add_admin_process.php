<?php
session_start();
include('../init.php');

if( isset($_POST['btnAddAdmin']) && $_POST['tok'] == $_SESSION['token']) {
  $name=  $post->test_input($_POST['username']);
  $email=  $post->test_input($_POST['email']);
  $position=  $post->test_input($_POST['position']);
  $password=  $post->test_input($_POST['confirm_password']);
  $pass_sha = hash("sha512", $password);

  $result =$post->create($tbl_admin,array(
      'name' => $name,
      'email' => $email,
      'position' => $position,
      'password' => $pass_sha,
      ));
  if($result) header("location:../../add-admin.php?id");

}
else{
    header("location:../classes/logout.php ");
    exit();
}
