<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $clients
 */
?>
<?php echo $this->Html->script('mask'); ?>

<?php $this->assign('title', __('Clientes')); ?>

<?php
$this->assign(
  'breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Clientes',
    ]
  ])
);
?>

<div class="card card-pink card-outline">
  <div class="card-header d-sm-flex">
    
    <div class="card-toolbox">
      <?= $this->Html->link(__('Cadastrar Cliente'), ['action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-2">
    <table class="table table-hover text-nowrap" id="example">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome</th>
          <th></th>
          <th>CPF</th>
          <th>Nascimento</th>
          <th>Telefone</th>
          <th>Email</th>
          <th>Data da Criação</th>
          <th class="actions"><?= __('Ações') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clients as $client) : ?>
          <tr>
            <td><?= $this->Number->format($client->id_client) ?></td>
            <td><?= h($client->client_name) ?></td>
            <td>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <?= $this->Html->image('Clients/Photos/' . $client->client_photo, ['class' => 'img-circle elevation-2', 'width' => '30']) ?>

                </li>
              </ul>
            </td>
            <td><?= h($client->client_cpf) ?></td>
            <td><?= $client->client_birthday->i18nFormat('dd/MM/Y') ?></td>
            <td><?= h($client->client_phone) ?></td>
            <td><?= h($client->client_email) ?></td>
            <td><?= $client->created->i18nFormat('dd/MM/Y') ?></td>
            <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $client->id_client], ['class' => 'btn btn-sm bg-maroon', 'escape' => false, 'title' => 'Vizualizar']) ?>
              <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $client->id_client], ['class' => 'btn btn-sm btn-warning text-white', 'escape' => false, 'title' => 'Editar']) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $client->id_client], ['class' => 'btn btn-sm bg-purple', 'escape' => false, 'confirm' => __('Deseja realmente excluir # {0}?', $client->client_name)]) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div> <!-- /.card-body -->
</div>