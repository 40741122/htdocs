<?php
require_once("../pdo-connect.php");

if(!isset($_GET["id"])){
    $id=1;
}else{
    $id=$_GET["id"];
}

$stmt=$conn->prepare('SELECT * FROM users WHERE id=:id AND valid=1');

try{
    $stmt->execute(["id"=>$id]);
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
}catch(PDOException $e){
    echo $e->getMessage();
}

$conn=null;