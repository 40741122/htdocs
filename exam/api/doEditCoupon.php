<?php
require_once("../coupon-db-connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$id=$_POST["id"];
$name=$_POST["name"];
$code=$_POST["code"];
$max_count=$_POST["max_count"];
$discount_method=$_POST["discount_method"];
$discount=$_POST["discount"];
$start=$_POST["start"];
$end=$_POST["end"];

$sql="SELECT * FROM coupon WHERE code='$code'";
$result = $conn->query($sql);
$rowCount=$result->num_rows;

$sqlGetCode="SELECT * FROM coupon where id=$id";
$resultGetCode=$conn->query($sqlGetCode);
$rowGetCode=$resultGetCode->fetch_assoc();

if(empty($name) || empty($code) || empty($max_count) || empty($discount_method) ||empty($discount) || empty($start) || empty($end)){
    $data=[
        "status"=>0,
        "message"=>"請輸入必填欄位"
    ];
    echo json_encode($data);
    exit;
}

if($code!=$rowGetCode["code"] && $rowCount>0){
    $data=[
        "status"=>0,
        "message"=>"此優惠碼已存在"
    ];
    echo json_encode($data);
    exit;
}

if(strtotime($start) > strtotime($end)){
    $data=[
        "status"=>0,
        "message"=>"使用期間格式錯誤"
    ];
    echo json_encode($data);
    exit;
}

if($discount_method == "discount_cash"){
    $sql="UPDATE coupon SET name='$name', code='$code', max_count='$max_count', discount_cash='$discount', discount_pa=NULL, start='$start', end='$end' WHERE id=$id";
}else{
    $sql="UPDATE coupon SET name='$name', code='$code', max_count='$max_count', discount_cash=NULL, discount_pa='$discount', start='$start', end='$end' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    $data=[
        "status"=>1,
        "message"=>"更新優惠券完成"
    ];
    echo json_encode($data);
    exit;
} else {
    $data=[
        "status"=>0,
        "message"=>"更新優惠券錯誤: " . $conn->error
    ];
    echo json_encode($data);
    exit;
}

$conn->close();

