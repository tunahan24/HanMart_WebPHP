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
    <title>Han Mart</title>
    <link rel="icon" href="./assets/img/header/logo - Copy.png">
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/product.css">
    <link rel="stylesheet" href="./assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
    <div class="main">
        <!-- Header -->
        <?php
        include_once("header.php");
        ?>
        <!-- Content -->
        <div class="main-content">
            <!-- Slider -->
            <div class="slider">
                <div class="content-slider">
                    <div class="main-slider">
                        <a href="#" class="main-slider-link">
                            <img src="./assets/img/slider/slider1.png" alt="slider" class="main-slider-img">
                        </a>
                    </div>
                    <div class="sub-slider">
                        <a href="#" class="sub-slider-link">
                            <img src="./assets/img/slider/subslider.jpg" alt="subslider" class="sub-slider-img">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Category -->
            <?php
                include_once("./category/list_cat.php");
            ?>
            <!-- Products -->
            <?php
            if (isset($_GET["page_layout"])) {
                switch ($_GET['page_layout']){
                    case "product_cat":
                        include_once("./products/product_cat.php");
                        break;
                    case "product_search":
                        include_once("./products/product_search.php");
                        break;
                }
            } else {
                include_once("./products/product_list.php");
            }
            ?>
            <!-- Brand -->
            <?php
                include_once("brand.php");
            ?>

        </div>
        <!-- Footer -->
        <?php
            include_once("footer.php");
        ?>
    </div>
</body>
</html>