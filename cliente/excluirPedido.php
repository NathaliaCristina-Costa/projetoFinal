<?php
   
    require_once "../classe/Pedido.php";
    $p = new Pedido();   


    //EXCLUIR E ATUALIZAR
    if (isset($_GET['id'])) {
        $idExcluir = addslashes($_GET['id']);
        $p->excluirPedido($idExcluir);

        header('location: https://localhost/projetoFinal/cliente/pedidosFeitos.php');
    }
?>