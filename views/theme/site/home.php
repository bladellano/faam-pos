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
                <div class="col-md-10 col-8">
                    <div class="form-group">
                        <input type="search" class="form-control" name="search" id="search" placeholder="Digite o nome do Curso">
                    </div>
                </div>
                <div class="col-md-2 col-2 d-grid">
                    <button type="submit" class="btn btn-outline-light">Buscar</button>
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
                        <h4 class="title"><a href="">NOT??CIAS</a></h4>
                        <ul>
                            <?php foreach ($noticias as $n) : ?>

                                <li>
                                    <span class="badge bg-success"> <?= substr(convertDatePtbr($n->created_at), 0, 5)  ?></span>
                                    <h5><a href="<?= SITE['root'] ?>/noticias/<?= $n->slug ?>"> <?= $n->title ?> </a></h5>
                                    <p class="description"><?= $n->description ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>

                            </li>
                        </ul>
                        <a href="<?= SITE['root'] ?>/noticias">&rarr; Todas as not??cias</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-calendar"></i></div>
                        <h4 class="title"><a href="">AGENDA</a></h4>
                        <ul>
                            <?php foreach ($agendas as $a) : ?>
                                <li>
                                    <button type="button" class="btn btn-secondary position-relative">
                                        <?= $a->event_date  ?>
                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                                            <span class="visually-hidden">New alerts</span>
                                        </span>
                                    </button>

                                    <h5><a href="<?= SITE['root'] ?>/agendas/<?= $a->slug ?>" class=""> <?= $a->title ?> </a> </h5>
                                    <p class="description"><?= $a->description ?>
                                    </p>
                                </li>
                            <?php endforeach; ?>

                            </li>
                        </ul>
                        <a href="<?= SITE['root'] ?>/agendas">&rarr; Todas as agendas</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-notification"></i></div>
                        <h4 class="title"><a href="">FIQUE POR DENTRO</a></h4>
                        <a href="<?= SITE['root'] . DS . $fiquePorDentro->slug ?>">
                            <img src="<?= SITE['root'] . DS . $fiquePorDentro->cover ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="<?= $fiquePorDentro->title ?>">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Cursos Mobile ======= -->
    <section id="cursosPorArea" class="portfolio" style="display:none">
        <div class="container">
            <div class="section-title">
                <h2>Cursos de P??s-Gradua????o</h2>
            </div>
            <div class="row">
                <?php foreach ($areas as $a) : ?>
                    <div class="col-md-3 col-6">

                        <div class="card mb-2">
                            <div class="card-body text-center">
                                <a href="<?= SITE['root'] ?>/cursos-area/<?= $a->slug ?>"><?= $a->nome ?></a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <!-- ======= TODOS OS CURSOS DE POS-GRADUA????O ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Cursos de P??s-Gradua????o</h2>
                <p>Assim, alinhado ??s diretrizes curriculares nacionais, reconhecido pelo MEC e com o diferencial de ter uma proposta fundamentada em investimentos cont??nuos na capacita????o, nos cursos de p??s-gradua????o na Faculdade FAAM ?? o mais inovador e completo em todas as ??reas no territ??rio nacional.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Todos</li>
                        <?php foreach ($areas as $a) : ?>
                            <li style="background-image: url(<?= $a->imagem_thumb ?>);" data-filter=".filter-<?= $a->slug ?>">
                                <span><?= $a->nome ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container why-us">

                <?php foreach ($cursos as $c) : ?>

                    <div data-url="<?= SITE['root'] . DS . 'cursos' . DS . $c->slug ?>" class="col-lg-4 col-md-6 content-item portfolio-item filter-<?= $c->area ?>">
                        <span><?= mb_strtoupper($c->nome) ?></span>
                        <h4><i class="bi bi-calendar4-week"></i> <?= $c->duracao ?> meses | <i class="bx bx-medal"></i> Reconhecido pelo MEC</h4>
                        <p><?= resume($c->sobre_o_curso, 80) ?></p>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <img class="img-fluid" src="<?= asset('images/logo-esex.png') ?>" alt="SEM LOGO">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <a class="cta-btn align-middle" href="<?= SITE['root'] . "/cursos-de-extensao?ensino=EXTENS??O" ?>">Cursos de Extens??o</a>
                </div>
                <div class="col-md-4 text-center">
                    <a class="cta-btn align-middle" target="_blank" href="https://matricula.ischolar.app/?posfaam">Inscri????es</a>
                </div>
                <div class="col-md-4 text-center">
                    <a class="cta-btn align-middle" href="<?= SITE['root'] . "/agendas" ?>">Eventos</a>
                </div>
            </div>

        </div>
    </section>
    <!-- End Cta Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>Sobre</h2>
            </div>
            <div class="row">

                <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3><?= $sobre->description ?></h3>
                    <p style="text-align:justify">
                        <img src="<?= SITE['root'] . DS . $sobre->cover ?>" alt="SEM IMAGEM" style="float: right; padding-left: 16px; width:50%">
                        <?= $sobre->content ?>
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
            </div>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">

                    <?php foreach ($parceiros as $p) : ?>
                        <div class="swiper-slide"> <a href="<?= SITE['root'] . DS . "parceiros/$p->slug" ?>"> <img src="<?= SITE['root'] . DS . $p->image_thumb ?>" class="img-fluid" alt=""> </a></div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Our Clients Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Contato</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Localiza????o:</h4>
                            <p>BR-010, 590 - Levil??ndia, Ananindeua - PA, 67000-000</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>E-mail:</h4>
                            <p>Coordena????o: posgraduacao@faam.com.br
                                <br />Secretaria: seacpos@faam.com.br</br>
                                Extens??o: coord.extensao@faam.com.br
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Telefone:</h4>
                            <p>(91) 9 9143-6058</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-hourglass"></i>
                            <h4>Atendimento:</h4>
                            <p>De 13h ??s 21h</p>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6741217091403!2d-48.388637684670925!3d-1.3722149989991903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92a48b04f6ccd7c9%3A0x171a5d942157d41a!2sFAAM%20-%20Faculdade%20da%20Amaz%C3%B4nia!5e0!3m2!1spt-BR!2sbr!4v1648854562717!5m2!1spt-BR!2sbr" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

                    <form action="<?= SITE['root'] ?>/form-submission" method="POST" class="php-email-form">
                        <div class="login_form_callback"> <?= flash(); ?></div>

                        <input type="hidden" name="typeForm" value="Contato">
                        <input type="hidden" name="ciente">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Seu nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" required>
                            </div>
                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                <label for="name">Seu e-mail</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Assunto</label>
                            <input type="text" class="form-control" name="assunto" id="assunto" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Mensagem</label>
                            <textarea class="form-control" name="mensagem" rows="10" required></textarea>
                        </div>
                        <div class="g-recaptcha" data-sitekey="<?=reCAPTCHA['cliente']?>"></div>
                        <div class="text-center"><button type="submit">Enviar mensagem</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/js/script.js"); ?>"></script>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>