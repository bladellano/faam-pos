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

<?php if (!empty($post->cover)) : ?>
    <div class="wrapInternalImage">
        <img class="img-responsive" src="<?= SITE['root'] . DS . $post->cover ?>" alt="SEM IMAGEM">
    </div>
<?php endif; ?>

<div class="container page">

    <h2><?= $post->title ?></h2>
    <hr>
    <?php if (!empty($post->event_date)) :  ?>
        <button type="button" class="btn btn-secondary position-relative">
            <b>Agenda:</b> <?= $post->event_date  ?>
            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span>
        </button>
    <?php endif; ?>

    <div class="content_page">

        <?= $post->content ?>

    </div>
</div>
<!-- ./container -->

<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/js/script.js"); ?>"></script>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>