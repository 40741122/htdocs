<?php
require_once("../db_connect.php");

$sql="ALTER TABLE users CHANGE COLUMN userEmail email VARCHAR(30), ADD INDEX(name);";

if ($conn->query($sql) === TRUE) {
    echo "資料表 users 修改完成";
} else {
    echo "修改資料表錯誤: " . $conn->error;
}

$conn->close();