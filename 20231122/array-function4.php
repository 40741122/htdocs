<h2>array_diff</h2>
<?php
$a=["a", "b", "c", "d"];
$b=["a", "c", "x", "y"];
print_r(array_diff($a, $b));
?>
<h2>array_sum</h2>
<?php
$arr=[2,4,5];
echo array_sum($arr);
?>
<h2>array_unique</h2>
<?php
$input=[
    "a"=>"John",
    "Sam",
    "b"=>"John",
    "Sam",
    "Mary"
];
$result=array_unique($input);
print_r($result);
?>
<h2>array_pad</h2>
<?php
$input=[1,2,3];
$result=array_pad($input,5,10);
print_r($result);
?>
<h2>in_array()</h2>
<?php
$cars=["BMW", "Toyata", "Tesla", "Honda"];
$car="BMW";
var_dump(in_array($car, $cars));
echo "<br>";
var_dump(in_array("Oudi", $cars));
?>
<h2>array_search</h2>
<?php
echo array_search($car, $cars);
echo array_search("Oudi", $cars);
?>
<h2>array_key_exists</h2>
<?php
$student=[
    "John"=>101,
    "May"=>102
];
var_dump(array_key_exists("John", $student));
?>
<h2>arsort</h2>
<?php
$cars=[
    "Toyota"=>"Altis",
    "BMW"=>"530i",
    "Tesla"=>"Model S"
];
print_r($cars);
echo "<br>";
asort($cars);
print_r($cars);
?>
<h2>rsort</h2>
<?php
rsort($cars);
print_r($cars);
?>
<h2>natsort</h2>
<?php
$array1=["id_22", "id_10", "id_2", "id_1"];
asort($array1);
print_r($array1);
echo "<br>";
natsort($array1);
print_r($array1);
?>