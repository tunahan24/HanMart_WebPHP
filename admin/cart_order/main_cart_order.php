<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerpage = 10;
    $perRow = $page * $rowPerpage - $rowPerpage;

    $sqlDh="SELECT * FROM cart ,user  WHERE cart.user_id=user.user_id ORDER BY id_cart DESC LIMIT $perRow,$rowPerpage";
    $queryDh= mysqli_query($connect,$sqlDh);

    $totalRow = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM user"));
    $totalPage = ceil($totalRow / $rowPerpage);

    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<li class="active"><a href="index.php?page_layout=taikhoan&page=' . $i . '">' . $i . '</a></li>';
        } else {
            $listPage .= '<li><a href="index.php?page_layout=taikhoan&page=' . $i . '">' . $i . '</a></li>';
        }
    }
?>
<div class="container-content-admin">
    <h1 class="content-admin-title">Thống kê đơn hàng</h1>
    <div class="content-admin-table">
        <table class="table" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Tình trạng</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="cat-item">
                <?php
                $i=0;
                while ($row = mysqli_fetch_array($queryDh)) {
                    $i++;
                ?>
                    <tr>
                        <td style="padding: 1rem;" ><?php echo $i ?></td>
                        <td><?php echo $row['code_cart'] ?></td>
                        <td><?php echo $row['user_name'] ?></td>
                        <td><?php echo $row['user_email'] ?></td>
                        <td><?php echo $row['diachi'] ?></td>
                        <td><?php echo $row['sdt'] ?></td>
                        <td><?php if($row['status_cart']==1){
    		                echo '<span style="color: blue; font-style: italic" >Đơn hàng mới</span>';
    	                    }else{ echo 'Đã xem';} ?></td>
                        <td><a href="index.php?page_layout=cart_detail&code=<?php echo $row['code_cart']?>" class="btn btn_them js-sua">Xem đơn hàng</a>
                            <a onclick="return xoaDh();" href="./cart_order/delete_cart.php?code=<?php echo $row['code_cart']?>" class="btn btn_xoa">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
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