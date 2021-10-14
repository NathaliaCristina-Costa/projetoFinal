<?php
    require_once "../classe/Cliente.php";
    $cli = new Cliente();

    session_start();

    if (isset($_SESSION['id_Cliente']) && !empty($_SESSION['id_Cliente'])) {
        $exibeNome = $cli->exibeNomeLogado($_SESSION['id_Cliente']);
    }else{
        header('location: login.php');
    }

    
?>
<div class="sidebar-header">
<h4><a  href="index.php">Olá, <?php echo $exibeNome['nomeCliente']?></a></h4>
</div>

<ul class="list-unstyled components">
    <li>
        <a href="conta.php?idConta=<?php echo $_SESSION['id_Cliente']; ?>"><i class="fas fa-edit mr-2 text-gray-400"></i> Minha Conta</a>
    </li>
    <li>
        <a href="pedidosFeitos.php"><i class="fas fa-hand-holding-usd mr-2 text-gray-400"></i> Pedidos que Fiz</a>
    </li>
    <li>
        <a href="pedidos.php"><i class="fas fa-shopping-cart mr-2 text-gray-400"></i> Novo Pedido</a>
    </li>
    <li>
        <a href="atendimentoCliente.php"><i class="fas fa-comments mr-2 text-gray-400"></i> Atendimento ao Cliente</a>
    </li>

    <li>
        <a href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair</a>
    </li>
</ul>