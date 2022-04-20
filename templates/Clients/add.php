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


<div class="card card-pink card-outline">
  <?= $this->Form->create($client,['type'=>'file']) ?>
  <div class="card-body">
    <?php
    echo $this->Form->control('client_name', ['label' => 'Nome']);
    echo $this->Form->control('client_cpf', ['label' => 'CPF', 'id' => 'cpf']);
    echo $this->Form->control('client_birthday', ['label' => 'Nascimento', 'type' => 'date']);
    echo $this->Form->control('client_phone', ['label' => 'Telefone', 'id' => 'telefone']);
    echo $this->Form->control('client_email', ['label' => 'Email']);
    echo $this->Form->control('client_photo', ['label' => 'Foto','type'=>'file']);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Salvar'),['class' => 'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>