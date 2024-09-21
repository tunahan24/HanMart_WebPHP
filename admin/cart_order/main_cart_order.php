<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerpage = 9;
    $perRow = $page * $rowPerpage - $rowPerpage;

    $sqlDh="SELECT * FROM cart ,user  WHERE cart.user_id=user.user_id ORDER BY id_cart DESC LIMIT $perRow,$rowPerpage";
    $queryDh= mysqli_query($connect,$sqlDh);

    $totalRow = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM cart"));
    $totalPage = ceil($totalRow / $rowPerpage);

    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<li class="active"><a href="index.php?page_layout=cart_order&page=' . $i . '">' . $i . '</a></li>';
        } else {
            $listPage .= '<li><a href="index.php?page_layout=cart_order&page=' . $i . '">' . $i . '</a></li>';
        }
    }

    $sqlDetail="SELECT * FROM cart_detail ,products  WHERE cart_detail.product_id=products.product_id";
    $queryDetail= mysqli_query($connect,$sqlDetail);
    $tongdoanhthu=0;
    while($rowDetail = mysqli_fetch_array($queryDetail)){
        $doanhthu= $rowDetail['product_price'] * $rowDetail['soluong'];
        $tongdoanhthu+=$doanhthu;
    }
?>
<div class="container-content-admin">
    <h1 class="content-admin-title">Quản lý đơn hàng</h1>
    <div class="content-admin-table">
        <table class="table" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tình trạng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="cat-item">
                <?php
                while ($row = mysqli_fetch_array($queryDh)) {
                ?>
                    <tr>
                        <td style="padding: 1rem;" ><?php echo $row['id_cart'] ?></td>
                        <td><?php echo $row['code_cart'] ?></td>
                        <td><?php echo $row['user_name'] ?></td>
                        <td><?php echo $row['user_email'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['sdt'] ?></td>
                        <td><?php echo $row['cart_date'] ?></td>
                        <td><a href="index.php?page_layout=xac_nhan_order&code=<?php echo $row['code_cart']?>" style="text-decoration: none">
                            <?php if($row['status_cart']==1){
    		                echo '<span class="btn btn_sua js-sua" style="color: blue; font-style: italic" >Đơn hàng mới</span>';
    	                    }else{ echo '<span style="cursor: text;">Đã xác nhận</span>';} ?></a>
                        <td><a href="index.php?page_layout=cart_detail&code=<?php echo $row['code_cart']?>" class="btn btn_them js-sua">Xem đơn hàng</a>
                            <a onclick="return xoaDh();" href="./cart_order/delete_cart.php?code=<?php echo $row['code_cart']?>" class="btn btn_xoa">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tr>
                <th colspan="8" style="font-size: 2rem; padding: 3rem" >Tổng doanh thu : <?php echo number_format($tongdoanhthu, 0,',','.').' VNĐ' ?></th>
            </tr>
        </table>
    </div>
    <ul class="cat-page">
        <?php
        echo $listPage;
        ?>
    </ul>
</div>
<script>
    function xoaDh(){
        var conf =confirm("Bạn có chắc chắn muốn xóa đơn hàng này không?");
        return conf;
    }
</script>