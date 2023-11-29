<?php
    require_once("../db_connect.php");

    if(!isset($_GET["id"])){
      header("location: product-orders.php");
      exit;
    }

    $id=$_GET["id"];


    $sql="SELECT user_order.*,product.name AS product_name, product.price, users.name AS user_name FROM user_order JOIN product ON product.id = user_order.product_id JOIN users ON users.id = user_order.user_id WHERE user_order.product_id=$id ORDER BY order_date DESC";
    $result=$conn->query( $sql );
    $rows=$result->fetch_all(MYSQLI_ASSOC);

    $pageTitle=$rows[0]["product_name"]."銷售紀錄";
?>

<!doctype html>
<html lang="en">

<head>
  <title><?=$pageTitle?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php
        include("../user/css.php");
    ?>

</head>

<body>
  <div class="container">
    <div class="py-2">
      <a class="btn btn-info text-white" href="product-orders.php">回所有銷售資料</a>
    </div>
    <h1><?=$rows[0]["product_name"]?>銷售紀錄</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr class="text-nowrap">
                    <th>編號</th>
                    <th>日期</th>
                    <th>數量</th>
                    <th>單價</th>
                    <th>總價</th>
                    <th>消費者</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalTotal=0;
                foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row["id"] ?></td>
                    <td><?= $row["order_date"] ?></td>                    <td><?= $row["amount"] ?></td>
                    <td  class="text-end"><?= number_format($row["price"]) ?></td>
                    <?php $total=$row["amount"]*$row["price"]; ?>
                    <td class="text-end"><?= number_format($total)?></td>
                    <td><?=$row["user_name"]?></td>
                </tr>
                <?php 
                $totalTotal += $total;
                endforeach; ?>
            </tbody>
        </table>
        <div class="text-end">總銷售額:<?=number_format($totalTotal)?></div>
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