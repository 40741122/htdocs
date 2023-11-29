<?php

if(!isset($_GET["email"]) || !isset($_GET["password"])){
    echo "請循正常管道進入此頁";
    exit;
}

$email = $_GET["email"];
$password = $_GET["password"];

if(empty($email)){
    echo "email不可為空";
    exit;
}

if(empty($password)){
    echo "password不可為空";
    exit;
}

echo "$email, $password";