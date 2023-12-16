<?php
    include("taikhoan.php");
?>
<?php
    $user_id = $_GET['user_id'];

    $sqlShow = "SELECT * FROM user WHERE user_id = $user_id";
    $queryShow = mysqli_query($connect, $sqlShow);
    $rowShow = mysqli_fetch_array($queryShow);

    if(isset($_POST["capnhat"])){
        $edit_user_name = $_POST["user_name"];
        $edit_user_email = $_POST["user_email"];
        $edit_user_password = $_POST["user_password"];
        $edit_user_sdt = $_POST["sdt"];
        $edit_user_dc = $_POST["diachi"];

        if(isset($edit_user_name) && isset($edit_user_email) && isset($edit_user_password) && isset($edit_user_sdt) && isset($edit_user_dc)){
                $sqlUpdate = "UPDATE user SET user_name='$edit_user_name', user_email='$edit_user_email', user_password='$edit_user_password', 
                sdt='$edit_user_sdt', diachi='$edit_user_dc' WHERE user_id=$user_id ";
                $queryUpdate = mysqli_query($connect, $sqlUpdate);
                $messageUpdate = "Cập nhật tài khoản thành công!";
                echo "<script type='text/javascript'>alert('$messageUpdate');window.location.href = './index.php?page_layout=taikhoan&page=".$page."';</script>";
        }
    }
?>


<!-- Modal sua sp -->
<div class="modal-content js-edit-modal open">
    <div class="modal-form js-edit-form">
        <div class="modal-header btn_sua">
            <h5 class="modal-title">Sửa thông tin tài khoản</h5>
            <button type="button" class="close js-edit-close btn_sua" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="form-group">
                        <label style="font-size: 18px">Tên khách hàng</label>
                        <input type="text" name="user_name" class="form-control" value="<?php if(isset($_POST['user_name'])){echo $_POST['user_name'];}else{echo $rowShow['user_name'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Email</label>
                        <input type="email" name="user_email" class="form-control" value="<?php if(isset($_POST['user_email'])){echo $_POST['user_email'];}else{echo $rowShow['user_email'];} ?>" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Mật khẩu</label>
                        <input type="number" name="user_password" class="form-control" value="<?php if(isset($_POST['user_password'])){echo $_POST['user_password'];}else{echo $rowShow['user_password'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Số điện thoại</label>
                        <input type="number" name="sdt" class="form-control" value="<?php if(isset($_POST['sdt'])){echo $_POST['sdt'];}else{echo $rowShow['sdt'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Địa chỉ</label>
                        <input type="text" name="diachi" class="form-control" value="<?php if(isset($_POST['diachi'])){echo $_POST['diachi'];}else{echo $rowShow['diachi'];} ?>" required>
                    </div>
                    <div class="">
                        <button type="submit" name="capnhat" class="btn btn_sua edit-product">Cập nhật</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>