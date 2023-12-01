<?php
require_once("../db_connect.php");

if(!isset($_POST["email"])){
    $data=[
        "status"=>0,
        "message"=>"請循正常管道進入"
    ];
    echo json_encode($data);
    exit;
}

$email=$_POST["email"];
$name=$_POST["name"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];

// $data=[
//     "email"=>$email,
//     "name"=>$name,
//     "password"=>$password,
//     "repassword"=>$repassword
// ];
// echo json_encode($data);
// exit;

// echo "$email, $name, $password, $repassword";

if(empty($email) || empty($name) || empty($password) || empty($repassword)){
    $data=[
        "status"=>0,
        "message"=>"請輸入必填欄位"
    ];
    echo json_encode($data);
    exit;
}
// echo "$email, $name, $password, $repassword";
if($password!=$repassword){
    $data=[
        "status"=>0,
        "message"=>"前後密碼不一致"
    ];
    echo json_encode($data);
    exit;
}

$sql="SELECT * FROM users WHERE email='$email'";
$result=$conn->query($sql);
$rowCount=$result->num_rows;
if($rowCount>0){
    $data=[
        "status"=>0,
        "message"=>"此帳號已經存在"
    ];
    echo json_encode($data);
    exit;
}
$password=md5($password);

$time=date('Y-m-d H:i:s');
$sql="INSERT INTO users (name, password, email, created_at, valid)
VALUES ('$name', '$password', '$email', '$time', 1)";

// echo $sql;
if ($conn->query($sql) === TRUE) {
    // echo "新增資料完成, ";
    $last_id = $conn->insert_id;
    // echo "最新一筆為序號".$last_id;
    $data=[
        "status"=>1,
        "message"=>"新增資料完成, 最新一筆為序號".$last_id
    ];
    echo json_encode($data);
    exit;
} else {
    $data=[
        "status"=>0,
        "message"=>"新增資料錯誤: " . $conn->error
    ];
    echo json_encode($data);
    exit;
}
$conn->close();
