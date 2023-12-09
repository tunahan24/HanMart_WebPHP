<?php
    include("products.php");
?>
<?php
    $product_id = $_GET['product_id'];
    $sqlEdit = "SELECT * FROM category";
    $queryEdit = mysqli_query($connect, $sqlEdit);

    $sqlShow = "SELECT * FROM products WHERE product_id = $product_id";
    $queryShow = mysqli_query($connect, $sqlShow);
    $rowShow = mysqli_fetch_array($queryShow);

    if(isset($_POST["capnhat"])){
        $edit_product_name = $_POST["product_name"];
        $edit_product_price = $_POST["product_price"];
        $edit_product_qty = $_POST["product_qty"];
        $edit_product_keyword = $_POST["product_keyword"];
        $edit_product_desc = $_POST["product_desc"];

        if($_FILES['product_image']['name'] == ''){
            $edit_product_image = $_POST["product_image"];
        }else{
            $edit_product_image = $_FILES['product_image']['name'];
            $edit_tmp_product_image = $_FILES['product_image']['tmp_name'];
        }

        $edit_product_cat = $_POST['cat_id'];

        if(isset($edit_product_name) && isset($edit_product_price) && isset($edit_product_qty) && isset($edit_product_desc) && 
            isset($edit_product_keyword)){
                move_uploaded_file($edit_tmp_product_image, '../assets/img/products'.$edit_product_image);
                $sqlUpdate = "UPDATE products SET product_name='$edit_product_name', product_price='$edit_product_price', product_qty='$edit_product_qty', product_desc='$edit_product_desc', 
                product_image='$edit_product_image', product_keyword='$edit_product_keyword', product_cat='$edit_product_cat' WHERE product_id=$product_id ";
                $queryUpdate = mysqli_query($connect, $sqlUpdate);
                $messageUpdate = "Cập nhật sản phẩm thành công!";
                echo "<script type='text/javascript'>alert('$messageUpdate');window.location.href = './index.php?page_layout=products&page=".$page."';</script>";
        }
    }
?>


<!-- Modal sua sp -->
<div class="modal-content js-edit-modal open">
    <div class="modal-form js-edit-form">
        <div class="modal-header btn_sua">
            <h5 class="modal-title">Sửa Sản Phẩm</h5>
            <button type="button" class="close js-edit-close btn_sua" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group">
                        <label style="font-size: 18px">Tên sản phẩm</label>
                        <input type="text" name="product_name" class="form-control" value="<?php if(isset($_POST['product_name'])){echo $_POST['product_name'];}else{echo $rowShow['product_name'];} ?>" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Danh mục</label>
                        <select class="form-control category_list" name="cat_id">
                            <?php
                                while ($rowEdit = mysqli_fetch_array($queryEdit)) {
                            ?>
                            <option 
                            <?php
                                if($rowShow['product_cat']==$rowEdit['cat_id']){
                                    echo 'selected = "selected"';
                                }
                            ?>
                            value="<?php echo $rowEdit['cat_id']; ?>"><?php echo $rowEdit['cat_name']; ?></option>
                            <?php
                                }
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Mô tả sản phẩm</label>
                        <textarea class="form-control" name="product_desc" style="height: 60px; padding: 1rem;"  required>
                            <?php if(isset($_POST['product_desc'])){echo $_POST['product_desc'];}else{echo $rowShow['product_desc'];} ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Số lượng</label>
                        <input type="number" name="product_qty" class="form-control" value="<?php if(isset($_POST['product_qty'])){echo $_POST['product_qty'];}else{echo $rowShow['product_qty'];} ?>" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Đơn giá</label>
                        <input type="number" name="product_price" class="form-control" value="<?php if(isset($_POST['product_price'])){echo $_POST['product_price'];}else{echo $rowShow['product_price'];} ?>" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Từ khóa sản phẩm </label>
                        <input type="text" name="product_keyword" class="form-control" value="<?php if(isset($_POST['product_keyword'])){echo $_POST['product_keyword'];}else{echo $rowShow['product_keyword'];} ?>" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Ảnh <small>(format: jpg, jpeg, png)</small></label>
                        <input type="file" name="product_image" class="form-control">
                        <input type="hidden" name="product_image" value="<?php echo $rowShow['product_image']; ?>" >
                    </div>

                    <input type="hidden" name="add_product" value="1">
                    <div class="">
                        <button type="submit" name="capnhat" class="btn btn_sua edit-product">Cập nhật</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>