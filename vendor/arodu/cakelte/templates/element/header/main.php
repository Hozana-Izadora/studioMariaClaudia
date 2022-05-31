<!-- Left navbar links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>

  <?php echo $this->element('header/menu') ?>
</ul>

<!-- SEARCH FORM -->
<?php echo $this->element('header/search') ?>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
  <!-- Messages Dropdown Menu -->
  <?php echo $this->element('header/messages') ?>

  <!-- Notifications Dropdown Menu -->
  <?php echo $this->element('header/notifications') ?>
  <li class="nav-item">
    <a class="nav-link" title="Sair" href="<?= $this->Url->build('/logout') ?>" role="button">
      <i class="fas fa-sign-out-alt"></i>
    </a>
  </li>

</ul>