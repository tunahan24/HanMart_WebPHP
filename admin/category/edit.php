<?php
    include_once('../../config/connect.php');
    $cat_id=$_GET['cat_id'];
    $sql_edit = "SELECT * FROM category WHERE cat_id='$cat_id'";
    $query_edit=mysqli_query($connect,$sql_edit);
    $row = mysqli_fetch_array($query_edit);
    if(isset($_POST['update'])){
        $cat_name = $_POST['cat_name'];
        if(isset($cat_name)){
            $sql_edit="UPDATE category SET cat_name='$cat_name' WHERE cat_id='$cat_id' ";
            $query_edit=mysqli_query($connect,$sql_edit);
            $message = "Cập nhật thành công!";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '../index.php?page_layout=category';</script>";
        }
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../css/main_admin.css">
</head>
<body>
    <!-- Sua danh muc -->
    <div class="modal-content js-edit-modal open-edit">
        <div class="modal-form js-edit-form">
            <div class="modal-header btn_sua">
                <h5 class="modal-title">Sửa Danh Mục</h5>
                <button type="button" id="js-edit-close" class="close btn_sua" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="form-group">
                            <label style="font-size: 18px">Tên danh mục</label>
                            <input type="text" name="cat_name" class="form-control" value="<?php echo $row['cat_name'];?>">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn_sua edit-product" name="update">Cập nhật</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById("js-edit-close").addEventListener("click", function() {
            window.location.href = "../index.php?page_layout=category";
        });
    </script>
</body>
</html>
