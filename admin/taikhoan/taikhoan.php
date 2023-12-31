<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerpage = 10;
    $perRow = $page * $rowPerpage - $rowPerpage;

    $sql = "SELECT * FROM user ORDER BY user_id ASC LIMIT $perRow,$rowPerpage";
    $query = mysqli_query($connect, $sql);

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
    <h1 class="content-admin-title">Quản lý tài khoản</h1>
    <div class="content-admin-table">
        <table class="table" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="cat-item">
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td style="padding: 1rem;" ><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['user_password']; ?></td>
                        <td><?php echo $row['sdt']; ?></td>
                        <td><?php echo $row['diachi']; ?></td>
                        <td><a href="./index.php?page_layout=editTaikhoan&user_id=<?php echo $row['user_id'] ?>" class="btn btn_sua js-sua">Sửa</a>
                            <a onclick="return xoaTk();" href="./taikhoan/delete.php?user_id=<?php echo $row['user_id'];?>" class="btn btn_xoa">Xóa</a>
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
    function xoaTk(){
        var conf =confirm("Bạn có chắc chắn muốn xóa tài khoản này không?");
        return conf;
    }
</script>