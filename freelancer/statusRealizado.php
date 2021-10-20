<?php

    require_once "../classe/Pedido.php";
    $p = new Pedido();
    
  

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
            $id = addslashes($_GET['id']);
            $status = addslashes($_POST['status']);
            $idFreelancer = addslashes($_POST['idFreelancer']);

            if ($p->statusPedido($id, $status, $idFreelancer) == true) {

                header("location: http://localhost/projetoFinal/freelancer/meusPedidos.php");
            }
        }
   
?>