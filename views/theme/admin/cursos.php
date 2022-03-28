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
                         <a href="<?=SITE['root']?>/admin/cursos/create" class="btn btn-primary">Novo</a>
                     </div>
                     <!-- /.card-header -->
                     <div class="card-body">

                     <div class="login_form_callback"> <?= flash(); ?></div>

                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th style="width: 10px">#</th>
                                     <th>Curso</th>
                                     <th>Logo</th>
                                     <th>Slug</th>
                                     <th>Carga Horária</th>
                                     <th>Duração</th>
                                     <th>Turno</th>
                                     <th>Área</th>
                                     <th>Criado</th>
                                     <th>Atualizado</th>
                                     <th style="width: 70px"></th>
                                 </tr>
                             </thead>

                             <tbody>
                                 <?php foreach ($cursos as $c) : ?>

                                     <tr>
                                         <td><?= $c->id ?></td>
                                         <td><a href="cursos/edit/<?=$c->id?>"><?= $c->nome ?></a></td>
                                         <td> <img height="100" width="200" class="zoomImg" src="<?= SITE['root'].DS.$c->logo ?>" alt="SEM IMAGEM"></td>
                                         <td><?= $c->slug ?></td>
                                         <td><?= $c->carga_horaria ?></td>
                                         <td><?= $c->duracao ?></td>
                                         <td><?= $c->turno ?></td>
                                         <td><?= $c->id_area ?></td>
                                         <td><?= convertDatePtbr($c->created_at)?></td>
                                         <td><?= convertDatePtbr($c->updated_at)?></td>
                                         <td>
                                             <a href="cursos/edit/<?=$c->id?>" class="btn btn-default btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a> 
                                             <a onclick="return confirm('Deseja realmente excluir este registro?')" href="cursos/delete/<?=$c->id?>" class="btn btn-default btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a> 
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

