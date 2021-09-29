<?php
require_once "../classe/Atendimento.php";
$at = new Atendimento();
session_start();
    if (!isset($_SESSION['id_Cliente']) && !empty($_SESSION['id_Cliente'])) {
        header('location: login.php');
      
    }
    if(isset($_GET['sair'])){
        unset($_SESSION['id_Cliente']);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Cliente</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-user-shield"></i><a href="index.php"><?php echo $_SESSION['id_Cliente'];?></a></h3>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href=""><i class="fas fa-edit mr-2 text-gray-400"></i> Editar Minha Conta</a>
                </li>
                <li>
                    <a href="index.php"><i class="fas fa-hand-holding-usd mr-2 text-gray-400"></i> Pedidos que Fiz</a>
                </li>
                <li>
                    <a href="pedidos.php"><i class="fas fa-shopping-cart mr-2 text-gray-400"></i> Novo Pedido</a>
                </li>
                <li>
                    <a href="atendimentoCliente.php"><i class="fas fa-comments mr-2 text-gray-400"></i> Atendimento ao Cliente</a>
                </li>

                <li>
                    <a href="../login.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="content-body">

                <div class="row page-titles mx-0">
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="container-fluid">
                    <div class="row">
                        <?php
                        ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fa fa-envelope" aria-hidden="true"></i> Fale Conosco</h4>
                                    <br>
                                    <div class="basic-form">
                                        <?php

                                        //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                                        if (isset($_POST['nome'])) {
                                            //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                                            $nome = addslashes($_POST['nome']);
                                            $email = addslashes($_POST['email']);
                                            $assunto = addslashes($_POST['assunto']);
                                            $mensagem = addslashes($_POST['mensagem']);
                                            $id_Cliente = addslashes($_POST['id_Cliente']);


                                            if ($at->cadastrarAtendimento($nome,$email, $assunto, $mensagem,$id_Cliente) == true) {
                                                echo "<script>alert('Pedido Registrado com Sucesso!');</script>";
                                            }
                                        }
                                        ?>
                                        <form method="POST">
                                            
                                            <div class="mb-3">
                                                <label for="nome" class="form-label">Nome</label>
                                                <input type="text" class="form-control" id="nome" placeholder="Nome">
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="nome@examplo.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="assunto" class="form-label">Assunto</label>
                                                <input type="text" class="form-control" name="assunto" id="assunto" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="mensagem" class="form-label">Mensagem</label>
                                                <textarea class="form-control" name="mensagem" id="mensagem" rows="3"></textarea>
                                            </div>
                                            <input type="hidden" name="id_Cliente">
                                            <input type="submit" value="Enviar" class="btn btn-warning">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- #/ container -->
            </div>
        </div>
    </div>
    <footer class="bg-dark text-center text-white">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #000">
            © Projeto Final

        </div>
        <!-- Copyright -->
    </footer>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>


    <script type="text/javascript">

    </script>
</body>

</html>