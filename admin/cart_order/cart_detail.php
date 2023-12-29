<?php
    $code=$_GET['code'];
    $sql_update ="UPDATE cart SET status_cart=0 WHERE code_cart='$code'";
	$query_update = mysqli_query($connect,$sql_update);

    $sqlDh="SELECT * FROM cart_detail ,products  WHERE cart_detail.product_id=products.product_id AND cart_detail.code_cart=$code ORDER BY cart_detail.id_cart_detail ASC";
    $queryDh= mysqli_query($connect,$sqlDh);
?>

<div class="container-content-admin">
    <h1 class="content-admin-title">Chi tiết đơn hàng</h1>
    <div class="content-admin-table">
        <table class="table" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody class="product-item">
                <?php
                $i=0;
                $tongtien=0;
                while ($row = mysqli_fetch_array($queryDh)) {
                    $i++;
                    $thanhtien= $row['product_price'] * $row['soluong'];
                    $tongtien+=$thanhtien;
                ?>
                    <tr>
                        <td style="padding: 1rem;" ><?php echo $i ?></td>
                        <td><?php echo $row['code_cart'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><img src="../assets/img/products/<?php echo $row['product_image']; ?>" alt=""></td>
                        <td><?php echo $row['soluong'] ?></td>
                        <td><?php echo number_format($row['product_price'], 0, ',', '.'); ?></td>
                        <td><?php echo number_format($thanhtien, 0, ',', '.'); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tr>
                <th colspan="7" style="font-size: 2rem; padding: 3rem" >Tổng doanh thu : <?php echo number_format($tongtien, 0,',','.').' VNĐ' ?></th>
            </tr>
        </table>
    </div>
    <div class="cart-button-ad">
        <div>
            <a href="index.php?page_layout=cart_order"><button class="back-btn-ad"><i class="ti-arrow-left"></i>Back</button></a>
        </div>
    </div>
</div>