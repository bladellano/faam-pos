<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerenciador | <?= $title ?></title>

  <link rel="icon" type="image/x-icon" href="<?= asset("images/favicon.png"); ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= asset("plugins/fontawesome-free/css/all.min.css", 'admin'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css", 'admin'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css", 'admin'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= asset("plugins/jqvmap/jqvmap.min.css", 'admin'); ?>">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css", 'admin'); ?>">
  <link rel="stylesheet" href="<?= asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css", 'admin'); ?>">
  <link rel="stylesheet" href="<?= asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css", 'admin'); ?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= asset("dist/css/adminlte.min.css", 'admin'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css", 'admin'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= asset("plugins/daterangepicker/daterangepicker.css", 'admin'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= asset("plugins/summernote/summernote-bs4.min.css", 'admin'); ?>">

  <link rel="stylesheet" href="<?= asset("css/message.css"); ?>">
  <link rel="stylesheet" href="<?= asset("css/load.css"); ?>">
  <link rel="stylesheet" href="<?= asset("admin/dist/css/style.css"); ?>">

  <!-- Alertify - CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="ajax_load">
    <div class="ajax_load_box">
      <div class="ajax_load_box_circle"></div>
      <div class="ajax_load_box_title">Aguarde, carrengando...</div>
    </div>
  </div>

  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= asset("images/favicon.png"); ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= SITE['root'] ?>/admin" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= SITE['root'] ?>/admin/posts" class="nav-link">Posts</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= SITE['root'] ?>/admin/banners" class="nav-link">Banners</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= SITE['root'] ?>/admin/cars" class="nav-link">Carros</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= SITE['root'] ?>/admin/users" class="nav-link">Usuários</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= SITE['root'] ?>/admin/logout" class="nav-link">Sair</a>
      </li> -->

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <!-- <span class="badge badge-danger navbar-badge">3</span> -->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= SITE['root'] ?>/views/assets/admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= SITE['root'] ?>/views/assets/admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= SITE['root'] ?>/views/assets/admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= SITE['root'] ?>/admin" class="brand-link">
        <img src="<?= asset("images/favicon.png"); ?>" alt="Dash - <?= SITE['name'] ?>" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">
          Dash - <?= SITE['name'] ?>
        </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= SITE['root'] ?>/views/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= isset($_SESSION['user']) ? $_SESSION['user']['first_name'] : "--" ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <!-- Custom menu Vega -->

            <li class="nav-item">
              <a href="<?= SITE['root'] ?>/admin" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-graduation-cap"></i>
                <p>
                  Cursos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE['root'] ?>/admin/cursos/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Novo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= SITE['root'] ?>/admin/cursos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registros</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= SITE['root'] ?>/admin/areas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Áreas</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a href="<?= SITE['root'] ?>/admin/posts" class="nav-link">
                <i class="nav-icon far fa-newspaper"></i>
                <p>
                  Posts
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= SITE['root'] ?>/admin/banners" class="nav-link">
                <i class="nav-icon far fa-images"></i>
                <p>
                  Banners
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= SITE['root'] ?>/admin/parceiros" class="nav-link">
                <i class="nav-icon fa fa-solid fa-handshake"></i>
                <p>
                  Parceiros
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= SITE['root'] ?>/admin/leads" class="nav-link">
                <i class="nav-icon fa fa-mail-bulk"></i>
                <p>
                  Leads
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?= SITE['root'] ?>/admin/users" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Usuários
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= SITE['root'] ?>/admin/logout" class="nav-link">
                <i class="nav-icon fas fa-times"></i>
                <p>
                  Sair
                </p>
              </a>
            </li>
            <li class="nav-item">
            <hr>

              <a href="#" class="nav-link" data-toggle="modal" data-target="#anexosModal">
                <i class="nav-icon fa fa-file-export"></i>
                <p>
                  Anexos
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Modal -->
    <div class="modal fade" id="anexosModal" tabindex="-1" aria-labelledby="anexosModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">

        <form action="<?= SITE['root'] . "/admin/attachments" ?>" method="POST" enctype="multipart/form-data">

          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="anexosModalLabel">Anexos</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="login_form_callback"> <?= flash(); ?></div>

              <div class="row">
                <div class="col-md-12">
                  <div iv class="form-group">
                    <label for="">Nome</label>
                    <input type="text" name="nome" class="form-control">
                  </div>
                  <div iv class="form-group">
                    <label for="">Tipo</label>
                    <input type="radio" name="tipo" id="tipo" value="Image"> Imagem
                    <input type="radio" name="tipo" id="tipo" value="File" checked> Outros
                  </div>
                  <div iv class="form-group">
                    <label for="">Arquivo</label>
                    <input type="file" name="arquivo" class="form-control">
                  </div>
                </div>
              </div>

            </div>

            <div class="modal-footer" style="justify-content: flex-start;">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>

        <div class="container">
          <div class="row mb-3">
            <div class="col-md-12">
              <hr>

              <table id="anexos-ativos" style="width:100%" data-url="<?= SITE['root'] ?>">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Nome Arquivo</th>
                    <th>Imagem</th>
                    <th>Arquivo</th>
                    <th>Criado</th>
                    <th></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $v->section("content"); ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= asset("plugins/jquery/jquery.min.js", 'admin'); ?>"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= asset("plugins/jquery-ui/jquery-ui.min.js", 'admin'); ?>"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= asset("plugins/bootstrap/js/bootstrap.bundle.min.js", 'admin'); ?>"></script>

  <!-- InputMask -->
  <script src="<?= asset("plugins/inputmask/jquery.inputmask.min.js", 'admin'); ?>"></script>

  <!-- JqueryMask -->
  <script src="<?= asset("dist/js/jquery.mask.min.js", 'admin'); ?>"></script>

  <!-- bs-custom-file-input -->
  <script src="<?= asset("plugins/bs-custom-file-input/bs-custom-file-input.min.js", 'admin'); ?>"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?= asset("plugins/datatables/jquery.dataTables.min.js", 'admin'); ?>"></script>
  <script src="<?= asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js", 'admin'); ?>"></script>

  <!-- ChartJS -->
  <script src="<?= asset("plugins/chart.js/Chart.min.js", 'admin'); ?>"></script>

  <!-- Sparkline -->
  <!-- <script src="<?= asset("plugins/sparklines/sparkline.js", 'admin'); ?>"></script> -->

  <!-- JQVMap -->
  <!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
  <script src="<?= asset("plugins/jqvmap/jquery.vmap.min.js", 'admin'); ?>"></script>
  <script src="<?= asset("plugins/jqvmap/maps/jquery.vmap.usa.js", 'admin'); ?>"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= asset("plugins/jquery-knob/jquery.knob.min.js", 'admin'); ?>"></script>
  <!-- daterangepicker -->
  <script src="<?= asset("plugins/moment/moment.min.js", 'admin'); ?>"></script>
  <script src="<?= asset("plugins/daterangepicker/daterangepicker.js", 'admin'); ?>"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js", 'admin'); ?>"></script>
  <!-- Summernote -->
  <script src="<?= asset("plugins/summernote/summernote-bs4.min.js", 'admin'); ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js", 'admin'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= asset("dist/js/adminlte.js", 'admin'); ?>s"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= asset("dist/js/demo.js", 'admin'); ?>"></script>
  <!-- Alertify -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <!-- Script customizado -->
  <script src="<?= asset("dist/js/script.js", 'admin'); ?>"></script>

  <script src="<?= asset("js/form.js"); ?>"></script>

  <?= $v->section("scripts"); ?>

</body>

</html>