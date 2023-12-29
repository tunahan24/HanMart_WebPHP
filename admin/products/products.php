<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerpage = 6;
    $perRow = $page * $rowPerpage - $rowPerpage;

    $sql = "SELECT * FROM products INNER JOIN category ON products.product_cat=category.cat_id ORDER BY product_id ASC LIMIT $perRow,$rowPerpage";
    $query = mysqli_query($connect, $sql);

    $totalRow = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM products"));
    $totalPage = ceil($totalRow / $rowPerpage);

    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<li class="active"><a href="index.php?page_layout=products&page=' . $i . '">' . $i . '</a></li>';
        } else {
            $listPage .= '<li><a href="index.php?page_layout=products&page=' . $i . '">' . $i . '</a></li>';
        }
    }
?>

<div class="container-content-admin">
    <h1 class="content-admin-title">Quản lý sản phẩm</h1>
    <div style="margin: 4rem 0 0 2.4rem;"><a class="btn btn_them js-them">Thêm mới</a></div>
    <div class="content-admin-table">
        <table class="table" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Sửa</th>
                </tr>
            </thead>
            <tbody class="product-item">
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><img src="../assets/img/products/<?php echo $row['product_image']; ?>" alt=""></td>
                        <td><?php echo number_format($row['product_price'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['product_qty']; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td><a href="./index.php?page_layout=editProduct&product_id=<?php echo $row['product_id'] ?>" class="btn btn_sua js-sua">Sửa</a>
                            <a onclick="return xoaSp();" href="./products/delete.php?product_id=<?php echo $row['product_id'];?>" class="btn btn_xoa">Xóa</a>
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
    function xoaSp(){
        var conf =confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
        return conf;
    }
</script>
<?php
include("add.php"); //Add modal
//include("edit.php"); //Edit modal

?>