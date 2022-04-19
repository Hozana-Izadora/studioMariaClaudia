<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>

<?php $this->assign('title', __('Clientes') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Clientes',
    ]
  ])  
);
?>

<div class="card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><!-- --></h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
            'label'=>false,
            'class' => 'form-control-sm',
          ]); ?>
      <?= $this->Html->link(__('Cadastrar Cliente'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('client_name',['label'=>'Nome']) ?></th>
              <th><?= $this->Paginator->sort('client_cpf',['label'=>'CPF']) ?></th>
              <th><?= $this->Paginator->sort('client_birthday',['label'=>'Nascimento']) ?></th>
              <th><?= $this->Paginator->sort('client_phone',['label'=>'Telefone']) ?></th>
              <th><?= $this->Paginator->sort('client_email',['label'=>'Email']) ?></th>
              <th><?= $this->Paginator->sort('created',['label'=>'Data da Criação']) ?></th>
              <th class="actions"><?= __('Ações') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($clients as $client): ?>
          <tr>
            <td><?= $this->Number->format($client->id_client) ?></td>
            <td><?= h($client->client_name) ?></td>
            <td><?= h($client->client_cpf) ?></td>
            <td><?= h($client->client_birthday) ?></td>
            <td><?= h($client->client_phone) ?></td>
            <td><?= h($client->client_email) ?></td>
            <td><?= h($client->created) ?></td>
            <td><?= h($client->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $client->id_client], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->id_client], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->id_client], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Pág {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total')) ?>
    </div>

    <ul class="pagination pagination-sm">
      <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape'=>false]) ?>
    </ul>

  </div>
  <!-- /.card-footer -->
</div>
