<?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerpage = 10;
    $perRow = $page * $rowPerpage - $rowPerpage;

    $sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT $perRow,$rowPerpage";
    $query = mysqli_query($connect, $sql);

    $totalRow = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM products"));
    $totalPage = ceil($totalRow / $rowPerpage);

    $listPage = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $listPage .= '<li class="active"><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
        } else {
            $listPage .= '<li><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
        }
    }

    
?>

<div class="content-product">
    <div class="container-product">
        <h2 class="content-product-title">Sản phẩm</h2>
        <div class="content-product-list">
            <?php
                while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="content-product-item">
                <a href="product_info.php?product_id=<?php echo $row['product_id'] ?>" class="content-product-link">
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
                    </div>
                </a>
                <div class="content-product-button">
                    <a href="./cart/add.php?product_id=<?php echo $row['product_id'] ?>"><button class="content-product-btn">Thêm giỏ hàng<i class="ti-shopping-cart"></i></button></a>
                </div>
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