<?php
require_once("coupon-db-connect.php");
session_start();

if(!isset($_POST["coupon_name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id=$_POST["coupon_id"];
$coupon_name=$_POST["coupon_name"];
$code=$_POST["code"];
$max_count=$_POST["max_count"];
$discount_method=$_POST["discount_method"];
$discount=$_POST["discount"];
$start=$_POST["start"];
$end=$_POST["end"];

$_SESSION["coupon_name"]=$coupon_name;
$_SESSION["code"]=$code;
$_SESSION["max_count"]=$max_count;
$_SESSION["discount_method"]=$discount_method;
$_SESSION["discount"]=$discount;
$_SESSION["start"]=$start;
$_SESSION["end"]=$end;

$sql="SELECT * FROM coupon WHERE code='$code'";
$result = $conn->query($sql);
$rowCount=$result->num_rows;

$sqlGetCode="SELECT * FROM coupon where coupon_id=$id";
$resultGetCode=$conn->query($sqlGetCode);
$rowGetCode=$resultGetCode->fetch_assoc();

var_dump($code);
var_dump($rowGetCode["code"]);
var_dump($code==$rowGetCode["code"]);
var_dump($rowCount>0);
var_dump($code==$rowGetCode["code"] && $rowCount>0);

if($code!=$rowGetCode["code"] && $rowCount>0){
    $_SESSION["error"]["message_code"]="此優惠碼已存在";
}

if(strtotime($start) > strtotime($end)){
    $_SESSION["error"]["message_date"]="使用期間格式錯誤";
}

if( ($code!=$rowGetCode["code"] && $rowCount>0) || strtotime($start) > strtotime($end)){
    header("location: coupon-edit.php?id=$id");
    exit;
}

if($discount_method == "discount_cash"){
    $sql="UPDATE coupon SET coupon_name='$coupon_name', code='$code', max_count='$max_count', discount_cash='$discount', discount_pa=NULL, start='$start', end='$end' WHERE coupon_id=$id";
}else{
    $sql="UPDATE coupon SET coupon_name='$coupon_name', code='$code', max_count='$max_count', discount_cash=NULL, discount_pa='$discount', start='$start', end='$end' WHERE coupon_id=$id";
}

if($conn->query($sql) === TRUE){
    unset($_SESSION["coupon_name"]);
    unset($_SESSION["code"]);
    unset($_SESSION["max_count"]);
    unset($_SESSION["discount_method"]);
    unset($_SESSION["discount"]);
    unset($_SESSION["start"]);
    unset($_SESSION["end"]);

    echo "更新成功";
}else{
    echo "更新資料錯誤: ";
    $conn->error;
}

$conn->close();

header("location: coupon.php?id=$id");