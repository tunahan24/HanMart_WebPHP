<?php
    session_start();
    $cat_id=$_GET['cat_id'];
    include_once('../../config/connect.php');
    $sql="DELETE FROM category WHERE cat_id='$cat_id'";
    $query=mysqli_query($connect,$sql);
    
    $message = "Xóa thành công!";
    echo "<script type='text/javascript'>alert('$message');window.location.href = '../index.php?page_layout=category';</script>";
?>