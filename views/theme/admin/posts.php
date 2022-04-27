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
                         <a href="<?= SITE['root'] ?>/admin/posts/create" class="btn btn-primary">Novo</a>
                     </div>
                     <!-- /.card-header -->

                     <div class="card-body">
                         <h5>Filtro</h5>
                         <form id="form-filter" method="GET" style="width:100%">
                             <div class="row">

                                 <div class="col-md-3">
                                     <select class="form-control" name="type" id="type">
                                         <option value="">-- Selcione o Tipo --</option>
                                         <option value="page">Página</option>
                                         <option value="post">Notícia</option>
                                         <option value="schedule">Agenda</option>
                                     </select>
                                 </div>
                                 <div class="col-md-1">
                                 <input type="button" value="Filtrar" class="btn btn-primary" id="btnFilterPosts">
                                 </div>
                                 <div class="col-md-1">
                                 <a href="<?=SITE['root']?>/admin/posts" value="Limpar filtro" class="btn btn-default">Limpar</a>
                                 </div>
                             </div>
                         </form>
                         <hr>
                         <div class="login_form_callback"> <?= flash(); ?></div>

                         <table class="table-bordered" id="filter-posts">
                             <thead>
                                 <tr>
                                     <th style="width: 10px">#</th>
                                     <th>Título</th>
                                     <th>Descrição</th>
                                     <th>Slug</th>
                                     <th>Tipo</th>
                                     <th>Ordernar</th>
                                     <th>Criado</th>
                                     <th>Atualizado</th>
                                     <th style="width: 70px"></th>
                                 </tr>
                             </thead>

                             <tbody>

                             </tbody>

                         </table>

                     </div>

                 </div>

             </div>
         </div> <!-- /.row -->
     </div>

 </section>

 <!-- /.content -->