<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FAAM PÓS-GRADUAÇÃO | <?= $title ?></title>

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/img/favicon.png" rel="icon">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= SITE['root'] . "/views/assets/site" ?>/css/style.css" rel="stylesheet">

  <link href="<?= SITE['root'] . "/views/assets" ?>/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.7.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">seacpos@faam.com.br</a>
        <i class="bi bi-phone-fill phone-icon"></i> (91) 98565-3345
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

      <h1 class="logo me-auto"><a href="index.html">
        <img src="<?=asset('images/logo-faam-pos.png')?>" alt="">
      </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->

          <li class="dropdown"><a href="#"><span>Pos-Graduação</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Conheça</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Diferencias e Benefícios</a></li>
                </ul>
              </li>

              <li class="dropdown"><a href="#"><span>Para Empresas</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Soluções Corporativas</a></li>
                </ul>
              </li>


            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Conheça</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Institucional</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Quem somos</a></li>
                  <li><a href="#">Nossa Infraestrutura</a></li>
                  <li><a href="#">Tour 360º</a></li>
                </ul>
              </li>

              <li class="dropdown"><a href="#"><span>Diferenciais</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Suporte ao Aluno</a></li>
                  <li><a href="#">Qualidade Acadêmica</a></li>
                  <li><a href="#">Benefícios Internacionais</a></li>
                </ul>
              </li>

              <li class="dropdown"><a href="#"><span>Mais Serviços</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Soluções Corporativas</a></li>
                  <li><a href="#">Perguntas Frequentes</a></li>
                  <li><a href="#">Sala de Imprensa</a></li>
                  <li><a href="#">Trabalhe Conosco</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li class="dropdown"><a href="#"><span>Como ingressar</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Pós-Graduação</a></li>
              <li><a href="#">Reabertura de Matrícula</a></li>
            </ul>
          </li>

          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
          <li><a class="getstarted scrollto" href="#about">INSCREVA-SE</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <?php for ($i = 0; $i < count($banners); $i++) : ?>

          <div class="carousel-item <?= ($i == 0) ? 'active' : '' ?>" style="background-image: url(<?= SITE['root'] . "/" . $banners[$i]->image ?>)">
            <div class="carousel-container">

            </div>
          </div>

        <?php endfor ?>

        <!-- Slide 1 -->
        <!-- <div class="carousel-item active" style="background-image: url(<?= SITE['root'] . "/views/assets/site" ?>/img/slide/slide-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Green</span></h2>
              <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div> -->

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <!-- NOVO -->

  <section id="pesquisar-curso" class="bg-success">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3>ENCONTRE SEU CURSO</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-9">
          <div class="form-group">
            <input type="text" class="form-control" name="" id="" placeholder="Digite o nome do Curso">
          </div>
        </div>
        <div class="col-md-2 col-2 d-grid">
          <a href="#" class="btn btn-warning">Buscar</a>
        </div>
      </div>
    </div>
  </section>

  <!-- END NOVO -->


  <main id="main">

    <div class="container">
      <?= $v->section("content"); ?>
    </div>

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services section-bg">
      <div class="container">

        <div class="row no-gutters">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-news"></i></div>
              <h4 class="title"><a href="">NOTÍCIAS</a></h4>
              <ul>
                <li> <span class="badge bg-success">24/03</span>
                  <h5> Voluptatum deleniti atque corrupti quos dolores</h5>
                  <p class="description">Voluptatum deleniti atque corrupti quos dolores excepturi sint occaecati cupiditate non provident...
                    <a href="http://" class="">Saiba mais.</a>
                  </p>
                </li>
                <li> <span class="badge bg-success">24/03</span>
                  <h5> Voluptatum deleniti atque corrupti quos dolores</h5>
                  <p class="description">Voluptatum deleniti atque corrupti quos dolores excepturi sint occaecati cupiditate non provident...
                    <a href="http://" class="">Saiba mais.</a>
                  </p>
                </li>
                <li> <span class="badge bg-success">24/03</span>
                  <h5> Voluptatum deleniti atque corrupti quos dolores</h5>
                  <p class="description">Voluptatum deleniti atque corrupti quos dolores excepturi sint occaecati cupiditate non provident...
                    <a href="http://" class="">Saiba mais.</a>
                  </p>
                </li>

                </li>
              </ul>
              <a href="#">&rarr; Todas as notícias</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-calendar"></i></div>
              <h4 class="title"><a href="">AGENDA</a></h4>
              <ul>
                <li> <span class="badge bg-success">24/03</span>
                  <h5> Voluptatum deleniti atque corrupti quos dolores</h5>
                  <p class="description">Voluptatum deleniti atque corrupti quos dolores excepturi sint occaecati cupiditate non provident...
                    <a href="http://" class="">Saiba mais.</a>
                  </p>
                </li>
                <li> <span class="badge bg-success">24/03</span>
                  <h5> Voluptatum deleniti atque corrupti quos dolores</h5>
                  <p class="description">Voluptatum deleniti atque corrupti quos dolores excepturi sint occaecati cupiditate non provident...
                    <a href="http://" class="">Saiba mais.</a>
                  </p>
                </li>
                <li> <span class="badge bg-success">24/03</span>
                  <h5> Voluptatum deleniti atque corrupti quos dolores</h5>
                  <p class="description">Voluptatum deleniti atque corrupti quos dolores excepturi sint occaecati cupiditate non provident...
                    <a href="http://" class="">Saiba mais.</a>
                  </p>
                </li>

                </li>
              </ul>
              <a href="#">&rarr; Todas as agendas</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-notification"></i></div>
              <h4 class="title"><a href="">FIQUE POR DENTRO</a></h4>
              <img src="http://portal.faam.com.br/storage/images/fique-por-dentro/2021/12/bec8dd84fb.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Cursos ======= -->
    <section id="cursos" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Cursos de Pós-Graduação</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>


        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6 content-item">
            <span>ESPECIALIZAÇÃO EM PSICOLOGIA NAS ORGANIZAÇÕES</span>
            <h4><i class="bi bi-calendar4-week"></i> 6 meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
            <p>O Direito Administrativo, como forma de regulação das atividades da Administração Pública, impõe a observância de rígidos procedimentos e formas de atuação</p>
          </div>
          <div class="col-lg-4 col-md-6 content-item">
            <span>ESPECIALIZAÇÃO EM PSICOLOGIA NAS ORGANIZAÇÕES</span>
            <h4><i class="bi bi-calendar4-week"></i> 6 meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
            <p>O Direito Administrativo, como forma de regulação das atividades da Administração Pública, impõe a observância de rígidos procedimentos e formas de atuação</p>
          </div>
          <div class="col-lg-4 col-md-6 content-item">
            <span>ESPECIALIZAÇÃO EM PSICOLOGIA NAS ORGANIZAÇÕES</span>
            <h4><i class="bi bi-calendar4-week"></i> 6 meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
            <p>O Direito Administrativo, como forma de regulação das atividades da Administração Pública, impõe a observância de rígidos procedimentos e formas de atuação</p>
          </div>
          <div class="col-lg-4 col-md-6 content-item">
            <span>ESPECIALIZAÇÃO EM PSICOLOGIA NAS ORGANIZAÇÕES</span>
            <h4><i class="bi bi-calendar4-week"></i> 6 meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
            <p>O Direito Administrativo, como forma de regulação das atividades da Administração Pública, impõe a observância de rígidos procedimentos e formas de atuação</p>
          </div>
          <div class="col-lg-4 col-md-6 content-item">
            <span>ESPECIALIZAÇÃO EM PSICOLOGIA NAS ORGANIZAÇÕES</span>
            <h4><i class="bi bi-calendar4-week"></i> 6 meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
            <p>O Direito Administrativo, como forma de regulação das atividades da Administração Pública, impõe a observância de rígidos procedimentos e formas de atuação</p>
          </div>
          <div class="col-lg-4 col-md-6 content-item">
            <span>ESPECIALIZAÇÃO EM PSICOLOGIA NAS ORGANIZAÇÕES</span>
            <h4><i class="bi bi-calendar4-week"></i> 6 meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
            <p>O Direito Administrativo, como forma de regulação das atividades da Administração Pública, impõe a observância de rígidos procedimentos e formas de atuação</p>
          </div>

          <!-- <div class="col-lg-4 col-md-6 content-item">
            <span>02</span>
            <h4>Repellat Nihil</h4>
            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
          </div> -->

        </div>

      </div>
    </section><!-- End Cursos -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Sobre</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
          
            <p style="text-align:justify" >
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->
  
    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Parceiros</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="<?= SITE['root'] . "/views/assets/site" ?>/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Our Clients Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="<?= SITE['root'] . "/views/assets/site" ?>/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/team/team-1.jpg" alt="">
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <p>
                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/team/team-2.jpg" alt="">
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="<?= SITE['root'] . "/views/assets/site" ?>/img/team/team-3.jpg" alt="">
              <h4>William Anderson</h4>
              <span>CTO</span>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Green</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Green</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= SITE['root'] . "/views/assets/site" ?>/js/main.js"></script>

</body>

</html>