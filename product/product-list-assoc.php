<?php
    require_once("../db_connect.php");

    $sqlCategory="SELECT * FROM product_category";
    $resultCategory=$conn->query($sqlCategory);
    $rowsCategory=$resultCategory->fetch_all(MYSQLI_ASSOC);
    $categories=[];
    foreach($rowsCategory as $category){
        $categories[$category["id"]]=$category["name"];
    }

    if(isset($_GET["price-min"]) && isset($_GET["price-max"])){
        $min=$_GET["price-min"];
        $max=$_GET["price-max"];
        $sql= "SELECT product.* FROM product WHERE product.price > $min AND product.price < $max ORDER BY product.id ASC";
    }else{
        $sql= "SELECT product.* FROM product ORDER BY product.id ASC";
    }

    $result=$conn->query($sql);
    $productCount=$result->num_rows;
    $rows=$result->fetch_all(MYSQLI_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
  <title>Product List</title>
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
            <form action="">
                <div class="row g-3 align-items-center">
                    <?php if(isset($_GET["price-min"])) : ?>
                    <div class="col-auto">
                        <a class="btn btn-info text-white" href="product-list.php">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="col-auto">
                        <label for="" class="col-form-label">價錢</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control text-end price-input" name="price-min" value="<?php $priceMin=isset($_GET["price-min"])? $min:0;
                        echo $priceMin;?>">
                    </div>
                    <div class="col-auto">
                        ~
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control text-end price-input" name="price-max" value="<?php $priceMax=isset($_GET["price-max"])? $max:99999;
                        echo $priceMax;?>">                    
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info text-white" type="submit">Go</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="py-2">
            共<?=$productCount?>筆
        </div>
        <div class="row g-3 product-list">
            <?php foreach($rows as $row) :?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <div class="ratio ratio-4x3">
                        <img class="objcet-fit-cover card-img-top" src="../images/<?=$row["img"]?>" alt="<?=$row["name"]?>">
                    </div>
                    <div class="card-body">
                        <div class=""><?=$categories[$row["category_id"]]?></div>
                        <h3 class="card-title"><?=$row["name"]?></h3>
                        <div class="text-end text-danger fs-4">
                            <?=$row["price"]?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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