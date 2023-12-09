<?php
    $sqlDm = "SELECT * FROM category";
    $queryDm = mysqli_query($connect, $sqlDm);

    if(isset($_POST["them"])) {
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_qty = $_POST["product_qty"];
        $product_keyword = $_POST["product_keyword"];
        $product_desc = $_POST["product_desc"];

        if($_FILES['product_image']['name'] != ''){
            $product_image = $_FILES['product_image']['name'];
            $tmp_product_image = $_FILES['product_image']['tmp_name'];
        }else{
            $err_img = '<span style="color: red;">Vui lòng chọn ảnh</span>';
            echo $err_img;
        }
        

        if($_POST['cat_id']=='unselect'){
            $err_dm = '<span style="color: red;">Vui lòng chọn danh mục</span>';
            echo $err_dm;
        }
        else{
            $product_cat = $_POST['cat_id'];
        }

        if(isset($product_name) && isset($product_price) && isset($product_qty) && isset($product_desc) && 
            isset($product_keyword) && isset($product_image) && isset($product_cat)){
                move_uploaded_file($tmp_product_image, '../assets/img/products'.$product_image);
                $sql = "INSERT INTO products(product_cat, product_name, product_price, product_qty, product_desc, product_image, product_keyword) 
                VALUES ('$product_cat', '$product_name', '$product_price', '$product_qty', '$product_desc', '$product_image', '$product_keyword') ";
                $query = mysqli_query($connect, $sql);
                $message = "Thêm sản phẩm thành công!";
                echo "<script type='text/javascript'>alert('$message');window.location.href = './index.php?page_layout=products&page=".$page."';</script>";
        }
    }
?>

<!-- Modal them sp -->
<div class="modal-content js-add-modal">
    <div class="modal-form js-add-form">
        <div class="modal-header btn_them">
            <h5 class="modal-title">Thêm Sản Phẩm</h5>
            <button type="button" class="close js-close btn_them" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group">
                        <label style="font-size: 18px">Tên sản phẩm</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Danh mục</label>
                        <select class="form-control category_list" name="cat_id">
                            <option value="unselect" selected>Chọn danh mục</option>
                            <?php
                            while ($rowDm = mysqli_fetch_array($queryDm)) {
                            ?>
                                <option value="<?php echo $rowDm['cat_id']; ?>"><?php echo $rowDm['cat_name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Mô tả sản phẩm</label>
                        <textarea class="form-control" name="product_desc" placeholder="Nhập mô tả" style="height: 60px; padding-top: 1rem;" required></textarea>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Số lượng</label>
                        <input type="number" name="product_qty" class="form-control" placeholder="Nhập số lượng" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Đơn giá</label>
                        <input type="number" name="product_price" class="form-control" placeholder="Nhập giá" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Từ khóa sản phẩm </label>
                        <input type="text" name="product_keyword" class="form-control" placeholder="Nhập từ khóa" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Ảnh <small>(format: jpg, jpeg, png)</small></label>
                        <input type="file" name="product_image" class="form-control">
                    </div>

                    <input type="hidden" name="add_product" value="1">
                    <div class="">
                        <button type="submit" class="btn btn_them add-product" name="them">Thêm mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>