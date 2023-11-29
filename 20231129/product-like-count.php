<?php
require_once("../db_connect.php");

$sql="SELECT product.name AS product_name, user_like.*, COUNT(user_like.product_id) AS product_count
FROM user_like
JOIN product ON user_like.product_id = product.id
GROUP BY user_like.product_id";

$result = $conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);

?>

<pre>
<?php print_r($rows); ?>
</pre>