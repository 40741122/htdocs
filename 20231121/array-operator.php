<?php
$a=["0","1","2"];
$b=[0,1,2];

var_dump($a==$b);
echo "<br>";
var_dump($a===$b);
echo "<br>";
var_dump($a!=$b);
echo "<br>";
var_dump($a<>$b);
echo "<br>";
var_dump($a!==$b);
echo "<br>";
?>
<h2>陣列的聯集</h2>
<?php
$c=[
    "John"=>["John", 1],
    "Sam"=>["Sam", 2]
];
$d=[
    "John"=>["John", 3],
    "Mary"=>["Mary", 4]
];
$e=$c+$d;
?>
<pre>
    <?php
    print_r($e);
    ?>
</pre>