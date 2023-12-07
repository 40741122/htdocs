<?php

require_once("coupon-db-connect.php");
session_start();

// if(!isset($_POST["name"])){
//     echo "請循正常管道進入";
//     die;
// }

$name=$_POST["name"];
$code=$_POST["code"];
$max_count=$_POST["max_count"];
$discount_method=$_POST["discount_method"];
$discount=$_POST["discount"];
$start=$_POST["start"];
$end=$_POST["end"];

$_SESSION["name"]=$name;
$_SESSION["code"]=$code;
$_SESSION["max_count"]=$max_count;
$_SESSION["discount_method"]=$discount_method;
$_SESSION["discount"]=$discount;
$_SESSION["start"]=$start;
$_SESSION["end"]=$end;

$sql="SELECT * FROM coupon WHERE code='$code'";
$result = $conn->query($sql);
$rowCount=$result->num_rows;

if(!isset($discount_method)){
    $_SESSION["error_method"]["message"]="請勾選折扣方式";
}

if($rowCount>0){
    $_SESSION["error_code"]["message"]="此優惠碼已存在";
}

if(strtotime($start) > strtotime($end)){
    $_SESSION["error_date"]["message"]="使用期間格式錯誤";
}

if($rowCount>0 || strtotime($start) > strtotime($end) || !isset($discount_method)){
    header("location: add-coupon.php");
    exit;
}

if($discount_method == "discount_cash"){
    $sql = "INSERT INTO coupon (name, code, max_count, discount_cash, start, end, valid)
    VALUES ('$name', '$code', '$max_count', '$discount', '$start', '$end', 1)";
}else{
    $sql = "INSERT INTO coupon (name, code, max_count, discount_pa, start, end, valid)
    VALUES ('name', '$code', '$max_count', '$discount', '$start', '$end', 1)";
}


// if(empty($name)||empty($email)||empty($phone)){
//     echo "請輸入資料";
//     die;
// }
 
if ($conn->query($sql) === TRUE) {
    unset($_SESSION["name"]);
    unset($_SESSION["code"]);
    unset($_SESSION["max_count"]);
    unset($_SESSION["discount_method"]);
    unset($_SESSION["discount"]);
    unset($_SESSION["start"]);
    unset($_SESSION["end"]);

	echo "新增資料完成";
    $last_id = $conn->insert_id;
    echo "最新一筆為序號".$last_id;
} else {
	echo "新增資料錯誤: " . $conn->error;
}

$conn->close();

header("location: coupon-list.php");