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
        <table class="table" cellspacing="0">
            <thead>
                <tr>
                    <th class="product-thumbnail"></th>
                    <th class="product-name">Product</th>
                    <th class="product-price ">Price</th>
                    <th class="product-quantity ">Quantity</th>
                    <th class="product-subtotal ">Total</th>
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
    </div>

    <!-- Footer -->
    <?php
        include_once("footer.php");
    ?>
</body>

</html>