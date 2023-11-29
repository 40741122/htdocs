<h2>條件運算子</h2>
<?php
$a=10;
$b=($a>0) ? "Positive":"Negative";

echo $b;
?>
<h2>組合比較子</h2>
<?php 
$a=5;
$b=10;
echo $a<=>$b;//a>b 1 a=b 0 a<b -1
?>
<h2>邏輯運算子</h2>
<?php
$x=10;
$y=5;
var_dump($x==10 and $y==5);
echo "<br>";
var_dump($x==10 && $y==10);
echo "<br>";
var_dump($x==10 or $y==5);
echo "<br>";
var_dump($x==10 || $y==5);
echo "<br>";
?>
<h2>xor運算子</h2>
<?php
var_dump($x==10 xor $y==5);
echo "<br>";
var_dump($x==5 xor $y==10);
echo "<br>";
var_dump($x==10 xor $y==10);
echo "<br>";
?>
<h2>優先層級</h2>
<?php
$boolean= false || true;
var_dump($boolean);
echo "<br>";
$boolean= false or true;
var_dump($boolean);
?>
<h2>參考運算子</h2>
<?php
$m=10;
$n=$m;
echo "m is: $m<br>";
echo "n is: $n<br>";
$n=5;
echo "m is: $m<br>";
echo "n is: $n<br>";
echo "<hr>";
$o=10;
$p=&$o;//參考運算子
echo "o is: $o<br>";
echo "p is: $p<br>";
$p=5;
echo "o is: $o<br>";
echo "p is: $p<br>";