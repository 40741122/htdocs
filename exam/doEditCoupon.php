<?php
require_once("coupon-db-connect.php");

if(!isset($_POST["coupon_name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id=$_POST["coupon_id"];
$name=$_POST["coupon_name"];
$code=$_POST["code"];
$max_count=$_POST["max_count"];
$discount_method=$_POST["discount_method"];
$discount=$_POST["discount"];
$start=$_POST["start"];
$end=$_POST["end"];

if($discount_method == "discount_cash"){
    $sql="UPDATE coupon SET coupon_name='$name', code='$code', max_count='$max_count', discount_cash='$discount', discount_pa=NULL, start='$start', end='$end' WHERE coupon_id=$id";
}else{
    $sql="UPDATE coupon SET coupon_name='$name', code='$code', max_count='$max_count', discount_cash=NULL, discount_pa='$discount', start='$start', end='$end' WHERE coupon_id=$id";
}

if($conn->query($sql) === TRUE){
    echo "更新成功";
}else{
    echo "更新資料錯誤: ";
    $conn->error;
}

$conn->close();

header("location: coupon.php?id=$id");