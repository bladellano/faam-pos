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

                <div class="card">
                    <div class="card-header">
                        <a href="<?= SITE['root'] ?>/admin/areas/create" class="btn btn-primary">Novo</a>
                    </div> 
                    <!-- /.card-header -->
                    <div class="card-body">
                        
                    <div class="login_form_callback"> <?= flash(); ?></div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nome</th>
                                    <th>Slug</th>
                                    <th>Descrição</th>
                                    <th>Imagem</th>
                                    <th>Criado</th>
                                    <th>Atualizado</th>
                                    <th style="width: 60px"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($areas as $a) : ?>
                                    <tr>
                                        <td><?= $a->id ?></td>
                                        <td><?= $a->nome ?></td>
                                        <td><?= $a->slug ?></td>
                                        <td><?= $a->descricao ?></td>
                                        <td> <img height="100" width="200" class="zoomImg" src="<?= SITE['root'].DS.$a->imagem_thumb ?>" alt="SEM IMAGEM"></td>
                                        <td><?= convertDatePtbr($a->created_at) ?></td>
                                        <td><?= convertDatePtbr($a->updated_at) ?></td>
                                        <td style="width:70px">
                                            <a href="areas/edit/<?=$a->id?>" class="btn btn-default btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a> 
                                            <a onclick="return confirm('Deseja realmente excluir este registro?')" href="areas/delete/<?=$a->id?>" class="btn btn-default btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a> 
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </div> <!-- /.row -->
    </div>

</section>

<!-- /.content -->