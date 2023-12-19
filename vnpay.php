<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');

ob_start();
session_start();
include_once("./config/connect.php");

if (isset($_SESSION["cart"])) {
    if (isset($_POST["sl"])) {
        foreach ($_POST["sl"] as $product_id => $product_qty) {
            if ($product_qty == 0) {
                unset($_SESSION["cart"][$product_id]);
            } elseif ($product_qty > 0) {
                $_SESSION["cart"][$product_id] = $product_qty;
            }
        }
    }

    $arr = array();
    foreach ($_SESSION["cart"] as $product_id => $product_qty) {
        $arr[] = $product_id;
    }
    if (!empty($arr)) {
        $strId = implode(", ", $arr);
    } else {
        $strId = "0";
    }

    $sql = "SELECT * FROM products WHERE product_id IN($strId) ORDER BY product_id ASC";

    $query = mysqli_query($connect, $sql);
    if (!$query) {
        die("Query failed: " . mysqli_error($connect));
    }
}
?>
<?php
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/HanMart/vnpay_return.php";
$vnp_TmnCode = "VRLBCDJX";
$vnp_HashSecret = "ETEIIUTLJVONUKBQZSQGRGCGVRXGPUJD"; 

$vnp_TxnRef = rand(00,99999); 
$vnp_OrderInfo = 'Thanh toan QR VnPay Auto';
$vnp_OrderType = 'billpayment';
$totalPriceAll = 0;
while ($row = mysqli_fetch_array($query)) {
    $totalPrice = $row['product_price'] * $_SESSION['cart'][$row['product_id']];
    $totalPriceAll += $totalPrice;
}

$vnp_Amount = $totalPriceAll;

$vnp_Locale = 'vn';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount * 100,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef

);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
        header('Location: ' . $vnp_Url);
        die();
    } else {
        echo json_encode($returnData);
    }

?>