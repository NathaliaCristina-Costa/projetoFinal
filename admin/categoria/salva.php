<?php
require_once "../../classe/Categoria.php";
$cat = new Categoria();
//Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
if (isset($_POST['nome'])) {
    //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
    $nome = addslashes($_POST['nome']);

    if ($cat->cadastrarCategoria($nome) == true) {


        header('location: categoria.php');
        die();
        

    }
    //Preenchimento obrigatório, VERIFICAR SE VARIÁVEIS ESTÃO VAZIAS
    else if (!empty($nome)) {
        if (!$cat->cadastrarCategoria($nome)) {
            echo  "<script>alert('Categoria já Cadastrada! Cadastre Uma nova Categoria');</script>";

        }
        else if($cat->cadastrarCategoria($nome) == '') {
            echo  "Preencha o Campo da Categoria!";
        }
    } 
    
    

    
}
?>