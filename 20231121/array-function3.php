<?php
$fruit=["apple", "banana", "peach", "melon"];
?>
原始：<?php print_r($fruit); ?>
<h2>array_shift</h2>
<?php
array_shift($fruit);
print_r($fruit); 
?>
<h2>array_unshift</h2>
<?php
array_unshift($fruit, "apple");
print_r($fruit); 
?>
<h2>array_pop</h2>
<?php
array_pop($fruit);
print_r($fruit); 
?>
<h2>array_push</h2>
<?php
array_push($fruit, "mango");
array_push($fruit, "grape");
array_push($fruit, "pineapple");

print_r($fruit); 
?>
<h2>array_slice</h2>
<?php
$fruit2=array_slice($fruit, 0);
print_r($fruit2);
echo "<br>";
$fruit3=array_slice($fruit, 2, 4);
print_r($fruit3);
?>
<h2>array_splice</h2>
<?php
array_splice($fruit, 2, 1);
print_r($fruit);
echo "<br>";
array_splice($fruit, 3, 0, "peach");
print_r($fruit);
?>
<h2>array_rand</h2>
<?php
$array_rand=array_rand($fruit, 2);
print_r($array_rand);
echo "<br>";
for($i=0; $i<count($array_rand); $i++){
    echo $fruit[$array_rand[$i]]."<br>";
}
?>
<h2>array_flip</h2>
<?php
$cars=["BMW", "Toyata", "Tesla"];
$flipCars=array_flip($cars);
print_r($flipCars);
