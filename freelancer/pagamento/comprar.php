<?php
    require_once "../../classe/Freelancer.php";
    $f = new Freelancer();

    require_once "../../classe/Pagamento.php";
    $pg = new Pagamento();

    require_once "../../classe/Produto.php";
    $p = new Produto();

    session_start();

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
                echo "<div class='card text-center'>
                        <div class='card-header'>
                            Featured
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>Special title treatment</h5>
                            <p class='card-text'>With supporting text below as a natural lead-in to additional content.</p>
                            <a href='#' class='btn btn-primary'>Go somewhere</a>
                        </div>
                        <div class='card-footer text-muted'>
                            2 days ago
                        </div>
                    </div>";
            }
        }
?>