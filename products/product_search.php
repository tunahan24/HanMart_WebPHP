<?php
    // Phân trang
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerpage = 10;
    $perRow = $page * $rowPerpage - $rowPerpage;

    // Nhận từ khóa tìm kiếm
    if(isset($_POST['stext'])) {
        $stext=$_POST['stext'];
    }else{
        $stext=$_GET['stext'];
    }
    // Loại bỏ khoảng trắng
    $stextNew=trim($stext);
    $arr_stextNew=explode(' ',$stext);
    $stextNew= implode('%',$arr_stextNew);
    $stextNew='%'.$stextNew.'%';

    $sql="SELECT * FROM products WHERE product_keyword LIKE ('$stextNew') ORDER BY product_id ASC LIMIT $perRow,$rowPerpage";
    $query=mysqli_query($connect,$sql);

    // Tổng số bản ghi
    $totalRow = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM products WHERE product_keyword LIKE ('$stextNew')"));
    // Tổng số trang
    $totalPage = ceil($totalRow / $rowPerpage);
    // Xây dựng thanh phân trang
    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<li class="active"><a href="index.php?page_layout=product_search&stext='.$stext.'&page=' . $i . '">' . $i . '</a></li>';
        } else {
            $listPage .= '<li><a href="index.php?page_layout=product_search&stext='.$stext.'&page=' . $i . '">' . $i . '</a></li>';
        }
    }
?>
<div class="content-product">
    <div class="container-product">
        <h2 class="content-product-title">Sản phẩm với từ khóa "<?php echo $stext; ?>"</h2>
        <div class="content-product-list">
            <?php
                while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="content-product-item">
                <a href="#" class="content-product-link">
                    <div class="content-product-img">
                        <img src="./assets/img/products/<?php echo $row['product_image']; ?>" alt="Product">
                    </div>
                    <div class="content-product-info">
                        <h3 class="content-product-name"><?php echo $row['product_name']; ?></h3>
                        <div class="content-product-star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <span class="content-product-price"><?php echo $row['product_price']; ?> VNĐ</span>
                        <div class="content-product-button">
                            <button class="content-product-btn">Thêm giỏ hàng<i class="ti-shopping-cart"></i></button>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                }
            ?>
        
        </div>
        <ul class="cat-page">
            <?php
            echo $listPage;
            ?>
        </ul>
    </div>
</div>