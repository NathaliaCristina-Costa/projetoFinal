<?php
include_once("classe/Freelancer.php");
include_once("classe/Categoria.php");
$freela = new Freelancer();





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
                                        <form method="POST" id="step-form-horizontal" class="step-form-horizontal">
                                            <div>
                                                <h4>Informações Da Conta</h4>
                                                <section>
                                                    <?php
                                                    
                                                    //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                                                    if (isset($_POST['nome'])) {
                                                      //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                                                      $nome = addslashes($_POST['nome']);
                                                      $email = addslashes($_POST['email']);
                                                      $senha = addslashes($_POST['senha']);
                                                      $telefone = addslashes($_POST['telefone']);
                                                      $id_Categoria = addslashes($_POST['idCategoria']);                                                      
                                                      
                                      
                                                      if ($freela->cadastrarFreelancer($nome, $email, $senha, $telefone, $id_Categoria) == true) {
                                                        echo "<script>alert('Conta Registrada com Sucesso!');</script>";
                                                        header('location: /projetoFinal/freelancer/login.php');
                                                      }
                                                      //Preenchimento obrigatório, VERIFICAR SE VARIÁVEIS ESTÃO VAZIAS
                                                      else if (!empty($email)) {
                                                        if (!$freela->cadastrarFreelancer($nome, $email, $senha, $telefone, $id_Categoria)) {
                                                          echo  "<script>alert('Email já Cadastrado! Cadastre Um novo Email');</script>";
                                                        }
                                                      }
                                                    }
                                                    ?>
                                                    
                                                    <form method="POST">
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
                                                            <div class="col-sm-6 mb-3 mb-sm-6">
                                                                <select class="form-control" name="idCategoria">
                                                                    <option value="selecione" selected>Escolha sua Categoria</option>
                                                                    <?php
                                                                    $freela->buscarCategoria();
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </section>

                                                <!--h4>Pagamento</h4>
                                                <section>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <input class="form-control" type="number" name="numCartao" placeholder="Número Cartão">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <input class="form-control" type="month" name="data" placeholder="Data Validade">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <input class="form-control" type="text" name="nomeCartao" placeholder="Nome Impresso no Cartão">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <input class="form-control" type="number" name="codSeguranca" placeholder="CVC">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cardPg">
                                                        <div class="card-footer">
                                                            <h6>Total </h6>
                                                            <hr> R$ 90,00
                                                        </div>
                                                    </div>
                                                </section-->
                                                <input type="submit" class="btn btn-info" value="registrar" />
                                            </div>
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
        


</body>

</html>