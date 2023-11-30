<?php

require_once("coupon-db-connect.php");

// if(!isset($_POST["name"])){
//     echo "請循正常管道進入";
//     die;
// }

$coupon_name=$_POST["coupon_name"];
$coupon_code=$_POST["coupon_code"];
$max_count=$_POST["max_count"];
$discount_method=$_POST["discount_method"];
$discount=$_POST["discount"];
$start=$_POST["start"];
$end=$_POST["end"];

if($discount_method == "discount_cash"){
    $sql = "INSERT INTO coupon (coupon_name, code, max_count, discount_cash, start, end)
    VALUES ('$coupon_name', '$coupon_code', '$max_count', '$discount', $start, $end)";
}else{
    $sql = "INSERT INTO coupon (coupon_name, code, max_count, discount_pa, start, end)
    VALUES ('$coupon_name', '$coupon_code', '$max_count', '$discount', $start, $end)";
}


// if(empty($name)||empty($email)||empty($phone)){
//     echo "請輸入資料";
//     die;
// }
 
if ($conn->query($sql) === TRUE) {
    	echo "新增資料完成";
        $last_id = $conn->insert_id;
        echo "最新一筆為序號".$last_id;
} else {
    	echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

header("location: user-list.php");