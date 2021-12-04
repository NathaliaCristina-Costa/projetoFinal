<?php
require_once "../../classe/Produto.php";
$p = new Produto();

require_once "../../classe/Freelancer.php";
$f = new Freelancer();

require_once "../../classe/Pagamento.php";
$pg = new Pagamento();

session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>formulario de chekout</title>
</head>

<body>



    <div class="container">
        <div class="py-5 text-center">

            <h2>Formulário de Pagamento</h2>

        </div>

        <hr>

        <div class="row mb-5">
            <div class="col-md-12">
                <h4 class="mb-3">Informações Pessoais</h4>
                <?php
                    //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
                    if (isset($_POST['primeiroNome'])) {
                    //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                    $primeiroNome   = addslashes($_POST['primeiroNome']);
                    $ultimoNome     = addslashes($_POST['ultimoNome']);
                    $cpf            = addslashes($_POST['cpf']);
                    $telefone       = addslashes($_POST['telefone']);
                    $email          = addslashes($_POST['email']);
                    $idProduto      = addslashes($_POST['idProduto']);
                    $idFr           = addslashes($_POST['idFreelancer']);

                    if ($pg->cadastrarPagamento($primeiroNome, $ultimoNome, $cpf, $telefone, $email, $idProduto, $idFr)) {
                        header("location: https://localhost/projetoFinal/freelancer/meuPlano.php");
                    }
                }
                ?>
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">Primeiro Nome</label>
                            <input type="text" name="primeiroNome" id="primeiroNome " class="form-control" placeholder="Primeiro nome" autofocus>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="last_name">Último Nome</label>
                            <input type="text" name="ultimoNome" id="ultimoNome" class="form-control" placeholder="Último nome">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Somente número do CPF" maxlength="14" oninput="maskCPF(this)">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite o seu melhor e-mail" 2>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone com o DDD" maxlength="14" oninput="maskPhone(this)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <?php
                            $p->comprarProduto();
                            ?>
                        </div>
                    </div>
                    <input type="hidden" name="idFreelancer" value="<?php echo $_SESSION['id_Freelancer']; ?>">
                    <input type="submit" value="Comprar" class="btn btn-success">
                </form>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>



</body>

</html>