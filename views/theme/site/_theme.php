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

  <link href="<?= SITE['root'] . "/views/assets" ?>/css/style.css" rel="stylesheet">

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
        <i class="bi bi-phone-fill phone-icon"></i> (91) 9 9143-6058
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
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
          <!-- <li><a class="nav-link scrollto active" href="<?= SITE['root'] ?>#hero">Home</a></li> -->
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>/#cta">Escola de Extensão</a></li>
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>/cursos">Pos-Graduação</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Pos-Graduação</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Conheça</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="<?= SITE['root'] . DS . 'diferenciais-e-beneficios' ?>">Diferencias e Benefícios</a></li>
                </ul>
              </li>

              <li class="dropdown"><a href="#"><span>Para Empresas</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="<?= SITE['root'] . DS ?>solucoes-coorporativas">Soluções Corporativas</a></li>
                </ul>
              </li>

            </ul>
          </li> -->
          <!-- <li class="dropdown"><a href="#"><span>Conheça</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Institucional</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="<?= SITE['root'] . DS ?>quem-somos">Quem somos</a></li>
                  <li><a href="<?= SITE['root'] . DS ?>nossa-infraestrutura">Nossa Infraestrutura</a></li>
                  <li><a href="<?= SITE['root'] . DS ?>tour-360">Tour 360º</a></li>
                </ul>
              </li>

              <li class="dropdown"><a href="#"><span>Diferenciais</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="<?= SITE['root'] . DS ?>suporte-ao-aluno">Suporte ao Aluno</a></li>
                  <li><a href="<?= SITE['root'] . DS ?>qualidade-academica">Qualidade Acadêmica</a></li>
                  <li><a href="<?= SITE['root'] . DS ?>beneficios-internacionais">Benefícios Internacionais</a></li>
                </ul>
              </li>

              <li class="dropdown"><a href="#"><span>Mais Serviços</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="<?= SITE['root'] . DS ?>perguntas-frequentes">Perguntas Frequentes</a></li>
                  <li><a href="<?= SITE['root'] . DS ?>sala-de-imprensa">Sala de Imprensa</a></li>
                  <li><a href="<?= SITE['root'] . DS ?>trabalhe-conosco">Trabalhe Conosco</a></li>
                </ul>
              </li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>/como-ingressar">Como Ingressar</a></li>
          <li class="dropdown"><a href="#"><span style="text-align:center">Vantagens e<br> Benefícios</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= SITE['root'] . DS ?>convenios">Convênios</a></li>
              <li><a href="<?= SITE['root'] . DS ?>descontos">Descontos</a></li>
            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto" href="#">Área do Candidato</a></li> -->
          <li><a class="nav-link scrollto" href="<?= SITE['root'] ?>#contact">Contato</a></li>
          <li><a class="getstarted scrollto" href="<?= SITE['root'] ?>#contact">INSCREVA-SE</a></li>
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
            <li> <a target="_blank" href="http://portal.faam.com.br/a-faculdade"> A Faculdade</a></li>
            <li> <a target="_blank" href="http://portal.faam.com.br/seja-nosso-parceiro"> Seja nosso Parceiro</a></li>
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
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Modalidade de Ensino</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Cursos de Pós-graduação</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Manual do Professor</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Manual do Aluno</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Formas de Ingresso</a></li>
          </ul>
          <h4>Atendimento ao Aluno</h4>
          <ul>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Secretaria Acadêmica</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Fale com a Coordenação</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"><i class="bi bi-person-circle"></i> Aluno On-line</a></li>
          </ul>

        </div>
        <div class="col-md-3">
          <h4>Extensão</h4>
          <ul>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Regulamento</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Portaria</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Cursos</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Pesquisa Acadêmica</a></li>
          </ul>
          <h4>Links Úteis</h4>
          <ul>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Biblioteca</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Fale Conosco</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Política de Privacidade</a></li>
            <li> <a href="<?= SITE['root'] ?>/quem-somos"> Pesquisa acadêmica</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h4>Atendimento</h4>
          <ul>
            <li><a href="#">Telefone: (91) 9 9143-6058</a></li>
            <li><a href="#">E-mail: posgraduacao@faam.com.br </a></li>
          </ul>
          <h4>Bolsas, Parcerias e Convênios</h4>
          <ul>
            <li><a href="<?= SITE['root'] ?>/quem-somos">Saiba mais</a></li>
          </ul>
        </div>

      </div>

    </div>
  </footer><!-- End Footer -->

  <div class="container-fluid pb-2 pt-2 text-center" style="background-color:#006f23">
    <a class="btn btn-warning getstarted scrollto" href="<?= SITE['root'] ?>#contact"><b>INSCREVA-SE</b></a>
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