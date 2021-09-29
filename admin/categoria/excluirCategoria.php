<?php
    require_once "../../classe/Categoria.php";
    $cat = new Categoria();
    


    //EXCLUIR E ATUALIZAR
    if (isset($_GET['id'])) {
        $idCateg = addslashes($_GET['id']);
        $cat->excluirCategoria($idCateg);

        header('location: /projetoFinal/admin/categoria/categoria.php');
    }
?>