<?php
require_once "../../classe/Categoria.php";
$cat = new Categoria();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Administrador</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-user-shield"></i><a href="../index.php"> Admin</a></h3>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="categoria.php"><i class="fas fa-bars mr-2 text-gray-400"></i> Categorias</a>
                </li>
                <!--li>
                    <a href="servico.php"><i class="fas fa-bars mr-2 text-gray-400"></i> Serviços</a>
                </li-->
                <li>
                    <a href="../freelancer.php"><i class="fas fa-people-carry mr-2 text-gray-400"></i> Freelancers</a>
                </li>
                <li>
                    <a href="../cliente/cliente.php"><i class="fas fa-user-friends mr-2 text-gray-400"></i> Clientes</a>
                </li>
                <li>
                    <a href="../atendimento.php"><i class="fas fa-comments mr-2 text-gray-400"></i> Mensagens do Atendimento</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" type="button" id="moduleDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars mr-2 text-gray-400"></i>Pedidos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="moduleDropDown">
                        <a class="dropdown-item" href="pedido/registroPedido.php">Registrados</a>
                        <a class="dropdown-item" href="pedido/andamentoPedido.php">Andamento</a>
                        <a class="dropdown-item" href="pedido/concluidoPedido.php">Conluídos</a>
                    </div>
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
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active"><a href="categoria.php">Categoria</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <div class="container-fluid">
                    <div class="row">
                        <?php
                        if (isset($_GET['idEditar'])) {
                            $idEditar = addslashes($_GET['idEditar']);
                            $res = $cat->buscarDadosCategoria($idEditar);
                        }
                        ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Categoria</h4>
                                    <p class="text-muted"><small>Edite a Categoria</small></p>
                                    <div class="basic-form">
                                        <?php
                                        //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                                        if (isset($_POST['nome'])) {

                                            if (isset($_GET['idEditar']) && !empty($_GET['idEditar'])) {
                                                //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                                                $idEditar = addslashes($_GET['idEditar']);
                                                $nome = addslashes($_POST['nome']);

                                                if ($cat->atualizarDados($idEditar, $nome) == true) {
                                                    header('location: /projetoFinal/admin/index.php');
                                                }
                                                //Preenchimento obrigatório, VERIFICAR SE VARIÁVEIS ESTÃO VAZIAS
                                                else if (!empty($nome)) {
                                                    if (!$cat->atualizarDados($idEditar, $nome)) {
                                                        echo  "<script>alert('Categoria já Cadastrada! Cadastre Uma nova Categoria');</script>";
                                                    } else if ($cat->atualizarDados($idEditar, $nome) == '') {
                                                        echo  "Preencha o Campo da Categoria!";
                                                    } else {
                                                        header('location: /projetoFinal/admin/categoria.php');
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                        <form class="form-inline" method="POST" action="">
                                            <div class="form-group mx-sm-2 mb-2">
                                                <input type="text" class="form-control" placeholder="Digite a Categoria" name="nome" value="<?php if (isset($res)) {
                                                                                                                                                echo $res['nomeCategoria'];
                                                                                                                                            } ?>">
                                            </div>
                                            <button type="submit" class="btn btn-warning mb-2" name="btEditar">Editar</button>
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