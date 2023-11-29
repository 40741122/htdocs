<?php
require_once("../db_connect.php");

$sql = "ALTER TABLE users DROP COLUMN age;";
 	 
if ($conn->query($sql) === TRUE) {
    	echo "移除 age 欄位";
} else {
    	echo "移除欄位錯誤: " . $conn->error;
}

$conn->close();