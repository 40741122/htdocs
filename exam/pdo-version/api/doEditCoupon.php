<?php
require_once("../pdo-connect.php");

$id=$_POST["id"];
$name=$_POST["name"];
$code=$_POST["code"];
$max_count=$_POST["max_count"];
$discount_method=$_POST["discount_method"];
$discount=$_POST["discount"];
$start=$_POST["start"];
$end=$_POST["end"];

$stmt=$conn->prepare('SELECT * FROM `coupon` WHERE code =:code ');
$stmt->execute([':code' => $code]);
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
$rowCount=$stmt->rowCount();

$stmtGetCode=$conn->prepare('SELECT * FROM `coupon` WHERE code =:code ');
$stmtGetCode->execute([':code' => $code]);
$rowGetCode=$stmtGetCode->fetch(PDO::FETCH_ASSOC);

var_dump($rowGetCode);
echo "<br>";
var_dump($discount_method);


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


try {
    if($discount_method == "discount_cash"){
        $sql = "UPDATE `coupon` SET (`name`, `code`, `max_count`, `discount_cash`, `start`, `end`, `valid`) VALUES (:name, :code, :max_count, :discount, :start, :end, 1)";
    }else{
        $sql = "UPDATE SET `coupon` (`name`, `code`, `max_count`, `discount_pa`, `start`, `end`, `valid`) VALUES (:name, :code, :max_count, :discount, :start, :end, 1)";
    }
    $statement = $conn->prepare($sql); //資料先作暫存
    $statement->execute([':name' => $name, ':code' => $code, ':max_count' => $max_count, ':discount' => $discount, ':start' => $start, ':end' => $end]);
    $data=[
        "status"=>1,
        "message"=>"更新優惠券完成"
    ];
    echo json_encode($data);
  } catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  $conn = null;

