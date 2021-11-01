<?php
    require_once "../../classe/Freelancer.php";
    $freela = new Freelancer();


    //EXCLUIR E ATUALIZAR
    if (isset($_GET['id'])) {
        $idFreelancer = addslashes($_GET['id']);
        $freela->excluirFreelancer($idFreelancer);

        header('location: /projetoFinal/admin/freelancer/freelancer.php');
    }
?>