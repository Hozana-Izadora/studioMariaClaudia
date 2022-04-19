<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<?php echo $this->Html->script('mask'); ?>

<?php $this->assign('title', __('Cadastrar Cliente')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Clientes' => ['action' => 'index'],
      'Cadastrar',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($client) ?>
  <div class="card-body">
    <?php
    echo $this->Form->control('client_name', ['label' => 'Nome']);
    echo $this->Form->control('client_cpf', ['label' => 'CPF', 'id' => 'cpf']);
    echo $this->Form->control('client_birthday', ['label' => 'Nascimento', 'type' => 'date']);
    echo $this->Form->control('client_phone', ['label' => 'Telefone', 'id' => 'telefone']);
    echo $this->Form->control('client_email', ['label' => 'Email']);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>