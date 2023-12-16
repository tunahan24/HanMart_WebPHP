<?php
    session_start();
    $user_id=$_GET['user_id'];
    include_once('../../config/connect.php');
    $sql="DELETE FROM user WHERE user_id='$user_id'";
    $query=mysqli_query($connect,$sql);

    $message = "Xóa thành công!";
    echo "<script type='text/javascript'>alert('$message');window.location.href = '../index.php?page_layout=taikhoan';</script>";
?>