<?php 
session_start();

if(!isset($_SESSION["user"])){
  header("location: sign-in.php");
  exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --menu-width: 240px;
            --page-space-top: 72px;
        }

        .logo {
            color: #fff;
            text-decoration: none;
            background: #000;
            width: var(--menu-width);

            &:hover {
                color: #ddd;
            }
        }

        .main-aside {
            width: var(--menu-width);
            height: 100vh;
            padding-top: var(--page-space-top);
            top:0;
            overflow: auto;
        
            & a {
                display: block;
                text-decoration: none;
            }
        }

        .main-content {
            margin-left: var(--menu-width);
            margin-top: var(--page-space-top);


        }
    </style>
</head>

<body>
    <header class="main-header text-bg-dark shadow fixed-top">
        <div class="d-flex justify-content-between align-items-center">
            <a href="" class="logo p-3">Company Name</a>
            <div class="px-3">
                Hi, <?=$_SESSION["user"]["name"]?>
                <a href="sign-out.php" class="btn btn-dark"><i class="bi bi-box-arrow-right me-2"></i>Sign Out</a>
            </div>

        </div>

    </header>
    <aside class="main-aside position-fixed bg-light border-end">
        <nav>
            <ul class="list-unstyled">
                <li><a class="px-3 py-2" href=""><i class="bi bi-house-fill me-2"></i>Dashboard</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-file-earmark me-2"></i>Orders</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-cart3 me-2"></i>Products</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-people me-2"></i>Customers</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-graph-up me-2"></i>Reports</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-puzzle me-2"></i>Intergrations</a></li>
            </ul>
        </nav>
        <div class="mt-3 px-3 d-flex justify-content-between align-items-center">
            <small>
                SAVED REPORTS
            </small>
            <a role="button">
                <i class="bi bi-plus-circle"></i>
            </a>
        </div>
        <nav>
            <ul class="list-unstyled">
                <li><a class="px-3 py-2" href=""><i class="bi bi-file-earmark-text me-2"></i>Current Month</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-file-earmark-text me-2"></i>Last Quater</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-file-earmark-text me-2"></i>Social Engagement</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-file-earmark-text me-2"></i>Year-end-Sale</a></li>
            </ul>
        </nav>
        <hr>
        <nav>
            <ul class="list-unstyled">
                <li><a class="px-3 py-2" href=""><i class="bi bi-gear-wide-connected me-2"></i>Setting</a></li>
                <li><a class="px-3 py-2" href=""><i class="bi bi-box-arrow-right me-2"></i>Sign Out</a></li>
            </ul>
        </nav>
    </aside>
    <main class="main-content px-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Dashboard</h1>
            <div>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-outline-secondary">Export</button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-calendar3 me-2"></i>This Week
                    </button>
                  </div>
            </div>
        </div>
        <div class="chart"></div>
        <h2>Section Title</h2>
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                  <td>placeholder</td>
                  <td>text</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>placeholder</td>
                  <td>irrelevant</td>
                  <td>visual</td>
                  <td>layout</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>data</td>
                  <td>rich</td>
                  <td>dashboard</td>
                  <td>tabular</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>information</td>
                  <td>placeholder</td>
                  <td>illustrative</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>text</td>
                  <td>random</td>
                  <td>layout</td>
                  <td>dashboard</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>dashboard</td>
                  <td>irrelevant</td>
                  <td>text</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>dashboard</td>
                  <td>illustrative</td>
                  <td>rich</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>placeholder</td>
                  <td>tabular</td>
                  <td>information</td>
                  <td>irrelevant</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>random</td>
                  <td>data</td>
                  <td>placeholder</td>
                  <td>text</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>placeholder</td>
                  <td>irrelevant</td>
                  <td>visual</td>
                  <td>layout</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>data</td>
                  <td>rich</td>
                  <td>dashboard</td>
                  <td>tabular</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>information</td>
                  <td>placeholder</td>
                  <td>illustrative</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>text</td>
                  <td>placeholder</td>
                  <td>layout</td>
                  <td>dashboard</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>dashboard</td>
                  <td>irrelevant</td>
                  <td>text</td>
                  <td>visual</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>dashboard</td>
                  <td>illustrative</td>
                  <td>rich</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>random</td>
                  <td>tabular</td>
                  <td>information</td>
                  <td>text</td>
                </tr>
              </tbody>
            </table>
          </div>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>

</html>