<?php $v->layout("theme/site/_theme"); ?>

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

<section id="pesquisar-curso">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>ENCONTRE SEU CURSO</h3>
            </div>
        </div>
        <form id="form-pesquisa-curso" action="<?= SITE['root'] . '/busca' ?>" method="GET">
            <div class="row">
                <div class="col-md-10 col-9">
                    <div class="form-group">
                        <input type="search" class="form-control" name="search" id="search" placeholder="Digite o nome do Curso">
                    </div>
                </div>
                <div class="col-md-2 col-2 d-grid">
                    <button data-url="<?= SITE['root']?>" type="submit" class="btn btn-warning">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- END NOVO -->

<main id="main">
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

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Cursos de Pós-Graduação</h2>
                <p>Assim, alinhado às diretrizes curriculares nacionais, reconhecido pelo MEC e com o diferencial de ter uma proposta fundamentada em investimentos contínuos na capacitação, nos cursos de pós-graduação na Faculdade FAAM é o mais inovador e completo em todas as áreas no território nacional.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Todos</li>
                        <?php foreach ($areas as $a) : ?>
                            <li data-filter=".filter-<?= $a->slug ?>"><?= $a->nome ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container why-us">

                <?php foreach ($cursos as $c) : ?>

                    <div data-url="<?= SITE['root'] . DS . 'cursos' . DS . $c->slug ?>" class="col-lg-4 col-md-6 content-item portfolio-item filter-<?= $c->area ?>">
                        <span><?= mb_strtoupper($c->nome) ?></span>
                        <h4><i class="bi bi-calendar4-week"></i> <?= $c->duracao ?> meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
                        <p><?= $c->sobre_o_curso ?></p>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>
    <!-- End Portfolio Section -->

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

                    <p style="text-align:justify">
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
    </section>
    <!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contato</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Localização:</h4>
                            <p>BR-010, 590 - Levilândia, Ananindeua - PA, 67000-000</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>E-mail:</h4>
                            <p>Coordenação: posgraduacao@faam.com.br
                                <br />Secretaria: seacpos@faam.com.br</br>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Telefone:</h4>
                            <p>(91) 9 9143-6058</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-hourglass"></i>
                            <h4>Atendimento:</h4>
                            <p>De 13h às 21h</p>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Seu nome</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                <label for="name">Seu e-mail</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Assunto</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Mensagem</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Carregando...</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Sua mensagem foi enviada. Obrigado!</div>
                        </div>
                        <div class="text-center"><button type="submit">Enviar mensagem</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->