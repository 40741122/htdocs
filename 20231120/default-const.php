<h1>預設常數</h1>
<h2>PHP_VERSION</h2>
<?php 
echo PHP_VERSION;
?>
<h2>PHP_OS</h2>
<?php 
echo PHP_OS;
?>
<h1>魔術常數</h1>
<h2>__LINE__</h2>
<?php 
echo __LINE__;
?>
<h2>__FILE__</h2>
<?php 
echo __FILE__;
?>
<h2>__DIR__</h2>
<?php 
echo __DIR__;
?>
<h2>__FUNCTION__</h2>
<?php 
function test(){
    echo __FUNCTION__;
}
test();
?>