<?php
require_once("../db_connect.php");

$sql = "INSERT INTO users (name, phone, email)
VALUES ('May', '0900000011', 'may@example.com')";
 	 
if ($conn->query($sql) === TRUE) {
    	echo "新增資料完成";
} else {
    	echo "移除資料錯誤: " . $conn->error;
}

$conn->close();