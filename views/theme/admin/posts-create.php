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
                     <?php if (isset($post->id)) : ?>
                         <form action="<?= SITE['root'] ?>/admin/posts/update/<?= $post->id ?>" method="POST" enctype="multipart/form-data">
                         <?php else : ?>
                             <form action="<?= SITE['root'] ?>/admin/posts/register" method="POST" enctype="multipart/form-data">
                             <?php endif; ?>

                             <div class="card-body">

                                 <div class="login_form_callback"> <?= flash(); ?></div>

                                 <div class="form-group">
                                     <label for="content">Capa</label>
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="customFile" name="file" onchange="previewFile(this)">
                                         <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                                     </div>
                                 </div>

                                 <?php if (isset($post->id) && !empty($post->cover)) : ?>
                                     <img src="<?= SITE['root'] . DS . $post->cover_thumb ?>" id="previewImg"></img>
                                     <a class="btn btn-danger btn-sm" href="<?= SITE['root'] ?>/admin/posts/remove-cover/<?= $post->id ?>">
                                         <i class="far fa-trash-alt" title="Remover capa"></i></a>
                                 <?php else : ?>
                                     <img style="display:none" id="previewImg"></img>
                                 <?php endif; ?>

                                 <div class="form-group">
                                     <label for="title">Título</label>
                                     <input <?= ( isset($disabled) && !empty($disabled) ? $disabled : "") ?> maxlength="100" value="<?= isset($post->title) ? $post->title : "" ?>" type="text" class="form-control" id="title" name="title">
                                 </div>

                                 <div class="form-group">
                                     <label for="description">Descrição</label>
                                     <input value="<?= isset($post->description) ? $post->description : "" ?>" type="text" class="form-control" id="description" name="description">
                                 </div>

                                 <div class="row">

                                     <div class="form-group col-md-6">

                                         <label for="type">Tipo</label>
                                         <select <?= ( isset($disabled) && !empty($disabled) ? $disabled : "") ?> name="type" id="type" class="form-control">
                                             <option value="">--</option>
                                             <option value="post" <?= (isset($post->type) && $post->type == 'post') ? 'selected' : '' ?>>Notícia</option>
                                             <option value="page" <?= (isset($post->type) && $post->type == 'page') ? 'selected' : '' ?>>Página</option>
                                             <option value="schedule" <?= (isset($post->type) && $post->type == 'schedule') ? 'selected' : '' ?>>Agenda</option>
                                         </select>
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label>Data do Evento</label>
                                         <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                             <input value="<?= isset($post->event_date) ? $post->event_date : "" ?>" 
                                              <?=(isset($post->id) && !empty($post->event_date)) ? '' : 'disabled' ?>
                                              required
                                              type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="event_date">
                                             <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                 <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                             </div>
                                         </div>
                                     </div>

                                 </div>

                                 <div class="form-group">
                                     <label for="content">Conteúdo</label>
                                     <textarea name="content" id="content" cols="30" rows="5" class="summernote"><?= isset($post->content) ? $post->content : "" ?></textarea>
                                 </div>

                                 <div class="row">

                                     <div class="form-group col-md-12">
                                         <label for="id_category">Categoria</label>

                                         <select name="id_category" id="id_category" class="form-control">
                                             <option value="0">Nenhuma</option>
                                             <?php foreach ($categories as $c) : ?>
                                                 <option <?= (isset($post->id_category) && $post->id_category == $c->id) ? 'selected' : '' ?> value="<?= $c->id ?>"><?= $c->category ?></option>
                                             <?php endforeach ?>
                                         </select>

                                     </div>
                                 </div>

                             </div>
                             <!-- /.card-body -->
                             <div class="card-footer">
                                 <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
                                 <?php if (isset($post->id)) : ?>
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
 <script src="<?= asset("js/jquery.toaster.js"); ?>"></script>
 <?php $v->end(); ?>