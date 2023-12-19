<?php
session_start();
$product_id=$_GET['product_id'];

if(isset($_SESSION['cart'][$product_id])){
    $_SESSION['cart'][$product_id]=$_SESSION['cart'][$product_id] + 1;
}else{
    $_SESSION['cart'][$product_id] = 1;
}
$message = "Thêm vào giỏ hàng thành công!";
echo "<script type='text/javascript'>alert('$message');window.location.href = '../cart.php';</script>";
?>