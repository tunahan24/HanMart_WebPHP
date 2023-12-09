<?php
    $severname="localhost";
    $username="root";
    $password="";
    $database="hanmart";

    $connect= mysqli_connect($severname,$username,$password,$database);

    if($connect){
        $setLang=mysqli_query($connect, "SET NAMES 'utf8'");
    }else{
        die("Kết nối thất bại!!!".mysqli_connect_error());
    }
?>