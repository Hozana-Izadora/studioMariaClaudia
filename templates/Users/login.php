<?php

/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Html->script('login');?>
<style>
  #btn-senha:hover {
    cursor: pointer;
  }
</style>
<?php $this->layout = "CakeLte.login" ?>

<div class="card">
  <div class="card-body login-card-body">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>

    <?= $this->Form->control('email', [
      'type' => 'email',
      'label' => false,
      'placeholder' => __('Email'),
      'append' => '<i class="fas fa-user"></i>'
    ]) ?>

    <?= $this->Form->control('password', [
      'type' => 'password',
      'label' => false,
      'placeholder' => __('Senha'),
      'append' => '<i class="fa fa-eye-slash" id="btn-senha"></i>'
    ]) ?>

    <div class="row">
      <div class="col-8">
        <?= $this->Form->control('remember_me', ['type' => 'checkbox', 'label' => 'Mantenha-me Conectado', 'custom' => true]) ?>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <?= $this->Form->control(__('Entrar'), ['type' => 'submit', 'class' => 'btn bg-maroon btn-block']) ?>
      </div>
      <!-- /.col -->
    </div>

    <?= $this->Form->end() ?>

    <!-- /.social-auth-links -->

    <p class="mb-1">
      <?= $this->Html->link(__('Esqueci minha senha'), '#') ?>
    </p>
  </div>
</div>