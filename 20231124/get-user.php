<?php
require_once("../db_connect.php");

// $sql="SELECT * FROM users where name='Tom'";
$sql="SELECT * FROM users where id='2'";


$result=$conn->query(($sql));
// $rows=$result->fetch_all(MYSQLI_ASSOC);

// var_dump($rows);
// echo "<br>";
// echo $rows[0]["name"];

$row=$result->fetch_assoc();
var_dump($row);
echo "<br>";
echo $row["name"];