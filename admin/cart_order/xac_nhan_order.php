<?php
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    require '../carbon/autoload.php';
    $code=$_GET['code'];
    $sql_update ="UPDATE cart SET status_cart=0 WHERE code_cart='$code'";
	$query_update = mysqli_query($connect,$sql_update);

    $sqlDh="SELECT * FROM cart_detail ,products  WHERE cart_detail.product_id=products.product_id AND cart_detail.code_cart=$code ORDER BY cart_detail.id_cart_detail ASC";
    $queryDh= mysqli_query($connect,$sqlDh);

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $sqlThongke = "SELECT * FROM thongke WHERE ngaydat = '$now'";
    $queryThongke = mysqli_query($connect,$sqlThongke);

    $soluongmua = 0;
    $total = 0;
    while($rowDh = mysqli_fetch_array($queryDh)){
        $soluongmua += $rowDh['soluong'];
        $total += $rowDh['product_price'];
        $update_sl_sp = $rowDh['product_qty'] - $soluongmua;
        $sql_update_sp = mysqli_query($connect, "UPDATE products, cart_detail SET product_qty = '$update_sl_sp' WHERE products.product_id=cart_detail.product_id AND cart_detail.code_cart=$code");
    }

    if(mysqli_num_rows($queryThongke) == 0){
        $soluongban = $soluongmua;
        $doanhthu = $total;
        $donhang = 1;
        $sql_update_thongke = mysqli_query($connect,"INSERT INTO thongke (ngaydat, soluong, doanhthu, donhang) VALUES ('$now', '$soluongban', '$doanhthu', '$donhang')");
    }elseif(mysqli_num_rows($queryThongke) != 0){
        while($rowThongke = mysqli_fetch_array($queryThongke)){
            $soluongban = $rowThongke['soluong'] + $soluongmua;
            $doanhthu = $rowThongke['doanhthu'] + $total;
            $donhang = $rowThongke['donhang'] + 1;
            $sql_update_thongke = mysqli_query($connect, "UPDATE thongke SET soluong = '$soluongban', doanhthu = '$doanhthu', donhang = '$donhang' WHERE ngaydat = '$now'");
        }
    }
    header('Location:index.php?page_layout=cart_order');
?>