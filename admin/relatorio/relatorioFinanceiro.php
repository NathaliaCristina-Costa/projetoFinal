<?php
require_once "../../classe/Pagamento.php";
$pg = new Pagamento();
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <?php include '../menu.php'; ?>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <div class="content-body">

                <div class="row page-titles mx-0">
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Relatorio Financeiro</a></li>
                        </ol>

                    </div>
                </div>
                <!-- row -->

                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="cadastroCategoria.php"><button style="float:right" type="button" class="btn btn-success"><i class="fas fa-file-alt"></i></button></a>
                            <form method="POST" action="">
                                <div class="colunm3">
                                    <div class="espaco-min"></div>
                                    <label>Data Inicial</label><br>
                                    <input type="date" name="inicio" required class="border-1px datetime" value="01/01/1900">
                                    <div class="espaco-min"></div>
                                </div>

                                <div class="colunm3">
                                    <div class="espaco-min"></div>
                                    <label>Data Final</label><br>
                                    <input type="date" name="final" required class="border-1px datetime">
                                    <div class="espaco-min"></div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success mb-2" name="btCadastrar"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table bg-success table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Primeiro Nome</th>
                                        <th>Ultimo Nome</th>
                                        <th>CPF</th>
                                        <th>Plano</th>
                                        <th>Data Compra</th>
                                        <th>Data Final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (!empty([$_POST['inicio']])) {

                                            $dtInicio = addslashes($_POST['inicio']);
                                            $dtFim = addslashes($_POST['final']);

                                            $pg->buscarDados($dtInicio, $dtFim);
                                        }                                        
                                    ?>
                                </tbody>
                            </table>
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
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>