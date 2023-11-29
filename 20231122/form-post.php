<!doctype html>
<html lang="en">

<head>
  <title>Form Post</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <form action="doPost.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="phones[]">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="phones[]">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="phones[]">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="Female">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="telecom" class="form-label">電信公司</label>
                <select class="form-select" name="telecom" id="">
                    <option value="1">中華電信</option>
                    <option value="2">台灣大哥大</option>
                    <option value="3">遠傳電信</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>