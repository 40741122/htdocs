<?php
require_once("../db_connect.php");

$sql="SELECT * FROM users WHERE name LIKE '%Ja%'";

$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

var_dump($rows);

$conn->close();
