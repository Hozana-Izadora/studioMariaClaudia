<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= strip_tags($this->settings['appName']) . ' | ' . $this->fetch('title') ?></title>

  <?= $this->Html->meta('icon') ?>
  <?= $this->fetch('meta') ?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- jQuery -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/jquery/jquery.min.js') ?>
  <!-- Bootstrap 4 -->
  <?= $this->Html->script('CakeLte./AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>
  <!-- AdminLTE App -->
  <?= $this->Html->script('CakeLte./AdminLTE/dist/js/adminlte.min.js') ?>

  
  <!-- Font Awesome Icons -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>
  <!-- icheck bootstrap -->
  <?= $this->Html->css('CakeLte./AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>
  <!-- Theme style -->
  <?= $this->Html->css('CakeLte./AdminLTE/dist/css/adminlte.min.css') ?>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <?= $this->Html->css('CakeLte.style') ?>

  <?= $this->fetch('css') ?>
  <style>
    .login {
      text-align: center !important;
      -ms-flex-align: center;
      align-items: center;
      background: #fff0f0;
      display: -ms-flexbox;
      display: flex;
      -ms-flex-direction: column;
      flex-direction: column;
      height: 100vh;
      -ms-flex-pack: center;
      justify-content: center;
      padding-top: 2.5%;
    }
  </style>
</head>

<body class="login">
  <div class="card elevation-3" style="width: 50rem;">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <?= $this->Html->image('logo_color.png', ['alt' => $this->settings['appName']]) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6" style="width:100%">
          <?= $this->Html->image('login.png', [
            'alt' => $this->settings['appName'],
            'class' => 'brand-image',
            'style' => 'width:100%'
          ]) ?>
        </div>
        <div class="col-md-6">
          <?= $this->fetch('content') ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.login-box -->
  <?= $this->fetch('script') ?>
</body>

</html>