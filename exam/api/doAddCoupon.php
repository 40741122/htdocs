<?php

require_once("../coupon-db-connect.php");

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

$sql="SELECT * FROM coupon WHERE code='$code'";
$result = $conn->query($sql);
$rowCount=$result->num_rows;

if(empty($name) || empty($code) || empty($max_count) || empty($discount_method) ||empty($discount) || empty($start) || empty($end)){
    $data=[
        "status"=>0,
        "message"=>"請輸入必填欄位"
    ];
    echo json_encode($data);
    exit;
}

if(!isset($discount_method)){
    $data=[
        "status"=>0,
        "message"=>"請勾選折扣方式"
    ];
    echo json_encode($data);
    exit;
}

if($rowCount>0){
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
    // echo "新增資料完成, ";
    $last_id = $conn->insert_id;
    // echo "最新一筆為序號".$last_id;
    $data=[
        "status"=>1,
        "message"=>"新增優惠券完成, 最新一筆為序號".$last_id
    ];
    echo json_encode($data);
    exit;
} else {
    $data=[
        "status"=>0,
        "message"=>"新增優惠券錯誤: " . $conn->error
    ];
    echo json_encode($data);
    exit;
}

$conn->close();