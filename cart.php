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
    <link rel="stylesheet" href="./admin/css/main_admin.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
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
        <?php
            if (isset($_GET["page_layout"])) {
                switch ($_GET['page_layout']){
                    case "main_cart":
                        include_once("./cart/main_cart.php");
                        break;
                    case "pay_success":
                        include_once("./cart/pay_success.php");
                        break;
                }
            } else {
                include_once("./cart/main_cart.php");
            }
        ?>
    </div>
    <!-- Modal Thông tin khách hàng -->
    <?php
    if (isset($_SESSION["user_name"])) {
        include_once('./cart/pay.php');
    }
    ?>
    <!-- Footer -->
    <?php
        include_once("footer.php");
    ?>
    <script src="./assets/js/main.js" ></script>
    <script src="./assets/js/cart.js" ></script>
</body>

</html>