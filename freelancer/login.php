<?php
require_once "../classe/Freelancer.php";
$freela = new Freelancer();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/cadastroFreelancer.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-register-image "><img class="masthead-avatar mb-5 imagem-login" src="src/img/login.jpg " alt="" /></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem Vindo!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <div class="col-sm-12 mb-3 mb-sm-6">
                                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 mb-3 mb-sm-6">
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="senha" placeholder="Senha">
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-success btn-user btn-block" value="Login">
                                    </form>
                                    <hr>
                                    <?php
                                    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
                                        $email = addslashes($_POST['email']);
                                        $senha = addslashes($_POST['senha']);
                                        if (!empty($email) && !empty($senha)) {
                                            if ($freela->logar($email, $senha) == true) {
                                                if (isset($_SESSION['id_Freelancer'])) {
                                                    header('location: index.php');
                                                }
                                            } else {
                                                echo "<script>alert('Email e/ou senha estão incorretos!');</script>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>