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

        <ul class="list-group">
            <?php foreach ($posts as $p) : ?>
                <li class="list-group-item">

                    <?php if (!empty($p->event_date)) :  ?>
                        <button type="button" class="btn btn-secondary position-relative">
                            <b>Agenda:</b> <?= $p->event_date  ?>
                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </button>
                    <?php endif; ?>

                    <a href="<?= SITE['root'] . "/" . mb_strtolower($title) . "/" . $p->slug ?>"> <?= mb_strtoupper($p->title) ?> </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <?= $pages ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->