<?php
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    include('../../config/connect.php');
    require '../../carbon/autoload.php';

    if(isset($_POST['thoigian'])){
        $thoigian = $_POST['thoigian'];
    }else{
        $thoigian = '';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    }

    if($thoigian == '7ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    }elseif($thoigian == '28ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
    }elseif($thoigian == '90ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
    }elseif($thoigian == '365ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    }

    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    $sql_thongke = "SELECT * FROM thongke WHERE ngaydat BETWEEN '$subdays' AND '$now' ORDER BY ngaydat ASC";
    $sql_query_thongke = mysqli_query($connect,$sql_thongke);

    while($val = mysqli_fetch_array($sql_query_thongke)){
        $chart_data[] = array(
            'date' => $val['ngaydat'],
            'order' => $val['donhang'],
            'revenue' => $val['doanhthu'],
            'quality' => $val['soluong']
        );
    }
    // print_r($chart_data);
    echo $data = json_encode($chart_data);
?>