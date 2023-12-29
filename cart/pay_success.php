<?php
$user_id=$_SESSION["user_id"];
$code_order=rand(0,9999);

$insert_cart = "INSERT INTO cart(user_id, code_cart, status_cart) VALUES('$user_id','$code_order',1)";
$cart_query = mysqli_query($connect,$insert_cart);
if($cart_query){
    foreach($_SESSION['cart'] as $product_id => $product_qty){
        $insert_cart_detail = "INSERT INTO cart_detail(product_id, code_cart, soluong) VALUES('$product_id','$code_order','$product_qty')";
        mysqli_query($connect,$insert_cart_detail);
    }
    unset($_SESSION["cart"]);
    header("location: ./cart.php?page_layout=pay_return");
}
?>
