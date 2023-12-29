<?php
    session_start();
    $id=$_GET['code'];
    include_once('../../config/connect.php');
    $sql_cart="DELETE FROM cart WHERE code_cart='$id'";
    mysqli_query($connect,$sql_cart);
    $sql_cart_detail="DELETE FROM cart_detail WHERE code_cart='$id'";
    mysqli_query($connect,$sql_cart_detail);

    $message = "Xóa thành công!";
    echo "<script type='text/javascript'>alert('$message');window.location.href = '../index.php?page_layout=cart_order';</script>";
?>