<?php
    $sql_cat = "SELECT * FROM category ";
    $query_cat = mysqli_query($connect, $sql_cat);
?>

<div class="menu-category">
    <i class="fa-solid fa-bars menu-category-icon"></i>
    <h2 class="menu-category-header">SHOP BY CATEGORY</h2>
    <ul class="category-list">
        <?php
            while ($row_cat = mysqli_fetch_array($query_cat)) {
        ?>
        <li class="category-item">
            <a href="./<?php if(isset($_SESSION["user_name"])){echo 'profile.php';}else{echo 'index.php';} ?>?page_layout=product_cat&cat_id=<?php echo $row_cat['cat_id'] ?>" class="category-link">
                <?php
                    $cat_name = $row_cat['cat_name'];
                    if ($cat_name === "Rau củ quả") {
                        echo '<i class="fa-solid fa-carrot category-icon"></i>';
                    }else if($cat_name === "Bánh mì"){
                        echo '<i class="fa-solid fa-burger category-icon"></i>';
                    }else if($cat_name === "Hải sản đông lạnh"){
                        echo '<i class="fa-solid fa-shrimp category-icon"></i>';
                    }else if($cat_name === "Thịt tươi"){
                        echo '<i class="fa-solid fa-bacon category-icon"></i>';
                    }else if($cat_name === "Trà và cà phê"){
                        echo '<i class="fa-solid fa-mug-hot category-icon"></i>';
                    }else if($cat_name === "Rượu & đồ uống"){
                        echo '<i class="fa-solid fa-wine-glass category-icon"></i>';
                    }else if($cat_name === "Sữa tươi"){
                        echo '<i class="fa-solid fa-blender category-icon"></i>';
                    }else if($cat_name === "Đồ ăn nhanh"){
                        echo '<i class="fa-solid fa-bowl-food category-icon"></i>';
                    }else{
                        echo '<i class="fa-solid fa-carrot category-icon"></i>';
                    }
                ?>
                <?php echo $row_cat['cat_name'] ?></a>
        </li>
        <?php
            }
        ?>
    </ul>
</div>