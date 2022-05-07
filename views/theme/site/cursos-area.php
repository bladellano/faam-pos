<?php $v->layout("theme/site/_theme"); ?>

<div class="container-fluid breadcrumb-faam">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?= buildBreadcrumb() ?>
            </ol>
        </nav>
    </div>
</div>

<div class="container page">

    <h2><?= $title ?></h2>
    <hr>
    <div class="content_page">

        <?php if (!count($cursos)) : ?>
            <div class="alert alert-danger" role="alert">
                Oops! Nenhum curso encontrado.
            </div>
        <?php endif; ?>

        <ul class="list-group">
            <?php foreach ($cursos as $c) : ?>
                <li class="list-group-item"> <a href="<?= SITE['root'] . "/cursos/" . $c->slug ?>"> <?= mb_strtoupper($c->nome) ?> </a></li>
            <?php endforeach; ?>
        </ul>

        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <?= $pages ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <a class="btn btn-success" onclick="window.history.back();">Voltar</a>
        </div>
    </div>
</div>
<!-- /.container -->