<?php
require_once("../db_connect.php");

if(!isset($_POST["name"])){
    echo "請循正常管道進入此頁";
    exit;
}

$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$repassword=$_POST["repassword"];

if(empty($email) || empty($name) || empty($password) || empty($repassword)){
    echo "請輸入必填欄位";
    exit;
}

if($password != $repassword){
    echo "前後密碼不一致";
    exit;
}

$sql="SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
$rowCount=$result->num_rows;
// echo $rowCount;

if($rowCount>0){
    die("此帳號已存在");
}

$password=md5($password);

$time=date('Y-m-d H:i:s');

$sql="INSERT INTO users (name, password, email, created_at, valid)
VALUES ('$name', '$password', '$email', '$time', 1)";

// echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
    $last_id = $conn->insert_id;
    echo "最新一筆為序號".$last_id;
} else {
    echo "移除資料錯誤: " . $conn->error;
}

header("location: sign-up.php");