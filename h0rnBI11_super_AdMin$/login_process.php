<?php
session_start();
include('core/init.php');

if( isset($_POST['btn_submit']) && $_POST['tok'] == $_SESSION['token']) {

    $currentTime = time() + 25200;
    $expired = 3600;
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass_sha = hash("sha512", $pass);
    $rowCount = $post -> loginProcess($super_admin_table,"email",$email, $pass_sha);
    if($rowCount == 1)
    {
        $_SESSION['user'] = $email;
        $_SESSION['timeout'] = $currentTime + $expired;
        header("location: dashboard.php");
    }
    else{
        echo "Password Wrong";
    }

}
else{
    header("location: super_login_page.php");
    exit();
}


