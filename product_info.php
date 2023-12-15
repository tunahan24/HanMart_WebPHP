<?php
    ob_start();
    session_start();
    include_once("./config/connect.php");

    $product_id = $_GET["product_id"];
    $sql = "SELECT * FROM products INNER JOIN category ON product_cat=cat_id WHERE product_id = $product_id";
    $query = mysqli_query($connect, $sql);
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
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/icon/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
    <?php
    include_once("header.php");
    ?>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
    <div class="main-product-info">
        <div class="container-product-info">
            <div class="img-product-info">
                <img src="./assets/img/products/<?php echo $row['product_image'] ?>" alt="">
            </div>
            <div class="main-info">
                <div class="main-info-header">
                    <h2><?php echo $row['product_name'] ?></h2>
                </div>
                <div class="main-info-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <div class="main-info-price">
                    <span><?php echo $row['product_price'] ?> VND</span>
                </div>
                <div class="main-info-desc">
                    <p><?php echo $row['product_desc'] ?></p>
                </div>
                <div class="main-info-cat">
                    <span>Danh mục: <?php echo $row['cat_name']; ?></span>
                </div>
                <div class="main-info-qty">
                    <span>Số lượng:</span>
                    <div class="product-button">
                        <button class="ti-minus pointer decrease"></button>
                        <input class="quantity" name="sl[<?php echo $row['product_id']; ?>]" type="number" value="1" title="Qty" step="1" min="1" max="18" required>
                        <button class="ti-plus pointer increase"></button>
                    </div>
                </div>
                <div class="main-info-button">
                    <a href="./cart/add.php?product_id=<?php echo $row['product_id'] ?>"><button>Thêm giỏ hàng<i class="ti-shopping-cart"></i></button></a>
                </div>
            </div>
            <div class="sup-info">
                <div class="sup-info-item">
                    <div class="sup-info-img">
                        <img src="./assets/img/footer/icon-rocket.png" alt="rocket">
                    </div>
                    <div class="sup-info-content">
                        <h3 class="sup-info-title">Miễn phí vận chuyển</h3>
                        <p class="sup-info-desc">Đối với các đơn hàng trên $200</p>
                    </div>
                </div>
                <div class="sup-info-item">
                    <div class="sup-info-img">
                        <img src="./assets/img/footer/icon-reload.png" alt="rocket">
                    </div>
                    <div class="sup-info-content">
                        <h3 class="sup-info-title">Hoàn trả 1 & 1</h3>
                        <p class="sup-info-desc">Hủy sau 1 ngày</p>
                    </div>
                </div>
                <div class="sup-info-item">
                    <div class="sup-info-img">
                        <img src="./assets/img/footer/icon-protect.png" alt="rocket">
                    </div>
                    <div class="sup-info-content">
                        <h3 class="sup-info-title">Bảo mật an toàn 100%</h3>
                        <p class="sup-info-desc">Đảm bảo thanh toán an toàn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <?php
    include_once("footer.php");
    ?>
    <script src="./assets/js/main.js" ></script>
</body>
</html>