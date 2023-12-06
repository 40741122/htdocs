<?php
require_once("coupon-db-connect.php");

$filename=$_FILES["file"]["name"];
print_r($_FILES["file"]);

$sql = "UPDATE coupon SET img='$filename' WHERE coupon_id = 1";


if ($conn->query($sql) === TRUE) {
    echo "新增資料完成";
} else {
    echo "新增資料錯誤: " . 
    $conn->error;
}

// $conn->close();

// header("location: product-list.php");