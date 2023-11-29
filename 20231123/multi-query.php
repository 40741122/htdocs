<?php
require_once("../db_connect.php");
$time=date('Y-m-d H:i:s');


$sql = "INSERT INTO users(name, phone, email, created_at)
    Value ('Tom', '0900000000', 'tom@example.com', '$time');";
$sql .= "INSERT INTO users(name, phone, email, created_at)
    Value ('Mike', '0900000000', 'Mike@example.com', '$time');";
$sql .= "INSERT INTO users(name, phone, email, created_at)
    Value ('Lucy', '0900000000', 'Lucy@example.com', '$time');";

// echo $sql;

if ($conn->multi_query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "移除資料錯誤: " . $conn->error;
}