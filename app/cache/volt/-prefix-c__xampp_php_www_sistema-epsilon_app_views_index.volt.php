<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Epsilon</title>
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $this->url->get('dist/img/logo.jpeg') ?>">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <?= \Phalcon\Tag::stylesheetLink('plugins/fontawesome-free/css/all.min.css') ?>
  <!-- overlayScrollbars -->
  <?= \Phalcon\Tag::stylesheetLink('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>
  <!-- Theme style -->
  <?= \Phalcon\Tag::stylesheetLink('dist/css/adminlte.min.css') ?>
  <?= \Phalcon\Tag::stylesheetLink('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>
  <?= \Phalcon\Tag::stylesheetLink('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>
  <?= \Phalcon\Tag::stylesheetLink('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>


  <!--CKEditor Plugin-->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="<?= $this->url->get('dist/img/logo.jpeg') ?>" alt="AdminLTELogo" height="320" width="320">
  </div> -->
 

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= $this->url->get('../index') ?>" class="nav-link">Inicio</a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $this->url->get('../index') ?>" class="brand-link">
      <img src="<?= $this->url->get('dist/img/logo.jpeg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema Epsilon</span>
    </a>

    <!-- Sidebar    -->
    <div class="sidebar">

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
        
          <li class="nav-header">ROLES Y PERMISOS</li>

          <li class="nav-item">
            <a href="<?= $this->url->get('../usuario') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>              <p>
                Usuarios
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Roles
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Permisos
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Tipo de documentos
              </p>
            </a>
          </li>


          <li class="nav-header">SOLICITUD</li>

          <li class="nav-item">
            <a href="<?= $this->url->get('../asociado') ?>" class="nav-link">
              <i class="nav-icon fas fa-marker"></i>
              <p>
                Ingresar solicitud asociado
              </p>
            </a>
          </li>

          <li class="nav-header">REVISIÓN DE SOLICITUDES</li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Solicitudes
              </p>
            </a>
          </li>

          <li class="nav-header">INICIACION DE ASOCIADO</li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Recibo de pago
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                Generar carnet
              </p>
            </a>
          </li>

          
          <li class="nav-header">CAJERO</li>

          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Recibir de pago
              </p>
            </a>
          </li>          


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bienvenido</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 

    <!-- Main content -->
    <div class="col col-12">
    <?php echo $this->getContent(); ?>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Sistema Epsilon.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= $this->url->get('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= $this->url->get('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- overlayScrollbars -->
<script src="<?= $this->url->get('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>

<!-- AdminLTE App -->
<script src="<?= $this->url->get('dist/js/adminlte.js') ?>"></script>


<script src="<?= $this->url->get('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= $this->url->get('plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
<script src="<?= $this->url->get('plugins/raphael/raphael.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
<script src="<?= $this->url->get('plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= $this->url->get('plugins/chart.js/Chart.min.js') ?>"></script>

</body>
</html>
