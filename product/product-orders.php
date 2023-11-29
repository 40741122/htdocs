<?php
    require_once("../db_connect.php");

    $sql="SELECT user_order.*,product.name AS product_name, product.price, users.name AS user_name FROM user_order JOIN product ON product.id = user_order.product_id JOIN users ON users.id = user_order.user_id ORDER BY order_date DESC";
    $result=$conn->query( $sql );
    $rows=$result->fetch_all(MYSQLI_ASSOC);

    $pageName="銷售紀錄";
?>

<!doctype html>
<html lang="en">

<head>
  <title>Product Orders</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
        include("../user/css.php");
    ?>

</head>

<body>
  <div class="container">
    <h1><?=$pageName?></h1>
    <div class="py-2">
      <form action="date-range.php">
        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <input type="date" class="form-control" name="start">
          </div>
          <div class="col-auto">
            to
          </div>
          <div class="col-auto">
            <input type="date" class="form-control" name="end">
          </div>
          <div class="col-auto">
            <button class="btn btn-info text-white" type="submit">GO</button>
          </div>
        </div>
      </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="text-nowrap">
                    <th>編號</th>
                    <th>日期</th>
                    <th>品名</th>
                    <th>數量</th>
                    <th>單價</th>
                    <th>總價</th>
                    <th>消費者</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><a href="date-orders.php?date=<?=$row["order_date"]?>"><?= $row["order_date"] ?></a></td>
                    <td><a href="product-single-orders.php?id=<?=$row["product_id"]?>"><?= $row["product_name"] ?></a></td>
                    <td><?= $row["amount"] ?></td>
                    <td  class="text-end"><?= number_format($row["price"]) ?></td>
                    <?php $total=$row["amount"]*$row["price"]; ?>
                    <td class="text-end"><?= number_format($total)?></td>
                    <td>
                      <a href="user-orders.php?id=<?=$row["user_id"]?>">
                      <?= $row["user_name"] ?>
                      </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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