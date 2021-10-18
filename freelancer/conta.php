<?php
require_once "../classe/Freelancer.php";
$freela = new Freelancer();


?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Freelancer</title>

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
        <nav id="sidebar" style="background-color: black;">
            <?php include 'menu.php'; ?>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <?php
            if (isset($_GET['idConta'])) {
                $idConta = addslashes($_GET['idConta']);
                $res = $freela->buscarDadosFreelancer($idConta);
            }
            ?>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Minha Conta</h1>
            </div>


            <div class="container-fluid">
                <div class="row">
                    <?php
                    ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="basic-form">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">Nome</label>
                                                    <input type="text" name="nome" class="form-control" placeholder="Nome" disabled value="<?php if (isset($res)) {
                                                                                                                                                echo $res['nome'];
                                                                                                                                            } ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">E-mail</label>
                                                    <input type="email" name="email" class="form-control" placeholder="Email" disabled value="<?php if (isset($res)) {
                                                                                                                                                    echo $res['email'];
                                                                                                                                                } ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">Telefone </label>
                                                    <input type="text" data-mask="(00) 00000-0000" class="form-control" placeholder="Telefone" id="telefone" name="telefone" disabled value="<?php if (isset($res)) {
                                                                                                                                                                                                    echo $res['telefone'];
                                                                                                                                                                                                } ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">CEP </label>
                                                    <input type="text" class="form-control" data-mask='00000-000' form-control-user" name="cep" id="cep" placeholder="CEP" disabled value="<?php if (isset($res)) {
                                                                                                                                                                                                echo $res['cep'];
                                                                                                                                                                                            } ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">Rua </label>
                                                    <input type="text" class="form-control form-control-user" name="rua" id="rua" placeholder="Rua" disabled value="<?php if (isset($res)) {
                                                                                                                                                                        echo $res['cep'];
                                                                                                                                                                    } ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">Bairro </label>
                                                    <input type="text" class="form-control form-control-user" name="bairro" id="bairro" placeholder="Bairro" disabled value="<?php if (isset($res)) {
                                                                                                                                                                                    echo $res['bairro'];
                                                                                                                                                                                } ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">Cidade </label>
                                                    <input type="text" class="form-control form-control-user" name="cidade" id="cidade" placeholder="Cidade" disabled value="<?php if (isset($res)) {
                                                                                                                                                                                    echo $res['cidade'];
                                                                                                                                                                                } ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="assunto" class="form-label">Estado </label>
                                                    <input type="text" class="form-control form-control-user" name="estado" id="uf" placeholder="UF" disabled value="<?php if (isset($res)) {
                                                                                                                                                                            echo $res['uf'];
                                                                                                                                                                        } ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <label for="assunto" class="form-label">Categoria </label>
                                                <input type="text" class="form-control form-control-user" name="categoria" id="categoria" placeholder="categoria" disabled value="<?php if (isset($res)) {
                                                                                                                                                                            echo $res['nomeCategoria'];
                                                                                                                                                                        } ?>">
                                            </div>
                                        </div>
                                        <a href="editarConta.php?idEditar=<?php echo $_SESSION['id_Freelancer']; ?>" type="submit" class="btn btn-dark" name="btEditar">Editar</a>
                                    </form>
                                </div>
                            </div>
                        </div>
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



</body>

</html>