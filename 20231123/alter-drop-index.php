<?php
require_once("../db_connect.php");

$sql = "ALTER TABLE users DROP INDEX name;";
 	 
if ($conn->query($sql) === TRUE) {
    	echo "移除Name的索引成功";
} else {
    	echo "移除索引錯誤: " . $conn->error;
}

$conn->close();