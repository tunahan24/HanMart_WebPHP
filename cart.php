<?php
    ob_start();
    session_start();
    include_once("./config/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="icon" href="./assets/img/header/logo - Copy.png">
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.2-web/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <?php
        include_once("header.php");
    ?>

    <div class="main-cart">
        <h1>Shopping Cart</h1>
        <div class="table">
            <table class="table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-thumbnail"></th>
                        <th class="product-name">Sản phẩm</th>
                        <th class="product-price ">Đơn giá</th>
                        <th class="product-quantity ">Số lượng</th>
                        <th class="product-subtotal ">Tổng giá</th>
                        <th class="product-remove"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td class="product-thumbnail"><a href="" ><img src="./assets/img/products/banhmi.jpg" alt="Red"></a></td>
                        <td class="product-name "><a href="">Banh mi</a></td>
                        <td class="product-price " >
                            <div class="box-price"><span class="quantity">$258.39 </span></div>
                        </td>
                        <td class="product-quantity">
                            <div class="product-button">
                                <!-- <span class="ti-minus"></span> -->
                                <input class="input-text" name="" type="number" value="1" title="Qty" tabindex="0" step="1" min="1" max="18" required="">
                                <!-- <span class="ti-plus"></span> -->
                            </div>
                        </td>
                        <td class="product-subtotal " >
                            <div class="box-price"><span class="price-current">$258.39</span></div>
                        </td>
                        <td class="product-remove"><a class="" href="#" ><i class="fa-regular fa-trash-can"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <div class="total-price">
                <h2>Tổng tiền: 1000000 VNĐ</h2>
            </div>
            <div class="cart-button">
                <button class="back-btn"><i class="ti-arrow-left"></i>Continue Shopping</button>
                <button class="pay-btn">Thanh toán</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
        include_once("footer.php");
    ?>
</body>

</html>