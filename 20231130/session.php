<?php

session_start();
$_SESSION["name"]="Joe";

echo $_SESSION["name"]="Joe";
echo "<hr>" ;

$_SESSION["user"]=[
    "name" => "Amy",
    "email" => "amy@test.com",
    "phone" => "0911223365W"
];

var_dump($_SESSION["user"]);