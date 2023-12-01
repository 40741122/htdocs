<?php

$user=[
    "name" => "John",
    "eamil" => "john@twst.com"
];

var_dump($user);

unset($user["eamil"]);

echo "<br>";

var_dump($user);