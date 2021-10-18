<?php
    require_once "../classe/Freelancer.php";
    $freela = new Freelancer();

    session_start();

    if (isset($_SESSION['id_Freelancer']) && !empty($_SESSION['id_Freelancer'])) {
        $exibeNome = $freela->exibeNomeLogado($_SESSION['id_Freelancer']);
    }else{
        header('location: login.php');
    }

    
?>
<div class="sidebar-header" style="background-color: black;">
    <h4><a  href="index.php">Olá, <?php echo $exibeNome['nome']?></a></h4>
</div>

<ul class="list-unstyled components">
    <li>
        <a href="conta.php?idConta=<?php echo $_SESSION['id_Freelancer']; ?>"><i class="fas fa-edit mr-2 text-gray-400"></i> Minha Conta</a>
    </li>
    <li>
        <a href="pedidoDisponivel.php"><i class="fas fa-receipt mr-2 text-gray-400"></i> Pedidos Disponíveis</a>
    </li>
    <li>
        <a href="meusPedidos.php"><i class="fas fa-dollar-sign mr-2 text-gray-400"></i> Meus Pedidos</a>
    </li>
    <li>
        <a href="atendimentoFreelancer.php"><i class="fas fa-comments mr-2 text-gray-400"></i> Fale Conosco</a>
    </li>
    <li>
        <a href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair</a>
    </li>
</ul>