<?php
setcookie("account", "may", time()+3600, "/");

echo $_COOKIE["account"];
?>