<div class="table">
    <?php
    if (isset($_SESSION["cart"])) {
        if (isset($_POST["sl"])) {
            foreach ($_POST["sl"] as $product_id => $product_qty) {
                if ($product_qty == 0) {
                    unset($_SESSION["cart"][$product_id]);
                } else if ($product_qty > 0) {
                    $_SESSION["cart"][$product_id] = $product_qty;
                }
            }
        }

        $arr = array();
        foreach ($_SESSION["cart"] as $product_id => $product_qty) {
            $arr[] = $product_id;
        }
        if (!empty($arr)) {
            $strId = implode(", ", $arr);
        } else {
            $strId = "0";
        }
        $sql = "SELECT * FROM products WHERE product_id IN($strId) ORDER BY product_id ASC";
        $query = mysqli_query($connect, $sql);
    ?>
        <form id="cart" method="post">
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
                while ($row = mysqli_fetch_array($query)) {
                    $totalPrice = $row["product_price"] * $_SESSION["cart"][$row["product_id"]];
                ?>
                    <tbody>
                        <tr>
                            <td class="product-thumbnail"><a href=""><img src="./assets/img/products/<?php echo $row['product_image']; ?>" alt="Red"></a></td>
                            <td class="product-name"><a href=""><?php echo $row['product_name']; ?></a></td>
                            <td class="product-price">
                                <div class="box-price"><span class="quantity"><?php echo number_format($row['product_price'], 0, ',', '.') ; ?></span></div>
                            </td>
                            <td class="product-quantity">
                                <div class="product-button">
                                    <button class="ti-minus pointer decrease"></button>
                                    <input class="quantity" name="sl[<?php echo $row['product_id']; ?>]" type="number" value="<?php echo $_SESSION['cart'][$row['product_id']]; ?>" title="Qty" step="1" min="1" max="18" required="">
                                    <button class="ti-plus pointer increase"></button>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <div class="box-price"><span class="price-current"><?php echo number_format($totalPrice, 0, ',', '.'); ?></span></div>
                            </td>
                            <td class="product-remove"><a onclick="return xoaSp();" href="./cart/delete.php?product_id=<?php echo $row['product_id']; ?>"><i class="fa-regular fa-trash-can"></i></a></td>
                        </tr>
                    </tbody>
                <?php
                    $totalPriceAll += $totalPrice;
                }
                ?>
            </table>
        </form>
    <?php
    }else{
        echo "<h2 style='color:red; text-align: center; font-size:1.6rem;'>Giỏ hàng trống! Hãy tiếp tục Shopping...</h2>";
    }
    ?>
    <div class="total-price">
        <h2>Tổng tiền: <?php if (isset($_SESSION["cart"])) {
                            echo number_format($totalPriceAll, 0, ',', '.');
                        } else {
                            echo "0";
                        } ?> VNĐ</h2>
    </div>
    <div class="cart-button">
        <div>
            <a href="index.php"><button class="back-btn"><i class="ti-arrow-left"></i>Continue Shopping</button></a>
            <a onclick="document.getElementById('cart').submit();" href="#"><button class="back-btn"><i class="ti-reload"></i>Cập nhật giỏ hàng</button></a>
        </div>
        <?php
        if (isset($_SESSION["user_name"])) {
            echo '<button class="pay-btn js-pay">Thanh toán</button>';
        } else {
            echo '<button onclick="pay()" class="pay-btn">Thanh toán</button>';
        }
        ?>

    </div>
</div>