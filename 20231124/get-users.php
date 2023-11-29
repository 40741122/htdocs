<?php
require_once("../db_connect.php");

$sql="SELECT id, name FROM users";

$result=$conn->query(($sql));
$rows=$result->fetch_all(MYSQLI_ASSOC);

var_dump($rows);