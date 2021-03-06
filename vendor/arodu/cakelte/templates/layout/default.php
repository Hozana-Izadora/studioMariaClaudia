<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= 'Studio | ' . $this->fetch('title') ?></title>

  <?= $this->Html->meta('icon') ?>
  <?= $this->fetch('meta') ?>
  <!-- jQuery -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
  <!-- Mask -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>

  <!-- Font Awesome Icons -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- icheck bootstrap -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>
  <!-- Theme style -->
  <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- fullCalendar -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fullcalendar/main.min.css') ?>
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fullcalendar-daygrid/main.min.css') ?>
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fullcalendar-timegrid/main.min.css') ?>
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fullcalendar-bootstrap/main.min.css') ?>


  <?= $this->Html->css('CakeLte.style') ?>

  <?= $this->element('layout/css') ?>

  <?= $this->fetch('css') ?>

</head>
<style>
  .logo-sidebar {
    font-size: 1.25rem;
    line-height: 1.5;
    padding: .8125rem .5rem;
    transition: width .3s ease-in-out;
    white-space: nowrap;
  }
</style>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-pink navbar-dark">
      <?= $this->element('header/main') ?>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-light-maroon">
      <!-- Brand Logo -->
      <div class="user-panel bg-pink text-center">
        <a href="<?= $this->Url->build('/') ?>" class="logo-sidebar">
          <?= $this->Html->image($this->settings['appLogo'], ['alt' => $this->settings['appName'] . ' logo', 'style' => 'width: 109px;padding: 10px;']) ?>
          <!-- <span class="brand-text font-weight-light"><?= $this->settings['appName'] ?></span> -->
        </a>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <?= $this->element('sidebar/main') ?>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <?= $this->element('content/header') ?>
        </div><!-- /.container-fluid -->
      </div>

      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <?= $this->Flash->render() ?>
          <?= $this->fetch('content') ?>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <?= $this->element('aside/main') ?>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <?= $this->element('footer/main') ?>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->


  <!-- Bootstrap 4 -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
  <!-- AdminLTE App -->
  <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>
  <!--DataTables -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/datatables/js/jquery.dataTables.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery-ui/jquery-ui.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/fullcalendar/main.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/fullcalendar-daygrid/main.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/fullcalendar-timegrid/main.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/fullcalendar-interaction/main.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/fullcalendar-bootstrap/main.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/moment/moment.min.js') ?>
  <?= $this->Html->script('CakeLte./AdminLTE/dist/js/demo.js') ?>
  <?= $this->element('layout/script') ?>

  <?= $this->fetch('script') ?>
</body>

</html>