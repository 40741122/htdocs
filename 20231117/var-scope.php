<?php
$a=99;

function show(){
    $b=10; //區域變數
    $a=$GLOBALS["a"]; //全域變數
    static $c=1; //靜態變數

    echo "a is $a.<br>";
    echo "b is $b.<br>";
    echo "c is $c.<br>";
    echo "<hr>";
    $b++;
    $c++;
}

// echo $b;
show();
show();
show();

