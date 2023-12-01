<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    include("css.php");
    ?>

</head>

<body>
    <div class="container">
        <h1 class="text-center">Sign Up</h1>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="repassword" class="col-sm-2 col-form-label">Re-Type Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="repassword" name="repassword" required>
            </div>
        </div>
        <button class="btn btn-info text-white" id="send">送出</button>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        const send = document.querySelector("#send"),
            email = document.querySelector("#email"),
            name = document.querySelector("#name"),
            password = document.querySelector("#password"),
            repassword = document.querySelector("#repassword")

        send.addEventListener("click", function() {
            // console.log("click");
            let emailValue = email.value;
            let nameValue = name.value;
            let passwordValue = password.value;
            let repasswordValue = repassword.value

            let data = {
                email: emailValue,
                name: nameValue,
                password: passwordValue,
                repassword: repasswordValue
            }

            // console.log(data);
            $.ajax({
                    method: "POST", //or GET
                    url: "/api/sign-up.php",
                    dataType: "json",
                    data: data
                })
                .done(function(response) {
                    // console.log(response);
                    let status=response.status;
                    if(status==0){
                        alert(response.message);
                    }else{
                        alert(response.message);
                    }

                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);
                });

        })
    </script>

</body>

</html>