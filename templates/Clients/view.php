<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<?php
$this->assign('title', __('Cliente'));

$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Clientes' => ['action' => 'index'],
      'Vizualizar',
    ]
  ])
);
?>

<div class="view card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title text-pink"><?= $client->id_client . " - " . $client->client_name ?></h2>
    <div class="card-toolbox">
      <button type="button" class="btn bg-maroon btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Vizualizar Foto</button>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
        <th><?= __('Id') ?></th>
        <td><?= h($client->id_client) ?></td>
      </tr>
      <tr>
        <th><?= __('CPF') ?></th>
        <td><?= h($client->client_cpf) ?></td>
      </tr>
      <tr>
        <th><?= __('Telefone') ?></th>
        <td><?= h($client->client_phone) ?></td>
      </tr>
      <tr>
        <th><?= __('Email') ?></th>
        <td><?= h($client->client_email) ?></td>
      </tr>
      <tr>
        <th><?= __('Nascimento') ?></th>
        <td><?= $client->client_birthday->i18nFormat('dd/MM/YYYY'); ?></td>
      </tr>
      <tr>
        <th><?= __('Criado') ?></th>
        <td><?= $client->created->i18nFormat('dd/MM/YYYY'); ?></td>
      </tr>
      <tr>
        <th><?= __('Modificado') ?></th>
        <td><?= $client->modified->i18nFormat('dd/MM/YYYY'); ?></td>
      </tr>
    </table>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
        __('Excluir'),
        ['action' => 'delete',  $client->id_client],
        ['confirm' => __('Deseja realmente excluir este registro # {0}?',  $client->client_name), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Editar'), ['action' => 'edit',  $client->id_client], ['class' => 'btn btn-warning']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h6><?=$client->client_name?></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <?= $this->Html->image('Clients/Photos/' . $client->client_photo, ['class' => 'elevation-2', 'width' => '350']) ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-teal" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>