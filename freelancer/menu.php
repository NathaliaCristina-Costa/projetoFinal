<?php
require_once "../classe/Freelancer.php";
$freela = new Freelancer();

session_start();

if (isset($_SESSION['id_Freelancer']) && !empty($_SESSION['id_Freelancer'])) {
    $exibeNome = $freela->exibeNomeLogado($_SESSION['id_Freelancer']);
} else {
    header('location: login.php');
}

require_once "../classe/Pagamento.php";
$pg = new Pagamento();

?>
<div class="sidebar-header" style="background-color: black;">
    <h4><a href="index.php">Olá, <?php echo $exibeNome['nome'] ?></a></h4>
</div>

<ul class="list-unstyled components">
    <li class="dropdown">
        <a class="dropdown-toggle" type="button" id="moduleDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-edit mr-2 text-gray-400"></i> Minha Conta
        </a>
        <div class="dropdown-menu" aria-labelledby="moduleDropDown">
            <a href="conta.php?idConta=<?php echo $_SESSION['id_Freelancer']; ?>"> Meu Perfil</a>
            <a href="minhaCategoria.php?idCat=<?php echo $_SESSION['id_Freelancer']; ?>"> Minha Categoria</a>
        </div>
    </li>
    <li>
        <a href="atendimentoFreelancer.php"><i class="fas fa-comments mr-2 text-gray-400"></i> Fale Conosco</a>
    </li>

    
    <?php
    $pg->restricaoAcesso($_SESSION['id_Freelancer']);
    ?>

    <li>
        <a href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair</a>
    </li>
</ul>