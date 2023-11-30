<?php

$handle=fopen("output.txt", "r");

while($line=fgets($handle)){
    echo nl2br($line);
}

rewind($handle);
echo fgetc($handle);

fclose($handle);