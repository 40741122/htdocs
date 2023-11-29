<?php
if(!isset($_GET["id"])){
    header("location: user-list.php");
}

$id=$_GET["id"];

require_once("../db_connect.php");
$sql="SELECT * FROM users where id=$id AND valid=1";

$result=$conn->query(($sql));
$userCount = $result->num_rows;

$row=$result->fetch_assoc();

$sqlLikes="SELECT user_like.*, product.*
FROM user_like
JOIN product ON user_like.product_id = product.id
WHERE user_like.user_id = $id;";

$resultLike=$conn->query($sqlLikes);
$rowLikes=$resultLike->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <title>User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
     include("css.php");
    ?>

</head>

<body>
    <div class="container">
        <div class="py-2">
        <a class="btn btn-info text-white" href="user-list.php" title="回使用者列表">
                <i class="bi bi-arrow-90deg-left"></i>
            </a>
        </div>
        <?php  if($userCount == 0):?>
            <h1>使用者不存在</h1>
        <?php else: ?>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <td><?=$row["id"]?></td>
            </tr>
            <tr>
                <th>name</th>
                <td><?=$row["name"]?></td>
            </tr>
            <tr>
                <th>email</th>
                <td><?=$row["email"]?></td>
            </tr>
            <tr>
                <th>phone</th>
                <td><?=$row["phone"]?></td>
            </tr>
            <tr>
                <th>created time</th>
                <td><?=$row["created_at"]?></td>
            </tr>
        </table>
        <div class="py-2">
            <a class="btn btn-info text-white" href="user-edit.php?id=<?=$row["id"]?>" title="修改資料">
                <i class="bi bi-pencil-fill"></i>
            </a>
        </div>
        <?php endif; ?>
        <h2>收藏商品</h2>
        <?php
        $likesCount=$resultLike->num_rows;
        if($likesCount) :?>
        <div class="row g-3">
            <?php foreach($rowLikes as $rowLike):?>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="/product/product.php?id=<?=$rowLike["product_id"]?>">
                    <div class="ratio ratio-4x3 mb-2">
                        <img class="object-fit-cover" src="/images/<?=$rowLike["img"]?>" alt="">
                    </div>
                </a>
                <h3>
                    <a href="/product/product.php?id=<?=$rowLike["product_id"]?>"><?=$rowLike["name"]?></a>  
                </h3>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            尚未收藏商品
        <?php endif; ?>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>