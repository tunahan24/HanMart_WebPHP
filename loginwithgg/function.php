<?php
//Hàm login sau khi mạng xã hội trả dữ liệu về
function loginFromSocialCallBack($socialUser) {
    include './config/connect.php';
    $result = mysqli_query($connect, "SELECT * FROM `user` WHERE `user_email` ='" . $socialUser['email'] . "'");
    if ($result->num_rows == 0) {
        $result = mysqli_query($connect, "INSERT INTO `user` (`user_name`,`user_email`) VALUES ('" . $socialUser['name'] . "', '" . $socialUser['email'] . "');");
        if (!$result) {
            echo mysqli_error($connect);
            exit;
        }
        $result = mysqli_query($connect, "SELECT * from `user` WHERE `user_email` ='" . $socialUser['email'] . "'");
    }
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["user_name"] = $user["user_name"];
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION['user_email']= $user["user_email"];
        header('Location: ./index.php');
    }
}

function validateDateTime($date) {
    //Kiểm tra định dạng ngày tháng xem đúng DD/MM/YYYY hay chưa?
    preg_match('/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/', $date, $matches);
    if (count($matches) == 0) { //Nếu ngày tháng nhập không đúng định dạng thì $match = array(); (rỗng)
        return false;
    }
    $separateDate = explode('-', $date);
    $day = (int) $separateDate[0];
    $month = (int) $separateDate[1];
    $year = (int) $separateDate[2];
    //Nếu là tháng 2
    if ($month == 2) {
        if ($year % 4 == 0) { //Nếu là năm nhuận
            if ($day > 29) {
                return false;
            }
        } else { //Không phải năm nhuận
            if ($day > 28) {
                return false;
            }
        }
    }
    //Check các tháng khác
    switch ($month) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            if ($day > 31) {
                return false;
            }
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            if ($day > 30) {
                return false;
            }
            break;
    }
    return true;
}

?>