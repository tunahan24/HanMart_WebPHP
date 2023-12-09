<?php
    session_start();
    include('../config/connect.php');

    $err = [];
    if(isset($_POST['dangky'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        if($password != $rpassword){
            $err['rpassword'] = 'Mật khẩu nhập lại không đúng!';
        }
        if(empty($err)){
            $sql="INSERT INTO admin(admin_name, admin_email, admin_password) VALUES('$name', '$email', '$password') ";
            $query=mysqli_query($connect,$sql);
            if($query){
                $message = "Đăng ký thành công!";
                echo "<script type='text/javascript'>alert('$message');window.location.href = './login_admin_form.php';</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="icon" href="../assets/img/header/logo - Copy.png">
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/icon/fontawesome-free-6.4.2-web/css/all.min.css">
</head>
<body>
    <div class="main-login">
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
                        <li class="top-item"><a href="../login_form.php" class="top-link">User</a><span>|</span></li>
                        <li class="top-item"><a href="#" class="top-link">Admin</a></li>
                    </ul>
                </div>
            </div>
    
            <div class="header-mid">
                <div class="container-header-mid">
                    <div class="header-logo"><a href="../index.php"><img src="../assets/img/header/logo.png" alt="logo" class="header-logo-img"></a></div>
                    <div class="header-search">
                        <input type="text" class="header-search-input" placeholder="I'm shopping for...">
                        <div class="header-search-button"><i class="ti-search header-search-icon"></i></div>
                    </div>
                    <div class="header-icon">
                        <a href="#" class="header-icon-item"><i class="fa-solid fa-bell fa-shake" style="color: #f7ac18;"></i><div class="icon-noti">0</div></a>
                        <a href="#" class="header-icon-item"><i class="fa-solid fa-heart fa-beat" style="color: rgb(231, 3, 3);"></i><div class="icon-noti">0</div></a>
                        <a href="#" class="header-icon-item"><i class="fa-solid fa-cart-shopping"></i><div class="icon-noti">0</div></a>
                    </div>
                </div>
                
            </div>
    
            <div class="header-bottom">
                <div class="menu-category">
                    <i class="fa-solid fa-bars menu-category-icon"></i>
                    <h2 class="menu-category-header">SHOP BY CATEGORY</h2>
                    <ul class="category-list">
                        <li class="category-item">
                            <a href="#" class="category-link"><i class="fa-solid fa-carrot category-icon"></i>Rau củ quả</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link"><i class="fa-solid fa-burger category-icon"></i>Bánh mì</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link"><i class="fa-solid fa-shrimp category-icon"></i>Hải sản đông lạnh</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link"><i class="fa-solid fa-bacon category-icon"></i>Thịt tươi</a>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-link"><i class="fa-solid fa-mug-hot category-icon"></i>Trà và cà phê</a>
                        </li>
                    </ul>
                </div>
                <div class="nav">
                    <ul class="nav1">
                        <li class="nav1-item"><a href="../index.php" class="nav1-link"><i class="ti-home nav1-icon"></i>Home</a></li>
                        <li class="nav1-item"><a href="#" class="nav1-link">Trang<i class="ti-angle-down nav1-icon"></i></li></a>
                        <li class="nav1-item"><a href="#" class="nav1-link">Cửa hàng<i class="ti-angle-down nav1-icon"></i></a></li>
                        <li class="nav1-item"><a href="#" class="nav1-link">Blog</a></li>
                        <li class="nav1-item"><a href="#" class="nav1-link">Câu hỏi</a></li>
                        <li class="nav1-item"><a href="#" class="nav1-link">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Main login -->
        <form action="" method="POST" >
            <div class="content-login">
                <div class="login-form">
                    <div class="login-form-title">
                        <h1>Đăng ký Admin</h1>
                    </div>
                    <div class="login-form-email">
                        <label for="">Họ tên</label>
                        <input type="text" class="login-email-txt" placeholder="Tên của bạn" name="name" required>
                    </div>
                    <div class="login-form-email">
                        <label for="">Địa chỉ Email</label>
                        <input type="email" class="login-email-txt" placeholder="Địa chỉ Email" name="email" required>
                    </div>
                    <div class="login-form-password">
                        <label for="">Mật khẩu</label>
                        <input type="password" class="login-pass-txt" placeholder="Mật khẩu" name="password" required>
                    </div>
                    <div class="login-form-password">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="password" class="login-pass-txt" placeholder="Xác nhận mật khẩu" name="rpassword" required>
                    </div>
                    <div class="login-form-remember">
                        <input type="checkbox" id="login-check">
                        <label for="login-check">Tôi đồng ý với điều khoản</label>
                    </div>
                    <div class="login-button">
                        <button type="submit" name="dangky" >Đăng ký</button>
                    </div>
                    <div class="login-register">
                        <p>Bạn đã có tài khoản?</p>
                        <a href="login_admin_form.php" class="login-link-register">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</body>
</html>