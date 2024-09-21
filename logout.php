<?php
session_start();
if(isset($_SESSION['user_name'])){
    session_destroy();
    unset($_SESSION['access_token']);
    header('location: login_form.php');
}else{
    header('location: login_form.php');
}
?>