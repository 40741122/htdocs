<?php
if(!isset($_GET["id"])){
    header("location: coupon-list.php");
}

$id=$_GET["id"];

require_once("coupon-db-connect.php");
$sql="SELECT * FROM coupon where id=$id";

$result=$conn->query(($sql));
$couponCount = $result->num_rows;

$row=$result->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <title>優惠券</title>
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
        <a class="btn btn-info text-white" href="coupon-list.php" title="回優惠券列表">
                <i class="bi bi-arrow-90deg-left"></i>
            </a>
        </div>
        <?php  if($couponCount == 0):?>
            <h1>優惠券不存在</h1>
        <?php else: ?>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?=$row["id"]?></td>
            </tr>
            <tr>
                <th>優惠券名稱</th>
                <td><?=$row["name"]?></td>
            </tr>
            <tr>
                <th>優惠碼</th>
                <td><?=$row["code"]?></td>
            </tr>
            <tr>
                <th>可使用人數</th>
                <td><?=$row["max_count"]?></td>
            </tr>
            <tr>
                <th>以使用人數</th>
                <td><?=$row["used_count"]?></td>
            </tr>
            <tr>
                <th>折扣金額</th>
                <td>
                    <?php if(isset($row["discount_pa"])) : ?><?= $row["discount_pa"] ?>折
                    <?php elseif(isset($row["discount_cash"])) : ?><?= $row["discount_cash"] ?>NTD
                    <?php endif; ?>   
                </td>
            </tr>
            <tr>
                <th>可使用時間</th>
                <td><?= $row["start"] ?> ~ <?= $row["end"] ?></td>
            </tr>
        </table>
        <div class="py-2">
            <a class="btn btn-info text-white" href="coupon-edit.php?id=<?=$row["id"]?>" title="修改資料" >
                <i class="bi bi-pencil-fill"></i>
            </a>
        </div>
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