<?php
require_once "../classe/Pedido.php";
$p = new Pedido();
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
                <h3><i class="fas fa-user-shield"></i><a href="index.php"> <?php echo $_SESSION['id_Cliente'];?></a></h3>
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
                    <a href="login.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair</a>
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
                                    <h4 class="card-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Faça Seu Pedido</h4>
                                    <br>
                                    <div class="basic-form">
                                        <?php

                                        //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                                        if (isset($_POST['cep'])) {
                                            //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                                       
                                            $cep = addslashes($_POST['cep']);
                                            $rua = addslashes($_POST['rua']);
                                            $bairro = addslashes($_POST['bairro']);
                                            $cidade = addslashes($_POST['cidade']);
                                            $estado = addslashes($_POST['estado']);
                                            $telefone = addslashes($_POST['telefone']);
                                            $mensagem = addslashes($_POST['mensagem']);
                                            $id_Categoria = addslashes($_POST['categoria']);


                                            if ($p->cadastrarPedido( $cep, $rua, $bairro,$cidade, $estado, $telefone,$mensagem, $id_Categoria) == true) {
                                                echo "<script>alert('Pedido Registrado com Sucesso!');</script>";
                                               
                                            }
                                        }
                                        ?>
                                        <form method=POST>
                                            <input type="hidden" name="idCliente">
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control form-control-user" name="cep" id="cep" placeholder="CEP" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control form-control-user" name="rua" id="rua" placeholder="Rua" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control form-control-user" name="bairro" id="bairro" placeholder="Bairro" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control form-control-user" name="cidade" id="cidade" placeholder="Cidade" required>
                                                </div>
                                                <div class="col-sm-1">
                                                    <input type="text" class="form-control form-control-user" name="estado" id="uf" placeholder="UF" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="tel" class="form-control form-control-user" data-mask="(00) 00000-0000" name="telefone" id="telefone" placeholder="Telefone" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="categoria">
                                                        <option value="selecione" selected>Categoria do Pedido</option>
                                                        <?php $p->buscarCategoria(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="mensagem" class="form-label">Derscrição do Pedido:</label>
                                                    <textarea class="form-control" name="mensagem" id="mensagem" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <input type="submit" value="Finalizar" class="btn btn-warning">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
</body>

</html>