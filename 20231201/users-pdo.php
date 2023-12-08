<?php
require_once("../pdo-connect.php");

$stmt=$conn->prepare('SELECT * FROM users WHERE valid=1');

try{
    $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($rows);
}catch(PDOException $e){
    echo $e->getMessage();
}

$conn=null;

