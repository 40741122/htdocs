<?php
require_once("coupon-db-connect.php");

$sqlTotal = "SELECT * FROM coupon WHERE valid=1";
$resultTotal=$conn->query($sqlTotal);
$totalUser=$resultTotal->num_rows;

  $sql = "SELECT * FROM coupon WHERE valid=1 ORDER BY coupon_id ASC";

$result = $conn->query($sql);

?>
<!doctype html>
<html lang="en">

<head>
  <title>Coupon List</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php
  include("css.php");
  ?>

    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script defer src="script.js"></script>


</head>

<body>
  <div class="container">
    <?php
    $couponCount = $result->num_rows;
    ?>
    <div class="py-2 d-flex justify-content-between align-items-center">
      <div><?php
            if (isset($_GET["search"])) :
            ?>
          <a class="btn btn-info text-white" href="coupon-list.php" title="回優惠券列表"><i class="bi bi-arrow-left"></i></a>
          搜尋<?= $_GET["search"] ?>的結果,
          <?php endif;
          ?>共 <?= $totalUser ?> 筆
      </div>
      <a class="btn btn-info text-white" href="add-coupon.php" title="增加優惠券"><i class="bi bi-person-fill-add"></i></a>
    </div>
    <div class="py-2">
      <form action="">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search.." name="search">
          <button class="btn btn-info text-white" type="submit" id=""><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
    <?php if(!isset($_GET["search"])) : ?>
    <div class="pb-2 d-flex justify-content-end">
      <div class="btn-group">
        <a class="btn btn-info text-white <?php if($order==1) echo "active"?>" href="coupon-list.php?page=<?=$page?>&order=1">id <i class="bi bi-sort-down-alt"></i></a>
        <a class="btn btn-info text-white <?php if($order==2) echo "active"?>" href="coupon-list.php?page=<?=$page?>&order=2">id <i class="bi bi-sort-down"></i></a>
        <a class="btn btn-info text-white <?php if($order==3) echo "active"?>" href="coupon-list.php?page=<?=$page?>&order=3">name <i class="bi bi-sort-down-alt"></i></a>
        <a class="btn btn-info text-white <?php if($order==4) echo "active"?>" href="coupon-list.php?page=<?=$page?>&order=4">name<i class="bi bi-sort-down"></i></a>
      </div>
    </div>
    <?php endif; ?>
    <div>
      <?php
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      // var_dump($rows);
      ?>
    </div>
    <?php if ($couponCount > 0) : ?>
      <table id="example" class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>優惠券名稱</th>
            <th>優惠碼</th>
            <th>可使用人數</th>
            <th>以使用人數</th>
            <th>折扣金額</th>
            <th>可使用時間</th>
            <th>詳細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($rows as $row) : ?>
            <tr>
              <td><?= $row["coupon_id"] ?></td>
              <td><?= $row["coupon_name"] ?></td>
              <td><?= $row["code"] ?></td>
              <td><?= $row["max_count"] ?></td>
              <td><?= $row["used_count"] ?></td>
              <td>
                <?php if(isset($row["discount_pa"])) : ?>
                  <?= $row["discount_pa"] ?>折
                <?php elseif(isset($row["discount_cash"])) : ?>
                  <?= $row["discount_cash"] ?>NTD
                  <?php endif; ?>
              </td>
              <td><?= $row["start"] ?> ~ <?= $row["end"] ?></td>
              <td>
                <a class="btn btn-info text-white" href="coupon.php?id=<?= $row["coupon_id"] ?>" title="詳細資料"><i class="bi bi-info-circle-fill"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
      <?php if(!isset($_GET["search"])): ?>
      <?php endif; ?>
    <?php else : ?>
      目前無優惠券
    <?php endif; ?>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script>
    let users = <?php echo json_encode($rows) ?>;
    // console.log(users);
  </script>
</body>

</html>