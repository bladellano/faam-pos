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
    <div class="row">
        <div class="col-md-12 text-center mt-2">
            <img style="width: 120px;" src="<?= SITE['root'] . DS . $parceiro->image_thumb ?>" alt="SEM IMAGEM">
        </div>
    </div>
    <h2><?= $parceiro->name ?></h2>
    <hr>
    <div class="content_page">
        <?= $parceiro->description ?>
    </div>
</div>
<!-- ./container -->