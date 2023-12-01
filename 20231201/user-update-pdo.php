<?php
require_once("../pdo-connect.php");

if(!isset($_GET["id"])){
    $id=1;
}else{
    $id=$_GET["id"];
}

$email="peter@test.com";
$phone="0900000000";

$stmt=$conn->prepare("UPDATE users SET email=:email, phone=:phone WHERE id=:id");

try{
    $stmt->execute([
        "id"=>$id,
        "email"=>$email,
        "phone"=>$phone
    ]);
    echo "更新資料成功";
}catch(PDOException $e){
    echo $e->getMessage();
}

$conn=null;