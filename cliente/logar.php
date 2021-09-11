<?php
    require  "../classe/conexao.php";
    require "../classe/Login.php";

    $u = new Login();
    
    if (isset($_POST['email'])&&!empty($_POST['email'])&&isset($_POST['senha'])&&!empty($_POST['senha'])) {
        $login = addslashes($_POST['email']);
        $login = addslashes($_POST['senha']);

    }else{
        header("Location: login.php");
    }

?>