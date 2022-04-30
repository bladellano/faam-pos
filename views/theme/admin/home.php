<?php $v->layout("theme/admin/_theme"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">

        <div class="login_form_callback"> <?= flash(); ?></div>
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title ?> - <?= $titleHeader ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= SITE['root'] ?>/admin">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title ?> - <?= $titleHeader ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <!-- <div class="col-lg-3 col-6">

                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3><?= $leadQtd ?></h3>
                        <p>Leads</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/leads" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $carsQtd ?></h3>
                        <p>Carros</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/cars" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $postsQtd ?></h3>
                        <p>Posts</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/posts" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $scheduleQtd ?></h3>
                        <p>Agendas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/posts" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $pagesQtd ?></h3>
                        <p>Páginas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/posts" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?= $bannersQtd ?></h3>
                        <p>Banners</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/banners" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-gray">
                    <div class="inner">
                        <h3><?= $leadsQtd ?></h3>
                        <p>Leads</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/leads" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-cyan">
                    <div class="inner">
                        <h3><?= $cursosQtd ?></h3>
                        <p>Cursos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/cursos" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3><?= $parceirosQtd ?></h3>
                        <p>Parceiros</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/parceiros" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3><?= $usuariosQtd ?></h3>
                        <p>Usuários</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/users" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-olive">
                    <div class="inner">
                        <h3><?= $areasQtd ?></h3>
                        <p>Áreas de Curso</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?= SITE['root'] ?>/admin/areas" class="small-box-footer">Mais info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

    </div>
</section>