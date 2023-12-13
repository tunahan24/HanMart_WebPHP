<?php
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $sdt=$_POST["sdt"];
    $dc=$_POST["diachi"];

    if(isset($name) && isset($email) && isset($sdt) && isset($dc)){
        
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
                        <input type="text" name="name" class="form-control" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 18px">Email</label>
                        <input type="number" name="email" class="form-control" placeholder="Nhập email" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Số điện thoại</label>
                        <input type="number" name="sdt" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>

                    <div class="form-group">
                        <label style="font-size: 18px">Địa chỉ nhận hàng</label>
                        <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ nhận hàng" required>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn_them add-product" name="submit">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>