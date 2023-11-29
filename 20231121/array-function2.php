<h2>array_merge</h2>
<?php
$arr1=[
    "name"=>"John",
    2,
    3
];
$arr2=[
    "a",
    "b",
    "name"=>"sam",
    "age"=>18,
    4
];

$result=array_merge($arr1, $arr2);
?>

<pre>
    <?php print_r($result); ?>
</pre>

<h2>array_merge_recursive</h2>
<?php
$result2=array_merge_recursive($arr1, $arr2);
?>
<pre>
    <?php print_r($result2); ?>
</pre>

<h2>Compact</h2>
<?php
$var1="green";
$var2="yellow";
$var3="blue";
$myArr=compact("var1", "var2", "var3");
var_dump($myArr);
echo "<hr>";

$user=[
    "name"=>"John",
    "email"=>"john@test.com0"
];
$products=[
    [
        "id"=>1,
        "name"=>"item1"
    ],
    [
        "id"=>2,
        "name"=>"item2"
    ],
    [
        "id"=>3,
        "name"=>"item3"
    ]
];
$data=compact("user", "products");
?>
<pre>
    <?php print_r($data) ?>
</pre>
<div>
    hi, <?=$data["user"]["name"] ?>.
</div>
<hr>

<h2>array_chunk</h2>
<?php
$arr3=["a","b","c","d","e"];
$result_chunk=array_chunk($arr3,3);
?>
<pre>
    <?php print_r($result_chunk) ?>
</pre>

<h2>array_combine</h2>
<?php
$c=["John","Sam"];
$d=[28,32];
$result_combine=array_combine($c, $d);
var_dump($result_combine);
?>