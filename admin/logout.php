<?php
session_start();
if(isset($_SESSION['admin_email'])){
    session_destroy();
    header('location: ../login_admin_form.php');
}else{
    header('location: ../login_admin_form.php');
}
?>