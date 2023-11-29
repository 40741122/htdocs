<?php

if(!isset($_POST["email"]) || !isset($_POST["password"])){
    echo "請循正常管道進入此頁";
    exit;
}

$email = $_POST["email"];
$password = $_POST["password"];
$phones = $_POST["phones"];
$gender = $_POST["gender"];
$telecom=$_POST["telecom"];

// var_dump($phones);

//過濾掉空值
$phones=array_filter($phones);

if(empty($email)){
    echo "email不可為空";
    exit;
}

if(empty($password)){
    echo "password不可為空";
    exit;
}

switch($telecom){
    case 1:
        $telecomName="中華電信";
        break;
    case 2:
        $telecomName="中華電信";
        break;
    case 3:
        $telecomName="中華電信";
        break;
}

echo "email: $email, password: $password, telecom is $telecomName, gender is $gender, phones: ";

// 方法一
// for($i=0; $i<count($phones); $i++){
//     if($i==count($phones)-1){
//         echo $phones[$i];
//         break;
//     }
//     echo $phones[$i].", ";
// }

// 方法二
echo implode(", ", $phones);