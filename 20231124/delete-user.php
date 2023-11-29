<?php

require_once("../db_connect.php");

$sql="DELETE FROM users WHERE id=12";

if($conn->query($sql) === TRUE){
    echo "刪除成功";
}else{
    echo "刪除資料錯誤: ";
    $conn->error;
}

$conn->close();