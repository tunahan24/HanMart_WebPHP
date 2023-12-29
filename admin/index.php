<?php
    session_start();
    include('../config/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hanmart</title>
    <link rel="icon" href="../assets/img/header/logo - Copy.png">
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="./css/main_admin.css">
    <link rel="stylesheet" href="../assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/icon/fontawesome-free-6.4.2-web/css/all.min.css">
</head>

<body>
    <div class="main-admin">
        <header class="header-admin">
            <div class="container-header">
                <div class="header-logo"><a href="../index.php"><img src="../assets/img/header/logo.png" alt="logo"
                            class="header-logo-img"></a></div>
                <div class="header-admin-profile">
                    <a href="#" class="admin-profile-link"><i class="fa-solid fa-user"></i>Hi, <?php if(isset($_SESSION['admin_name']))echo $_SESSION['admin_name'];?></a>
                    <div class="admin-profile-list">
                        <a href="#" class="admin-profile-link"><i class="fa-solid fa-user"></i>Thông tin</a>
                        <a href="logout.php" class="admin-profile-link"><i class="fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</a>
                    </div>
                </div>
            </div>
        </header>

        <div class="content-admin">
            <div class="content-admin-dashboard">
                <ul class="dashboard-list">
                    <li class="dashboard-item"><a href="index.php" class="dashboard-link">Quản lý Sản phẩm</a></li>
                    <li class="dashboard-item"><a href="index.php?page_layout=category" class="dashboard-link">Quản lý Danh mục</a></li>
                    <li class="dashboard-item"><a href="index.php?page_layout=taikhoan" class="dashboard-link">Quản lý Tài khoản</a></li>
                    <li class="dashboard-item"><a href="index.php?page_layout=cart_order" class="dashboard-link">Thống kê đơn hàng</a></li>
                </ul>
            </div>

            <?php
            if(isset($_GET['page_layout'])){
                switch($_GET['page_layout']){
                    case 'products': include_once('./products/products.php');
                        break;
                    case 'category': include_once('./category/category.php');
                        break;
                    case 'taikhoan': include_once('./taikhoan/taikhoan.php');
                        break;
                    case 'cart_order': include_once('./cart_order/main_cart_order.php');
                        break;
                    case 'cart_detail': include_once('./cart_order/cart_detail.php');
                        break;
                    case 'editProduct': include_once('./products/edit.php');
                        break;
                    case 'editTaikhoan': include_once('./taikhoan/edit.php');
                        break;
                }
            }else{
                include_once('./products/products.php');
            }
                
            ?>

        </div>
        

    </div>
    <script src="./js/main_admin.js"></script>
</body>

</html>