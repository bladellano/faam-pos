<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <?php if (isset($title)) : ?>
    <title><?= SITE['name'] ?> | <?= $title ?></title>
  <?php endif; ?>

  <!-- Dinamic head -->
  <?php if (isset($head)) : ?>
    <?= $head ?>
  <?php endif; ?>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= SITE['root'] . "/views/assets" ?>/images/favicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

  <!-- Template Main CSS File -->
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/css/style.css" rel="stylesheet">

  <link href="<?= SITE['root'] . "/views/assets" ?>/css/message.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets" ?>/css/load.css" rel="stylesheet">

  <link href="<?= SITE['root'] . "/views/assets" ?>/css/style.css?v=1" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets" ?>/css/style-mobile.css?v=1" rel="stylesheet">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

  <!--AJAX LOAD-->
  <div class="ajax_load">
    <div class="ajax_load_box">
      <div class="ajax_load_box_circle"></div>
      <div class="ajax_load_box_title">Aguarde, carregando!</div>
    </div>
  </div>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">seacpos@faam.com.br</a>
          <i class="bi bi-phone-fill phone-icon"></i>
          <a href="https://api.whatsapp.com/send?phone=5591991436058" target="_blank"> (91) 9 9143-6058</a>
      </div>
      <div class="social-links d-none d-md-block">
        <a href="https://posfaam.paineldoaluno.com.br/" target="_blank" class="twitter"><i class="bi bi-person-circle"></i> Aluno On-line</a>
        <a href="https://posfaam.paineldoaluno.com.br/professor_login" target="_blank" class="twitter"><i class="bi bi-person-circle"></i> Professor On-line</a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="<?= SITE['root'] ?>">
          <img src="<?= asset('images/logo-faam-pos.png') ?>" alt="">
        </a>
      </h1>

      <h1 class="logo me-auto"><a href="index.html">
          <link rel="icon" type="image/x-icon" href="<?= asset("images/favicon.png"); ?>">
        </a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>/#cta">Escola de Extens??o</a></li>
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>/cursos">Pos-Gradua????o</a></li>

          <li class="dropdown"><a href="#"><span style="text-align:center">Como Ingressar</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>/como-ingressar">Como Ingressar</a></li>
            <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>/como-voce-vai-estudar">Como voc?? vai estudar</a></li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span style="text-align:center">Vantagens e Benef??cios</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= SITE['root'] . DS ?>convenios">Conv??nios</a></li>
              <li><a href="<?= SITE['root'] . DS ?>descontos">Descontos</a></li>
            </ul>
          </li>

            <li><a class="nav-link scrollto showMenuMobile" href="https://posfaam.paineldoaluno.com.br/" target="_blank"><i class="bi bi-person-circle"></i> Aluno On-line</a></li>

            <li><a class="nav-link scrollto showMenuMobile" href="https://posfaam.paineldoaluno.com.br/professor_login" target="_blank"><i class="bi bi-person-circle"></i> Professor On-line</a></li>

          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>#contact">Contato</a></li>

          <li><a class="getstarted" href="https://matricula.ischolar.app/?posfaam">INSCREVA-SE</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <?= $v->section("content"); ?>

  <?= include('whatsapp.php') ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="http://portal.faam.com.br/" target="_blank">
          <img src="<?= SITE['root'] . "/views/assets/" ?>images/logo-pb.png" alt="Logo" class="img-fluid">
          </a>
          <ul>
            <li> <a target="_blank" href="http://portal.faam.com.br"> A Faculdade</a></li>
            <li> <a href="<?= SITE['root'] . "/convenios" ?>"> Seja nosso Parceiro</a></li>
            <li> <a target="_blank" href="http://portal.faam.com.br/trabalhe-conosco"> Trabalhe Conosco</a></li>
            <li> <a target="_blank" href="http://portal.faam.com.br/assessoria-de-imprensa"> Assessoria de imprensa</a></li>
          </ul>
          <br>
          <ul class="socials--footer">

            <li><a href="https://www.facebook.com/faculdadedaamazonia" target="_blank"><i data-width="133" class="bx bxl-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/faamoficial/" target="_blank"><i data-width="133" class="bx bxl-instagram"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCMgSVAJpxjBDh5ttG2bhU0Q" target="_blank"><i data-width="133" class="bx bxl-youtube"></i></a></li>
            <li><a href="https://www.linkedin.com/school/faam---faculdade-da-amaz%C3%B4nia/" target="_blank"><i data-width="133" class="bx bxl-linkedin"></i></a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h4>Institucional/Ensino</h4>
          <ul>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Quem Somos</a></li>
            <li> <a href="<?= SITE['root'] ?>/modalidade-de-ensino"> Modalidade de Ensino</a></li>
            <li> <a href="<?= SITE['root'] ?>/cursos"> Cursos de P??s-gradua????o</a></li>
            <li> <a target="_blank" href="https://pos.faam.com.br/storage/attachments/site/2022/05/debb665027b7929fe6651870386c5557.pdf"> Manual do Professor</a></li>
            <li> <a target="_blank" href="https://pos.faam.com.br/storage/attachments/site/2022/05/691ae56ac6916c09692a21874f49bbc4.pdf"> Manual do Aluno</a></li>
            <li> <a href="<?= SITE['root'] ?>/formas-de-ingresso"> Formas de Ingresso</a></li>
            <li> <a target="_blank" href="https://pos.faam.com.br/storage/attachments/site/2022/05/181341ecf43e469afad416de80266bdd.pdf"> Regulamento Educacional</a></li>
          </ul>
          <h4>Atendimento ao Aluno</h4>
          <ul>
            <li> <a href="<?= SITE['root'] ?>/secretaria-academica"> Secretaria Acad??mica</a></li>
            <li> <a class="getstarted scrollto" href="<?= SITE['root'] ?>#contact">Fale com a Coordena????o</a></li>

          </ul>

        </div>
        <div class="col-md-3">
          <h4>Extens??o</h4>
          <ul>
            <li> <a target="_blank" href="https://pos.faam.com.br/storage/attachments/site/2022/05/785ba8473b8480fb518d379ef816933a.pdf"> Resolu????o</a></li>
            <!-- <li> <a href="<?= SITE['root'] ?>/portaria"> Portaria</a></li> -->
            <li> <a href="<?= SITE['root'] ?>/cursos-de-extensao?ensino=EXTENS??O"> Cursos</a></li>
            <!-- <li> <a href="<?= SITE['root'] ?>/pesquisa-academica"> Pesquisa Acad??mica</a></li> -->
          </ul>
          <h4>Links ??teis</h4>
          <ul>
          <li> <a href="https://posfaam.paineldoaluno.com.br/" target="_blank"><i class="bi bi-person-circle"></i> Aluno On-line</a></li>
          <li> <a href="https://posfaam.paineldoaluno.com.br/professor_login" target="_blank"><i class="bi bi-person-circle"></i> Professor On-line</a></li>
            <li> <a href="<?= SITE['root'] ?>/biblioteca"> Biblioteca</a></li>
            <li> <a class="getstarted scrollto" href="<?= SITE['root'] ?>#contact">Fale Conosco</a></li>
            <li> <a href="<?= SITE['root'] ?>/politica-de-privacidade"> Pol??tica de Privacidade</a></li>
            <li> <a href="<?= SITE['root'] ?>/pesquisa-academica"> Pesquisa acad??mica</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h4>Atendimento</h4>
          <ul>
            <li><a href="https://api.whatsapp.com/send?phone=5591991436058" target="_blank">Telefone: (91) 9 9143-6058</a></li>
            <li><a href="#">E-mail: posgraduacao@faam.com.br </a></li>
            <li><a href="#">E-mail: coord.extensao@faam.com.br </a></li>
          </ul>
          <h4>Bolsas, Parcerias e Conv??nios</h4>
          <ul>
            <li><a href="<?= SITE['root'] ?>/bolsas-parcerias-e-convenios">Saiba mais</a></li>
          </ul>
        </div>

      </div>

    </div>
  </footer><!-- End Footer -->

  <div class="container-fluid pb-2 pt-2 text-center" style="background-color:#006f23">
    <a class="btn btn-warning getstarted" href="https://matricula.ischolar.app/?posfaam"><b>INSCREVA-SE</b></a>
  </div>

  <div class="container-fluid bg-warning pb-2 pt-4 text-center text-black">
    <div class="copyright">
      &copy; Copyright <strong><span><?= SITE['name'] ?></span></strong>. Todos os direitos reservados
    </div>
    <div class="credits">
      Desenvolvido por <a href="https://www.dellanosites.com.br/" target="_blank">DellanoSites</a>
    </div>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/js/main.js"></script>

  <script src="<?= SITE['root'] . "/views/assets/" ?>js/jquery.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/" ?>js/jquery.mask.min.js"></script>

  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <script src="<?= SITE['root'] . "/views/assets/" ?>js/script.js"></script>

  <?= $v->section("scripts"); ?>

</body>

</html>