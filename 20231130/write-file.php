<?php

$handle=fopen("output.txt", "a+");
fwrite($handle, "Hello World".PHP_EOL);
fwrite($handle, "This is line 2".PHP_EOL);
fwrite($handle, "This is line 3".PHP_EOL);
fclose($handle);