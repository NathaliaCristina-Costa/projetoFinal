<?php
    require_once "../../classe/Freelancer.php";
    $f = new Freelancer();

    require_once "../../classe/Pagamento.php";
    $p = new Pagamento();

        //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
        if (isset($_POST['primeiroNome'])) {
            //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
            $primeiroNome     = addslashes($_POST['primeiroNome']);
            $ultimoNome     = addslashes($_POST['ultimoNome']);
            $cpf            = addslashes($_POST['cpf']);
            $telefone       = addslashes($_POST['telefone']);
            $email          = addslashes($_POST['email']);
            $idFr   = addslashes($_POST['idFreelancer']);


            if ($p->cadastrarPagamento($primeiroNome, $ultimoNome, $cpf, $telefone, $email, $idFr)) {
                echo "<script>alert('Pedido Registrado com Sucesso!');</script>";
            }
        }
?>