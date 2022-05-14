<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<?php echo $this->Html->script('mask'); ?>

<?php $this->assign('title', __('Editar Cliente')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Clientes' => ['action' => 'index'],
      'Vizualizar' => ['action' => 'view', $client->id_client],
      'Editar',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title text-maroon"><?= $client->id_client . " - " . $client->client_name ?></h2>
    <div class="card-toolbox">
      <button type="button" class="btn bg-maroon btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Editar Foto</button>
    </div>
  </div>
  <?= $this->Form->create($client, ['type' => 'file']) ?>
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
    <div class="">
      <?= $this->Form->postLink(
        __('Excluir'),
        ['action' => 'delete', $client->id_client],
        ['confirm' => __('Deseja realmente excluir # {0}?', $client->client_name), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Salvar'), ['class' => 'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6><?= $client->client_name ?></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= $this->Form->create($client, ['type' => 'file']) ?>

      <div class="modal-body text-center">
        <?= $this->Form->control('client_photo', ['label' => 'Foto', 'type' => 'file']); ?>

      </div>
      <div class="modal-footer">
        <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>