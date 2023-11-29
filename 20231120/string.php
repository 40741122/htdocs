<h2>單引號</h2>
<?php
$foo='This is a string';
echo 'foo is $foo.';
echo "<br>";
echo 'I said "go home"!';
echo "<br>";
echo 'The path is C:\newpath';
echo "<br>";
echo "The path is C:\\newpath";
?>
<h2>雙引號</h2>
<?php
$foo="This is a string";
echo "foo is $foo.";
echo "<br>";
echo "I said \"go home\"!";
echo "<br>";
echo "The path is C:\newpath";
echo "<br>";
echo "The path is C:\\newpath";
echo "<br>";
$time="a day";
echo "I earn \$10 dollars $time"
?>
<h2>字串連結</h2>
<?php 
$num1=4 + "3";
echo '$num1= 4 + "3":'.$num1;
echo "<br>";
$string="Hello";
$string=$string." World";
echo $string;
?>
