<?php
session_start();
if(isset($_SESSION['user_email'])){
    session_destroy();
    header('location: login_form.php');
}else{
    header('location: login_form.php');
}
?>