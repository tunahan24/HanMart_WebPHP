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
    if (isset($_SESSION["user_name"])) {
        include_once("profile_header.php");
    } else {
        include_once("header.php");
    }
    ?>

    <div class="main-cart">
        <h1>Shopping Cart</h1>
        <div class="table">
            <?php
            if (isset($_SESSION["cart"])) {
                if(isset($_POST["sl"])){
                    foreach ($_POST["sl"] as $product_id => $product_qty) {
                        if($product_qty == 0){
                            unset($_SESSION["cart"][$product_id]);
                        }else if($product_qty > 0){
                            $_SESSION["cart"][$product_id]=$product_qty;
                        }
                    }
                }

                $arr=array();
                foreach ($_SESSION["cart"] as $product_id=>$product_qty) {
                    $arr[]=$product_id;
                }
                if (!empty($arr)) {
                    $strId = implode(", ", $arr);
                } else {
                    $strId = "0";
                }
                $sql="SELECT * FROM products WHERE product_id IN($strId) ORDER BY product_id ASC";
                $query=mysqli_query($connect, $sql);
            ?>
            <form id="cart" method="post" >
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
                    <?php
                    $totalPriceAll = 0;
                    while ($row=mysqli_fetch_array($query)) {
                        $totalPrice=$row["product_price"]*$_SESSION["cart"][$row["product_id"]];
                    ?>
                    <tbody>
                        <tr>
                            <td class="product-thumbnail"><a href="" ><img src="./assets/img/products/<?php echo $row['product_image']; ?>" alt="Red"></a></td>
                            <td class="product-name"><a href=""><?php echo $row['product_name']; ?></a></td>
                            <td class="product-price" >
                                <div class="box-price"><span class="quantity"><?php echo $row['product_price']; ?></span></div>
                            </td>
                            <td class="product-quantity">
                                <div class="product-button">
                                    <button class="ti-minus pointer decrease" ></button>
                                    <input class="quantity" name="sl[<?php echo $row['product_id']; ?>]" type="number" value="<?php echo $_SESSION['cart'][$row['product_id']]; ?>" title="Qty" step="1" min="1" max="18" required="">
                                    <button class="ti-plus pointer increase"></button>
                                </div>
                            </td>
                            <td class="product-subtotal" >
                                <div class="box-price"><span class="price-current"><?php echo $totalPrice; ?></span></div>
                            </td>
                            <td class="product-remove"><a onclick="return xoaSp();" href="./cart/delete.php?product_id=<?php echo $row['product_id']; ?>" ><i class="fa-regular fa-trash-can"></i></a></td>
                        </tr>
                    </tbody>
                    <?php
                        $totalPriceAll+=$totalPrice;
                    }
                    ?>
                </table>
            </form>
            <?php
            }
            ?>
            <div class="total-price">
                <h2>Tổng tiền: <?php if(isset($_SESSION["cart"])){echo $totalPriceAll;}else{echo "0";} ?> VNĐ</h2>
            </div>
            <div class="cart-button">
                <div>
                    <a href="index.php"><button class="back-btn"><i class="ti-arrow-left"></i>Continue Shopping</button></a>
                    <a onclick="document.getElementById('cart').submit();" href="#"><button class="back-btn"><i class="ti-reload"></i>Cập nhật giỏ hàng</button></a>
                </div>
                <button class="pay-btn js-pay">Thanh toán</button>
            </div>
        </div>
    </div>
    <!-- Modal Thông tin khách hàng -->
    <?php
        include_once('./cart/pay.php');
    ?>
    <!-- Footer -->
    <?php
        include_once("footer.php");
    ?>
    <script src="./assets/js/main.js" ></script>
    <script src="./assets/js/cart.js" ></script>
</body>

</html>