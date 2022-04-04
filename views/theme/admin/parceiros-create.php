<?php $v->layout("theme/admin/_theme"); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Formulário</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <?php if (isset($parceiro->id)) : ?>
                        <form action="<?= SITE['root'] ?>/admin/parceiros/update/<?= $parceiro->id ?>" method="POST" enctype="multipart/form-data">
                        <?php else : ?>
                            <form action="<?= SITE['root'] ?>/admin/parceiros/register" method="POST" enctype="multipart/form-data">
                            <?php endif; ?>

                            <div class="card-body">

                                <div class="login_form_callback"> <?= flash(); ?></div>

                                <div class="form-group">
                                    <label for="title">Nome</label>
                                    <input value="<?= isset($parceiro->name) ? $parceiro->name : "" ?>" type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="description">Descrição</label>
                                    <textarea name="description" id="description" class="summernote"><?= isset($parceiro->description) ? $parceiro->description : "" ?></textarea>

                                </div>

                                <div class="form-group">
                                    <label for="url">Url
                                        <i class="fas fa-question-circle" style="cursor:help" title="Se estiver vazio, o conteúdo a ser exibido será do próprio banner registrado"></i> </label>
                                    <input placeholder="https:// ou  http://" value="<?= isset($parceiro->url) ? $parceiro->url : "" ?>" type="text" class="form-control" id="url" name="url">
                                </div>
                                <div class="form-group">
                                    <label for="content">Imagem</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="file" onchange="previewFile(this)">
                                        <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                                    </div>
                                </div>

                                <?php if (isset($parceiro->id)) : ?>
                                    <img src="<?= SITE['root'] . DS . $parceiro->image_thumb ?>" id="previewImg"></img>
                                <?php else : ?>
                                    <img style="display:none" id="previewImg"></img>
                                <?php endif; ?>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
                                <?php if (isset($parceiro->id)) : ?>
                                    <button type="submit" class="btn btn-primary">Alterar</button>
                                <?php else : ?>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <?php endif; ?>
                            </div>
                            </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?php $v->start("scripts"); ?>
<?php $v->end(); ?>