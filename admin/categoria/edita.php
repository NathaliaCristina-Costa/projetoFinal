<?php
    require_once "../../classe/Categoria.php";
    $cat = new Categoria();
    
    if (isset($_GET['idEditar'])) {
        $idEditar = addslashes($_GET['idEditar']);
        $res = $cat->buscarDadosCategoria($idEditar);
    }
    //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
    if (isset($_POST['nome'])) {

        if (isset($_GET['idEditar']) && !empty($_GET['idEditar'])) {
            //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
            $idEditar = addslashes($_GET['idEditar']);
            $nome = addslashes($_POST['nome']);

            if ($cat->atualizarDados($idEditar, $nome) == true) {
                header('location: categoria.php');
            }
            //Preenchimento obrigatório, VERIFICAR SE VARIÁVEIS ESTÃO VAZIAS
            else if (!empty($nome)) {
                if (!$cat->atualizarDados($idEditar, $nome)) {
                    echo  "<script>alert('Categoria já Cadastrada! Cadastre Uma nova Categoria');</script>";
                } else if ($cat->atualizarDados($idEditar, $nome) == '') {
                    echo  "Preencha o Campo da Categoria!";
                } else {
                    header('location: /projetoFinal/admin/categoria.php');
                }
            }
        }
    }
    
?>