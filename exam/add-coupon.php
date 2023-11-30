<!doctype html>
<html lang="en">

<head>
    <title>Add Coupon</title>
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
        <form action="doAddCoupon.php" method="post">
            <div class="row mb-3">
                <label for="coupon_name" class="col-sm-2 col-form-label">優惠券名稱</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="coupon_name" name="coupon_name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="coupon_code" class="col-sm-2 col-form-label">優惠券號碼</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="max_count" class="col-sm-2 col-form-label">可使用人數</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="max_count" name="max_count" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="date" class="col-sm-2 col-form-label">使用期間</label>
                <div class="col-auto">
                    <input type="date" class="form-control" name="start">
                </div>
                <div class="col-auto">
                    to
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="end">
                </div>
            </div>
            <div class="row mb-3">
                <label for="discount_method" class="col-sm-2 col-form-label">優惠方式</label>
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
            </div>
            <div class="row mb-3">
                <label for="discount" class="col-sm-2 col-form-label">優惠額數</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="discount" name="discount" required>
                </div>
            </div>
            <!-- <div class="row mb-3">
                <label for="discount" class="col-sm-2 col-form-label">優惠額數</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="number" class="form-control" id="discount" name="discount" required>
                        <span class="input-group-text">折</span>
                    </div>
                </div>
            </div> -->
            <button class="btn btn-info" type="submit">送出</button>
        </form>
    </div>
</div>


    <script>
        
    </script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>