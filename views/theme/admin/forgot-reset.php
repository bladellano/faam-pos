<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?> | <?= $titleHeader ?></title>

  <link rel="icon" type="image/x-icon" href="<?= asset("images/favicon.png", 'site'); ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= asset("plugins/fontawesome-free/css/all.min.css", 'admin'); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css", 'admin'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= asset("dist/css/adminlte.min.css", 'admin'); ?>">

  <link rel="stylesheet" href="<?= asset("css/message.css"); ?>">

  <link rel="stylesheet" href="<?= asset("css/load.css"); ?>">

</head>

<body class="hold-transition login-page">

  <!--AJAX LOAD-->
  <div class="ajax_load">
    <div class="ajax_load_box">
      <div class="ajax_load_box_circle"></div>
      <div class="ajax_load_box_title">Aguarde, carregando!</div>
    </div>
  </div>

  <div class="login-box">
    <div class="login-logo">
      <a href="<?= SITE['root'] ?>"><b><?= mb_strtoupper(SITE['name']) ?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Digite a sua nova senha.</p>

        <form action="<?= SITE['root'] ?>/admin/forgot/reset" method="POST">

          <div class="login_form_callback"> <?= flash(); ?></div>

          <div class="input-group mb-3">

            <input type="hidden" name="id_user" value="<?= $id_user ?>">
            <input type="hidden" name="id" value="<?= $id ?>">

            <input type="password" class="form-control" placeholder="Senha" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-key"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Atualizar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="<?= SITE['root'] ?>/admin/login">Login</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= asset("plugins/jquery/jquery.min.js", 'admin'); ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= asset("plugins/bootstrap/js/bootstrap.bundle.min.js", 'admin'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= asset("dist/js/adminlte.min.js", 'admin'); ?>"></script>

  <script src="<?= asset("js/jquery-ui.js"); ?>"></script>
  <script src="<?= asset("js/script.js"); ?>"></script>
  <script src="<?= asset("js/form.js"); ?>"></script>

</body>

</html>