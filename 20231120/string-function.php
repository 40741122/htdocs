<h2>strlen()</h2>
<?php 
$string="Hello World";
echo strlen($string);
?>
<h2>str_word_count</h2>
<?php 
echo str_word_count($string);
?>
<h2>substr</h2>
<?php 
$name="Samantha";
echo substr($name, 2);
echo "<br>";
echo substr($name, -2);
echo "<br>";
echo substr($name, 3,4);
?>
<h2>strstr</h2>
<?php 
$email="jack@test.com";
echo strstr($email, '@');
echo "<br>";
echo strstr($email, '@', true);
?>
<h2>strpos</h2>
<?php 
echo strpos($string, "World");
echo "<br>";
$ifExist=strpos($string, "world");
var_dump($ifExist);
?>
<h2>explode</h2>
<?php 
$saying="Hello John, how are you?";
$sayArr=explode(" ", $saying);
var_dump($sayArr);
?>
<h2>str_replace</h2>
<?php 
$output=str_replace("World", "Kitty", $string);
echo $output;
?>
