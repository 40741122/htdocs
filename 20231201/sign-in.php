<?php

?>
<!doctype html>
<html lang="en">

<head>
    <title>Sign in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            background: url("/images/cloud.jpg") center center/cover;
        }

        .btn-primary {
            --bs-btn-color: #fff;
            --bs-btn-bg: #43A2FA;
            --bs-btn-border-color: #43A2FA;
            --bs-btn-hover-color: #fff;
            --bs-btn-hover-bg: #4368FA;
            --bs-btn-hover-border-color: #4368FA;
            --bs-btn-focus-shadow-rgb: 49, 132, 253;
            --bs-btn-active-color: #fff;
            --bs-btn-active-bg: #0a58ca;
            --bs-btn-active-border-color: #0a53be;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #fff;
            --bs-btn-disabled-bg: #0d6efd;
            --bs-btn-disabled-border-color: #0d6efd;
        }

        .login-panel {
            /* background: #ccc; */
            width: 260px;

            .logo {
                width: 72px;
            }

            & h1,
            .form-check-label {
                color: #fff;
                text-shadow: 0 0 5px #000;
            }
        }

        .input-area {
            :first-child {
                .form-control {
                    border-bottom: 0;
                    border-bottom-left-radius: 0;
                    border-bottom-right-radius: 0;
                }
            }

            :last-child {
                .form-control {
                    border-top-right-radius: 0;
                    border-top-left-radius: 0;
                }
            }

            .form-floating {
                & label {
                    z-index: 3;
                }
            }

            .form-control {
                background: rgba(255, 255, 255, .8);
            }

            .form-control:focus {
                position: relative;
                z-index: 2;
                /* border: 1px solid #333;
                box-shadow: none; */
                /* border: 1px solid red;
                box-shadow: 0 0 5px red; */
            }
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="login-panel">
            <img class="logo" src="/images/bootstrap-logo.svg" alt="">
            <h1 class="pt-3">Please sign in</h1>
            <form action="doLogin.php" method="post">
                <div class="input-area">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="py-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember me
                        </label>
                    </div>
                </div>
                <div class="d-grid mb-4">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
            © 2017–2023
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>