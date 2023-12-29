<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

ob_start();
session_start();
include_once("./config/connect.php");

if (isset($_GET["vnp_ResponseCode"]) && $_GET["vnp_ResponseCode"] == "00") {
    $arr = array();
    foreach ($_SESSION["cart"] as $product_id => $product_qty) {
        $arr[] = $product_id;
    }
    if (!empty($arr)) {
        $strId = implode(", ", $arr);

        header("Location: ./cart.php?page_layout=pay_success");
        exit();
    }
}
?>
