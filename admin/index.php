<?php
// Inicia sessões

session_start();

if (!isset($_SESSION['id_Admin'])) {
    header('location: login.php');
    die();
}

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
                <h3><i class="fas fa-user-shield"></i> Admin</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index.php"><i class="fas fa-bars mr-2 text-gray-400"></i> Relatório</a>
                </li>
                <li>
                    <a href="categoria/categoria.php    "><i class="fas fa-bars mr-2 text-gray-400"></i> Categorias</a>
                </li>
                <li>
                    <a href="freelancer/freelancer.php"><i class="fas fa-people-carry mr-2 text-gray-400"></i> Freelancers</a>
                </li>
                <li>
                    <a href="cliente/cliente.php"><i class="fas fa-user-friends mr-2 text-gray-400"></i> Clientes</a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" type="button" id="moduleDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-comments mr-2 text-gray-400"></i> Mensagens
                    </a>
                    <div class="dropdown-menu" aria-labelledby="moduleDropDown">
                        <a class="dropdown-item" href="atendimento/atendimento.php">Clientes</a>
                        <a class="dropdown-item" href="atendimento/atendimentoFreelancer.php">Freelancers</a>
                    </div>
                </li>
                <li>
                    <a href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Relatórios do Sistema</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <a href="relatorio/relatorioCliente.php">
                            <div class="card-body">
                                <h5 class="card-title">Relatório Cliente</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
                        <a href="relatorio/relatorioFreelancer.php">
                            <div class="card-body">
                                <h5 class="card-title">Relatório Freelancer</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">                      
                        <a href="relatorio/relatorioFinanceiro.php">
                            <div class="card-body">
                                <h5 class="card-title">Relatório Financeiro</h5>                            
                            </div>
                        </a>
                    </div>
                </div>
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
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>