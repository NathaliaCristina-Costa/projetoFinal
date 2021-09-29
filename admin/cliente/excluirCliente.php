<?php
    require_once "../../classe/Cliente.php";
    $cat = new Cliente("projetofinal", "localhost", "root", "");


    //EXCLUIR E ATUALIZAR
    if (isset($_GET['id'])) {
        $idCliente = addslashes($_GET['id']);
        $cat->excluirCliente($idCliente);

        header('location: /projetoFinal/admin/cliente.php');
    }
?>