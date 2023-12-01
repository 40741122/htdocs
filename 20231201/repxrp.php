<h2>preg_match</h2>
<?php
$input="Sam loves his mother";
$pattern="/(fa|mo)ther/";
if(preg_match($pattern, $input)){
    echo "matched";
}else{
    echo "not matched";
}
?>
<h2>preg_split</h2>
<?php
$email="john@test.com.tw";
$pattern2="/\.|@/";
$output=preg_split($pattern2, $email);
var_dump($output);
?>