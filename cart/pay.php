<?php
    $user_id=$_SESSION["user_id"];
    $sql = "SELECT * FROM user WHERE user_id = $user_id";
    $query = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($query);

    if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $email=$_POST["user_email"];
        $sdt=$_POST["sdt"];
        $dc=$_POST["diachi"];

        if(isset($name) && isset($email) && isset($sdt) && isset($dc)){
            $sqlUpdate = "UPDATE user SET user_name='$name', user_email='$email', sdt='$sdt', diachi='$dc' WHERE user_id=$user_id ";
            $queryUpdate = mysqli_query($connect, $sqlUpdate);
            unset($_SESSION["cart"]);
            header("location: ./cart.php?page_layout=pay_success");
        }
    }
?>

<!-- Modal Thông tin khách hàng -->
<div class="modal-content js-add-modal">
    <div class="modal-form js-add-form">
        <div class="modal-header btn_them">
            <h5 class="modal-title">Xác nhận thông tin khách hàng</h5>
            <button type="button" class="close js-close btn_them" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="form-group">
                        <label style="font-size: 18px">Tên khách hàng</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo $row['user_name'];} ?>" required>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Email</label>
                        <input type="email" name="user_email" class="form-control" placeholder="Nhập email" value="<?php if(isset($_POST['user_email'])){echo $_POST['user_email'];}else{echo $row['user_email'];} ?>" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Số điện thoại</label>
                        <input type="number" name="sdt" class="form-control" placeholder="Nhập số điện thoại" value="<?php if(isset($_POST['sdt'])){echo $_POST['sdt'];}else{echo $row['sdt'];} ?>" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Địa chỉ nhận hàng</label>
                        <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ nhận hàng" value="<?php if(isset($_POST['diachi'])){echo $_POST['diachi'];}else{echo $row['diachi'];} ?>" required>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn_them add-product" name="submit">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>