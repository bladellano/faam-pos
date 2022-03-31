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

<?php if (!empty($noticia->cover)) : ?>
    <div class="wrapInternalImage">
        <img class="img-responsive" src="<?= SITE['root'] . DS . $noticia->cover ?>" alt="SEM IMAGEM">
    </div>
<?php endif; ?>

<div class="container page">

    <h2><?= $noticia->title ?></h2>
    <hr>
    <div class="content_page">

        <?= $noticia->content ?>

    </div>
</div>
<!-- ./container -->

<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/js/script.js"); ?>"></script>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>