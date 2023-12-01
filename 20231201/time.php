<h2>time()</h2>
<?php
echo time();
?>
<h2>date_default_timezone_get</h2>
<?php
echo date_default_timezone_get();
?>
<h2>date</h2>
<h3>現在時間</h3>
<?php
echo date("Y/m/d H:i:s");
?>
<h3>東京時間</h3>
<?php
date_default_timezone_set("Asia/Tokyo");
echo date("Y/m/d H:i:s");
?>