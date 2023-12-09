<?php
    if(isset($_POST['add'])){
        $cat_name = $_POST['cat_name'];
        if(isset($cat_name)){
            $sql_cat="INSERT INTO category(cat_name) VALUES('$cat_name') ";
            $query_cat=mysqli_query($connect,$sql_cat);
            $message = "Thêm thành công!";
            echo "<script type='text/javascript'>alert('$message');window.location.href = './index.php?page_layout=category&page=".$page."';</script>";
        }
    }
?>
<!-- Them danh muc -->
<div class="modal-content js-add-modal">
    <div class="modal-form js-add-form">
        <div class="modal-header btn_them">
            <h5 class="modal-title">Thêm Danh Mục</h5>
            <button type="button" class="close js-close btn_them">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="form-group">
                        <label style="font-size: 18px">Tên danh mục</label>
                        <input type="text" name="cat_name" class="form-control" placeholder="Nhập tên danh mục" required>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn_them add-product" name="add">Thêm mới</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>