<header class="main-header">
    <div class="header-top">
        <div class="header-top-left">
            <ul class="top-list">
                <li class="top-item"><a href="#" class="top-link">About us</a><span>|</span></li>
                <li class="top-item"><a href="#" class="top-link">Wishlist</a><span>|</span></li>
                <li class="top-item"><a href="#" class="top-link">Order Tracking</a></li>
            </ul>
        </div>
        <div class="header-top-right">
            <ul class="top-list">
                <li class="top-item"><a href="#" class="top-link">Tiếng Việt</a><span>|</span></li>
                <?php
                    if(isset($_SESSION["user_name"])){
                        echo '<div class="header-profile">
                        <a href="#" class="profile-link"><i class="fa-solid fa-user"></i>Hi,  '.$_SESSION["user_name"].' </a>
                        <div class="profile-list">
                            <a href="#" class="profile-link"><i class="fa-solid fa-user"></i>Thông tin</a>
                            <a href="logout.php" class="profile-link"><i class="fa-solid fa-arrow-right-from-bracket"></i>Đăng xuất</a>
                        </div>
                        </div>';
                        
                    }else{
                        echo '<li class="top-item"><a href="login_form.php" class="top-link">User</a><span>|</span></li>
                        <li class="top-item"><a href="login_admin_form.php" class="top-link">Admin</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="header-mid">
        <div class="container-header-mid">
            <div class="header-logo"><a href="index.php"><img src="./assets/img/header/logo.png" alt="logo" class="header-logo-img"></a></div>
            <div class="header-search">
                <form action="index.php?page_layout=product_search" method="post" >
                    <input type="text" class="header-search-input" name="stext" placeholder="I'm shopping for...">
                    <div class="header-search-button"><button type="submit"><i class="ti-search header-search-icon"></i></button></div>
                </form>
            </div>
            <div class="header-icon">
                <a href="#" class="header-icon-item"><i class="fa-solid fa-bell fa-shake" style="color: #f7ac18;"></i>
                    <div class="icon-noti">0</div>
                </a>
                <a href="#" class="header-icon-item"><i class="fa-solid fa-heart fa-beat" style="color: rgb(231, 3, 3);"></i>
                    <div class="icon-noti">0</div>
                </a>
                <a href="./cart.php" class="header-icon-item"><i class="fa-solid fa-cart-shopping"></i>
                    <div class="icon-noti"><?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);} else{echo 0;} ?></div>
                </a>
            </div>
        </div>

    </div>

    <div class="header-bottom">
        <!-- Menu category -->
        <?php
        include_once("./category/menu_cat.php");
        ?>
        <!-- Nav -->
        <div class="nav">
            <ul class="nav1">
                <li class="nav1-item"><a href="index.php" class="nav1-link"><i class="ti-home nav1-icon"></i>Home</a></li>
                <li class="nav1-item"><a href="#" class="nav1-link">Trang<i class="ti-angle-down nav1-icon"></i></li></a>
                <li class="nav1-item"><a href="#" class="nav1-link">Cửa hàng<i class="ti-angle-down nav1-icon"></i></a></li>
                <li class="nav1-item"><a href="#" class="nav1-link">Blog</a></li>
                <li class="nav1-item"><a href="#" class="nav1-link">Câu hỏi</a></li>
                <li class="nav1-item"><a href="#" class="nav1-link">Liên hệ</a></li>
            </ul>
        </div>
    </div>
</header>