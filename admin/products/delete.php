<?php
    session_start();
    $product_id=$_GET['product_id'];
    include_once('../../config/connect.php');
    $sql="DELETE FROM products WHERE product_id='$product_id'";
    $query=mysqli_query($connect,$sql);

    $message = "Xóa thành công!";
    echo "<script type='text/javascript'>alert('$message');window.location.href = '../index.php?page_layout=products';</script>";
?>