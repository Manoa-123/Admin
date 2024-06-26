<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
</head>

<body class="bg-gradient-primary" style="border-color: rgb(139,141,152);background: var(--bs-danger);">
    <div class="container">
        <div class="row justify-content-center" style="background: var(--bs-red);">
            <div class="col-md-9 col-lg-12 col-xl-10" style="margin-left: -32px;">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;assets/img/dogs/Joinsteer_lld_Mercedes_AMG_GLE_63_S_4MATIC+_Coupé_612_ch_0.jpeg&quot;);padding-left: 0px;padding-bottom: 0px;margin-top: 4px;margin-right: -47px;padding-right: 58px;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5" style="padding-left: 2px;margin-left: 79px;">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">ADMIN SUPERCAR</h4>
                                    </div>
                                    <form class="user" action="traitement.php" method="post">
                                    <div class="mb-3"><input class="form-control form-control-user"  id="exampleInputEmail" placeholder="Username" name="username"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="mdp"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit" name="login">Login</button>
                                        <hr>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>