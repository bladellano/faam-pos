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
                     <?php if (isset($curso->id)) : ?>
                         <form action="<?= SITE['root'] ?>/admin/cursos/update/<?= $curso->id ?>" method="POST" enctype="multipart/form-data">
                         <?php else : ?>
                             <form action="<?= SITE['root'] ?>/admin/cursos/register" method="POST" enctype="multipart/form-data">
                             <?php endif; ?>

                             <div class="card-body">

                                 <div class="login_form_callback"> <?= flash(); ?></div>

                                 <div class="card card-primary card-tabs">
                                     <div class="card-header p-0 pt-1">
                                         <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                             <li class="nav-item">
                                                 <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Informações Principais</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Mais Detalhes</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Anexos do Curso</a>
                                             </li>

                                         </ul>
                                     </div>
                                     <div class="card-body">
                                         <div class="tab-content" id="custom-tabs-one-tabContent">
                                             <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                                                 <div class="row">

                                                     <div class="col-md-3">
                                                         <?php if (isset($curso->id) && !empty($curso->logo)) : ?>
                                                             <div style="align-items: center;display:flex">
                                                                 <img style="width:100%" src="<?= SITE['root'] . DS . $curso->logo ?>" data-target="logo" class="previewFile"></img>
                                                                 <a class="btn btn-danger btn-sm" href="<?= SITE['root'] ?>/admin/cursos/remover-logo/<?= $curso->id ?>">
                                                                     <i class="far fa-trash-alt" title="Remover logo"></i>
                                                                 </a>
                                                             </div>
                                                         <?php else : ?>
                                                             <img style="display:none;width:100%" class="previewFile" data-target="logo"></img>
                                                         <?php endif; ?>
                                                         <label for="logo">Logo</label>
                                                         <div class="custom-file">
                                                             <input type="file" class="custom-file-input" name="logo" onchange="allPreviewFile(this)">
                                                             <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                                                         </div>
                                                     </div>

                                                     <div class="col-md-9">
                                                         <?php if (isset($curso->id) && !empty($curso->cover)) : ?>
                                                             <div style="align-items: center;display:flex">
                                                                 <img style="width:100%" src="<?= SITE['root'] . DS . $curso->cover_thumb ?>" data-target="file" class="previewFile"></img>
                                                                 <a class="btn btn-danger btn-sm" href="<?= SITE['root'] ?>/admin/cursos/remover-cover/<?= $curso->id ?>">
                                                                     <i class="far fa-trash-alt" title="Remover capa"></i>
                                                                 </a>
                                                             </div>
                                                         <?php else : ?>
                                                             <img style="display:none;width:100%" class="previewFile" data-target="file"></img>
                                                         <?php endif; ?>
                                                         <label for="cover">Capa</label>
                                                         <div class="custom-file">
                                                             <input type="file" class="custom-file-input" name="file" onchange="allPreviewFile(this)">
                                                             <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                                                         </div>
                                                     </div>

                                                 </div>

                                                 <hr>

                                                 <div class="row">
                                                     <div class="col-md-6">

                                                         <div class="row">
                                                             <div class="form-group col-md-12">
                                                                 <label for="nome">Nome do Curso</label>
                                                                 <input value="<?= isset($curso->nome) ? $curso->nome : "" ?>" type="text" class="form-control" id="nome" name="nome">
                                                             </div>

                                                             <div class="form-group col-md-12">
                                                                 <label for="nome">Área de Atuação</label>
                                                                 <select name="id_area" id="id_area" class="form-control">
                                                                     <option value="0">--Selecione--</option>
                                                                     <?php foreach ($areas as $a) : ?>
                                                                         <option <?= (isset($curso->id_area) && $curso->id_area == $a->id) ? 'selected' : '' ?> value="<?= $a->id ?>"><?= $a->nome ?></option>
                                                                     <?php endforeach ?>
                                                                 </select>
                                                             </div>
                                                         </div>

                                                         <div class="form-group">

                                                             <label for="sobre_o_curso">Sobre o Curso</label>
                                                             <textarea name="sobre_o_curso" id="sobre_o_curso" class="summernote"><?= isset($curso->sobre_o_curso) ? $curso->sobre_o_curso : "" ?></textarea>

                                                             <label for="publico_alvo">Público Alvo</label>
                                                             <textarea name="publico_alvo" id="publico_alvo" class="summernote"><?= isset($curso->publico_alvo) ? $curso->publico_alvo : "" ?></textarea>

                                                         </div>

                                                     </div>

                                                     <div class="col-md-6">

                                                         <div class="row">
                                                             <div class="form-group col-md-4">
                                                                 <label for="duracao">Duração (meses)</label>
                                                                 <input placeholder="Ex.: 12" value="<?= isset($curso->duracao) ? $curso->duracao : "" ?>" type="text" class="form-control" id="duracao" name="duracao" onkeyup="onlyNumbers(this)">
                                                             </div>

                                                             <div class="form-group col-md-4">
                                                                 <label for="carga_horaria">Carga Horária (hora)</label>
                                                                 <input placeholder="Ex.: 380" value="<?= isset($curso->carga_horaria) ? $curso->carga_horaria : "" ?>" type="text" class="form-control" id="carga_horaria" name="carga_horaria" onkeyup="onlyNumbers(this)">
                                                             </div>

                                                             <div class="form-group col-md-4">
                                                                 <label for="turno">Turno</label>
                                                                 <input placeholder="Ex.: Manhã/Tarde/Noite" value="<?= isset($curso->turno) ? $curso->turno : "" ?>" type="text" class="form-control" id="turno" name="turno">
                                                             </div>

                                                         </div>

                                                         <div class="form-group">

                                                             <div class="row">
                                                                 <div class="form-group col-md-3">

                                                                     <label for="nome">Ensino</label>
                                                                     <select name="ensino" id="ensino" class="form-control">
                                                                         <option value="">--Selecione--</option>
                                                                         <option <?= ( isset($curso->ensino) && $curso->ensino == "PÓS-GRADUAÇÃO") ? "selected" : "" ?> value="PÓS-GRADUAÇÃO">PÓS-GRADUAÇÃO</option>
                                                                         <option <?= ( isset($curso->ensino) && $curso->ensino == "EXTENSÃO") ? "selected" : "" ?> value="EXTENSÃO">EXTENSÃO</option>

                                                                     </select>
                                                                 </div>

                                                                 <div class="form-group col-md-9">
                                                                     <label for="nome">Link de Inscrição</label>
                                                                     <input placeholder="Url da inscrição: https://" value="<?= isset($curso->link_inscricao) ? $curso->link_inscricao : "" ?>" type="text" class="form-control" id="link_inscricao" name="link_inscricao">
                                                                 </div>

                                                             </div>
                                                             <label for="horarios">Horários</label>
                                                             <textarea name="horarios" id="horarios" class="summernote"><?= isset($curso->horarios) ? $curso->horarios : "" ?></textarea>

                                                             <label for="duracao_do_curso">Duração do Curso</label>
                                                             <textarea name="duracao_do_curso" id="duracao_do_curso" class="summernote"><?= isset($curso->duracao_do_curso) ? $curso->duracao_do_curso : "" ?></textarea>

                                                         </div>

                                                     </div>

                                                 </div>

                                             </div>
                                             <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">

                                                 <div class="row">
                                                     <div class="col-md-6">

                                                         <div class="form-group">

                                                         <label for="investimento">Investimento</label>
                                                             <textarea name="investimento" id="investimento" class="summernote"><?= isset($curso->investimento) ? $curso->investimento : "" ?></textarea>

                                                             <label for="documentacao_necessaria">Documentação Necessária</label>
                                                             <textarea name="documentacao_necessaria" id="documentacao_necessaria" class="summernote"><?= isset($curso->documentacao_necessaria) ? $curso->documentacao_necessaria : "" ?></textarea> 

                                                             <label for="parcerias">Parcerias</label>
                                                             <textarea name="parcerias" id="parcerias" class="summernote"><?= isset($curso->parcerias) ? $curso->parcerias : "" ?></textarea>

                                                         </div>

                                                     </div>

                                                     <div class="col-md-6">

                                                         <div class="form-group">

                                                             <label for="coordenacao">Coordenação</label>
                                                             <textarea name="coordenacao" id="coordenacao" class="summernote"><?= isset($curso->coordenacao) ? $curso->coordenacao : "" ?></textarea>

                                                             <label for="matriz">Matriz Curricular</label>
                                                             <textarea name="matriz" id="matriz" class="summernote"><?= isset($curso->matriz) ? $curso->matriz : "" ?></textarea>

                                                         </div>

                                                     </div>

                                                 </div>

                                             </div>
                                             <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">

                                                 <!-- Cursos Anexos -->
                                                 <div class="row">
                                                     <div class="col-lg-12">

                                                         <?php if (isset($anexos) && count($anexos)) : ?>

                                                             <?php foreach ($anexos as $an) : ?>

                                                                 <div class="input-group mb-3">
                                                                     <input type="text" value="<?= $an->nome ?>" disabled name="nomeAnexos[]" class="form-control">

                                                                     <a target="_blank" class="btn btn-info form-control" href="<?= SITE['root'] . DS . $an->arquivo ?>">
                                                                         <i class="fa fa-file"></i> <?= $an->nome_arquivo ?></a>

                                                                     <div class="input-group-append">
                                                                         <a onclick="return confirm('Deseja realmente excluir este registro?')" href="<?= SITE['root'] . DS . 'admin/cursos/remover-anexo/' . $an->id . DS . $curso->id ?>" class="btn btn-danger">Remover</a>
                                                                     </div>
                                                                 </div>

                                                             <?php endforeach; ?>

                                                         <?php endif; ?>

                                                         <div id="inputFormRow">
                                                             <div class="input-group mb-3">
                                                                 <input type="text" name="nomeAnexos[]" class="form-control" placeholder="Nome do documento">
                                                                 <input type="file" name="anexos[]" class="form-control">

                                                                 <div class="input-group-append">
                                                                     <button id="removeRow" type="button" class="btn btn-danger">Remover</button>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                         <div id="newRow"></div>
                                                         <button id="addRow" type="button" class="btn btn-success">Adicionar</button>

                                                     </div>
                                                 </div>

                                             </div>

                                         </div>
                                     </div>

                                 </div>
                             </div>
                             <!-- /.card-body -->

                             <div class="card-footer">
                                 <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
                                 <?php if (isset($curso->id)) : ?>
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