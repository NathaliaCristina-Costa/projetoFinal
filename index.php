<?php


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Freelancer</title>
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
  <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg  text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Freelancer</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-danger text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link rounded js-scroll-trigger" id="cor-link" href="#portfolio"><small>Categorias</small></a></li>
          <li class="nav-item"><a class="nav-link rounded js-scroll-trigger" href="#about"><small>Quem somos</small></a></li>
          <li class="nav-item"><a class="nav-link rounded js-scroll-trigger" href="#cadastro"><small>Cadastro</small></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <small>Login</small>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../projetoFinal/freelancer/login.php"><small><i class="fas fa-people-carry"></i>  Freelancer</small></a>
              <a class="dropdown-item" href="../projetoFinal/cliente/login.php"><small><i class="fas fa-user-friends"></i>  Cliente</small></a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead  text-white text-center" style="background-color: #000c;">
    <div class="container d-flex align-items-center flex-column">
      <!-- Masthead Avatar Image-->
      <img class="masthead-avatar mb-5" src="src/img/freelancer.jpg" alt="" />
      <!-- Masthead Heading-->
      <h1 class="masthead-heading text-uppercase mb-0">Seja seu Próprio Chefe</h1>
      <!-- Icon Divider-->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Masthead Subheading-->
      <p class="masthead-subheading font-weight-light mb-0">Seja um Freelancer</p>
    </div>
  </header>
  <!-- Portfolio Section-->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">
      <!-- Portfolio Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Categorias</h2>
      <br>
      <p class="text-center">Confira as Categorias e os serviços disponiveis</p>
      <!-- Icon Divider-->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-clipboard-list"></i></div>
        <div class="divider-custom-line"></div>

      </div>


      <!-- Portfolio Grid Items-->
      <div class="row justify-content-center">
        <!-- Portfolio Item 1-->
        <div class="col-md-6 col-lg-4 mb-5 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">
          <div class="portfolio-item mx-auto">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-glass-cheers"></i>
                Eventos
              </div>
            </div>
            <img class="img-fluid" src="src/img/eventos.jpg" alt="" />
          </div>
        </div>
        <!-- Portfolio Item 2-->
        <div class="col-md-6 col-lg-4 mb-5 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">
          <div class="portfolio-item mx-auto">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white"><i class="fa fa-hammer" aria-hidden="true"></i>
                Reparos & Reformas
              </div>
            </div>
            <img class="img-fluid " src="src/img/reforma.jpg" alt="" />
          </div>
        </div>
        <!-- Portfolio Item 3-->
        <div class="col-md-6 col-lg-4 mb-5 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">
          <div class="portfolio-item mx-auto">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white"><i class="fa fa-heartbeat" aria-hidden="true"></i>
                Saúde
              </div>
            </div>
            <img class="img-fluid" src="src/img/saude.jpg" alt="" />
          </div>
        </div>
        <!-- Portfolio Item 4-->
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white"><i class="fa fa-home"></i>
                Serviços Domésticos
              </div>
            </div>
            <img class="img-fluid" src="src/img/domestico.jpg" alt="" />
          </div>
        </div>
        <!-- Portfolio Item 5-->
        <div class="col-md-6 col-lg-4 mb-5 mb-md-0 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">
          <div class="portfolio-item mx-auto">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white"><i class="fa fa-laptop" aria-hidden="true"></i> Tecnologia & Design
              </div>
            </div>
            <img class="img-fluid" src="src/img/tecnologia.jpeg" alt="" />
          </div>
        </div>
        <!-- Portfolio Item 6-->
        <div class="col-md-6 col-lg-4 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">
          <div class="portfolio-item mx-auto">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-tools"></i>
                Assistência & Técnica

              </div>
            </div>
            <img class="img-fluid" src="src/img/assistencia-tecnica-computadores.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>








  </section>
  <!-- About Section-->
  <section class="page-section" id="about">
    <div class="container">
      <!-- Contact Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><small>Quem somos</small></h2>

      <!-- Icon Divider-->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Contact Section Form-->
      <div class="row">
        <p class="fs-1 text-center" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">Criada e desenvolvida por quatro estudantes de analise e
          desenvolvimento de
          sistemas, que
          em meio uma pandemia que dura a um pouco mais de 1 ano e meio, surgiu-se a idéia de criar uma pequena startup
          para que o indice de desemprego que chega no momento a 14,7% diminuisse, gerando renda para algumas familias.
        </p>


      </div>
    </div>
  </section>
  <!-- Contact Section-->
  <section class="page-section cadastro" id="cadastro">
    <div class="container">
      <!-- Portfolio Section Heading-->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Cadastros</h2>
      <!-- Icon Divider-->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-clipboard-list"></i></div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Portfolio Grid Items-->
      <div class="row justify-content-center">
        <!-- Portfolio Item 1-->
        <a class="col-md-6 col-lg-4 mb-5 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="cadastroFreelancer.php">
          <div class="cadastro-item mx-auto">
            <div class="cadastro-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="cadastro-item-caption-content text-center text-white"><i class="fas fa-user-plus"></i>
                <p>Seja Freelancer</p>
              </div>
            </div>
            <img class="img-fluid" src="src/img/freelancer-cadastro.jpg" alt="" />
          </div>
        </a>
        <!-- Portfolio Item 2-->
        <a class="col-md-6 col-lg-4 mb-5 nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="cadastroCliente.php"">
          <div class=" cadastro-item mx-auto">
          <div class="cadastro-item-caption d-flex align-items-center justify-content-center h-100 w-100">
            <div class="cadastro-item-caption-content text-center text-white"><i class="fas fa-user-plus"></i>
              <p>Seja Cliente</p>
            </div>
          </div>
          <img class="img-fluid " src="src/img/cliente.jpg" alt="" />
      </div>
      </a>
  </section>
  <!-- Footer-->


  <!-- Copyright Section-->
  <div class="copyright py-4 text-center text-white" style="background-color: #000c;">
    <div class="container"><small>
        <p>Projeto Final</p>
        <p>2021</p> <i class="fab fa-gratipay"></i>
      </small></div>
  </div>





  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


  <script src="js/scripts.js"></script>

</body>

</html>