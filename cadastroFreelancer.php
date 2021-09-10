<?php
include_once("classe/Freelancer.php");
include_once("classe/Categoria.php");
$freela = new Freelancer("projetofinal", "localhost", "root", "");
$cat = new Categoria("projetofinal", "localhost", "root", "");


$cat->buscarDados();


?>
<!DOCTYPE html>
<html class="cor-fundo" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Freelancer</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/comentarios.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/jquery.steps.css" rel="stylesheet">
    <link href="css/cadastro.css" rel="stylesheet" />

</head>

<body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"><img class="masthead-avatar mb-5 imagem-freelancer" src="src/img/freelancer.jpg" alt="" />
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4  mb-4">Cadastro!</h1>
                                <hr>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method='POST' action="">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" data-mask="(00) 00000-0000" class="form-control" placeholder="Telefone" id="telefone" name="telefone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 mb-3 mb-sm-6">
                                                    <select class="form-select form-select-md mb-3" aria-label=".form-select-md example" name='categoria'>
                                                        <option>Escolha Categoria</option>

                                                        <?php while ($prod = $freela) { ?>
                                                            <option value="<?php echo $prod['id_Categoria'] ?>"><?php echo $prod['nomeCategoria'] ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <input type="submit" value="Registrar" class="btn btn-info" id="registrar">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Bootstrap core JavaScript
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     Core plugin JavaScript
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    Custom scripts for all pages-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/freelancer.js"></script>


</body>

</html>