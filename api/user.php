<?php
require_once("../db_connect.php");

if(!isset($_POST['id'])){
    // echo "請循正常管道進入";
    $data=[
        "status" => 0,
        "message" => "請循正常管道進入"
    ];
    echo json_encode($data);
    exit;
}

$id=$_POST["id"];

// $data=[
//     "id" =>$id
// ];
// echo json_encode($data);
$sql = "SELECT * FROM users 
WHERE id='$id' AND valid=1";
$result = $conn->query($sql);
$row=$result->fetch_assoc();

if($result->num_rows>0){
    $data=[
        "status" => 1,
        "data" =>$row
    ];
}else{
    $data=[
        "status" => 0,
        "message" => "無此使用者"
    ];
}

echo json_encode($data);

$conn->close();