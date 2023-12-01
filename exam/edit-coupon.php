<?php
if(!isset($_GET["id"])){
    header("location: coupon-list.php");
}

$id=$_GET["coupon_id"];

require_once("coupon-db-connect.php");
$sql="SELECT * FROM coupon where id=$id";

$result=$conn->query(($sql));
$couponCount = $result->num_rows;

$row=$result->fetch_assoc();

?>
<!doctype html>
<html lang="en">

<head>
    <title>Coupon Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
     include("css.php");
    ?>

</head>

<body>

    <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">警告</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    確認刪除?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <a href="doDeleteCoupon.php?id=<?=$row["id"]?>" class="btn btn-danger">確認</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="py-2">
        <a class="btn btn-info text-white" href="coupon-list.php" title="回優惠券列表">
                <i class="bi bi-arrow-90deg-left"></i>
            </a>
        </div>
        <?php  if($couponCount == 0):?>
            <h1>優惠券不存在</h1>
        <?php else: ?>
        <form action="doEditCoupon.php" method="post">
            <table class="table table-bordered">
                <input type="hidden" name="id" value="<?=$row["coupon_id"]?>">
                <tr>
                    <th>優惠券名稱</th>
                    <td>
                        <input type="text" class="form-control" name="coupon_name" value="<?=$row["coupon_name"]?>">
                    </td>
                </tr>
                <tr>
                    <th>優惠碼</th>
                    <td>
                        <input type="text" class="form-control" name="code" value="<?=$row["code"]?>">
                    </td>
                </tr>
                <tr>
                    <th>可使用人數</th>
                    <td>
                        <input type="number" class="form-control" name="max_count" value="<?=$row["max_count"]?>">
                    </td>
                </tr>
                <tr>
                    <th>折扣方式</th>
                    <td>
                        <div class="form-check col-auto">
                            <input class="form-check-input" type="radio" name="discount_method" id="discount_cash" value="discount_cash">
                            <label class="form-check-label" for="discount_cash">
                                現金折抵
                            </label>
                        </div>
                        <div class="form-check col-auto">
                            <input class="form-check-input" type="radio" name="discount_method" id="discount_pa" value="discount_pa" checked>
                            <label class="form-check-label" for="discount_pa">
                                折扣
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>折扣額數</th>
                    <td>
                        <input type="tel" class="form-control" name="discount" value="
                        <?php if(isset($row["discount_pa"])) : ?>
                            <?=$row["discount_pa"]?>
                        <?php else if(isset($row["discount_cash"])) : ?>
                            <?=$row["discount_cash"]?>
                        <?php endif; ?>
                        ">
                    </td>
                </tr>
                <tr>
                    <th>使用期間</th>
                    <td>
                        <div class="col-auto">
                            <input type="date" class="form-control" name="start" value="<?=$row["start"]?>">
                        </div>
                        <div class="col-auto">
                            to
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control" name="end" value="<?=$row["end"]?>">
                        </div>
                    </td>
                </tr>
            </table>
            <div class="py-2 d-flex justify-content-between">
                <div>
                    <button class="btn btn-info text-white" type="submit">儲存</button>
                    <a class="btn btn-info text-white" href="coupon.php?id=<?=$row["id"]?>">取消</a>
                </div>
                <div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#alertModal" class="btn btn-danger">刪除</button>
                </div>
            </div>
        </form>
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