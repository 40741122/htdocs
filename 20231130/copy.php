<?php

if(file_exists("sess.php")){
    copy("sess.php", "sess-new.php");
}