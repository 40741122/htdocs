<?php
require_once("../db_connect.php");

$title=$_POST["title"];
$time=date('Y-m-d H:i:s');
// echo $name;

// var_dump($_FILES["file"]);

if($_FILES["file"]["error"]==0){
    if(move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/".$_FILES["file"]["name"])){
        // echo "上傳成功";
        $filename=$_FILES["file"]["name"];
        $sql="INSERT INTO images (title, name, created_at) VALUES('$title', '$filename', '$time')";

        // echo $sql;

        if ($conn->query($sql) === TRUE) {
            echo "新增資料完成";
            $last_id = $conn->insert_id;
            echo "最新一筆為序號".$last_id;
        } else {
                echo "移除資料錯誤: " . $conn->error;
        }

        header("location: file-up.php");

    }else{
        echo "上傳失敗";
    }
}

print_r($_FILES["file"]);