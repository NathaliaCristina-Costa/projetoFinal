<?php
include_once("classe/Cliente.php");
$cliente = new Cliente();
?>

<!DOCTYPE html>
<html class="cor-fundo" lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Cliente</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="src/img/comentarios.png" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/cadastroCliente.css" rel="stylesheet" />
</head>

<body>

  <div class="container">
    <div class="alert" id="alert" role="alert"></div>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-register-image"><img class="masthead-avatar mb-5 imagem-cliente" src="src/img/imagem-cliente.jpg" alt="" /></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Cadastro</h1>
                <hr>
              </div>
              <?php
              //Se o name existe e o botão cadastrar foi acionado, então as informações vão ser recolhidas
              if (isset($_POST['nome'])) {
                //Função permite bloquear códigos maliciosos que terceiros podem colocar ao registrar informação
                $nome = addslashes($_POST['nome']);
                $telefone = addslashes($_POST['telefone']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);

                if ($cliente->cadastrarCliente($nome, $telefone, $email, $senha) == true) {
                  echo "<script>alert('Conta Registrada com Sucesso!');</script>";
                  header('location: /projetoFinal/cliente/login.php');
                }
                //Preenchimento obrigatório, VERIFICAR SE VARIÁVEIS ESTÃO VAZIAS
                else if (!empty($email)) {
                  if (!$cliente->cadastrarCliente($nome, $telefone, $email, $senha)) {
                    echo  "<script>alert('Email já Cadastrado! Cadastre Um novo Email');</script>";
                  }
                }
              }
              ?>
              <form class="user" method="POST" action="">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-6">
                    <input type="text" class="form-control form-control-user" name="nome" id="nome" placeholder="Nome" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="tel" class="form-control form-control-user" data-mask="(00) 00000-0000" name="telefone" id="telefone" placeholder="Telefone" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-6">
                    <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email" required>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-6">
                    <input type="password" class="form-control form-control-user" name="senha" id="senha" placeholder="Senha" required>
                  </div>
                </div>
                <hr>
                <br>
                <div class="row justify-content-center">
                  <div class="col-sm-6 col-lg-4 mb-3">
                    <input type="submit" value="Registrar" class="btn" id="registrar">
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/freelancer.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/jquery.js"></script>
  <!--script src="js/salvaCliente.js"></script>
  

  <!-- Core plugin JavaScript-->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#telefone").mask("(00) 0000-0000");


    });
  </script>

</body>

</html>