<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php $this->assign('title', __('Users') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Users',
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
      <?= $this->Html->link(__('Novo Usuário'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_user') ?></th>
              <th><?= $this->Paginator->sort('user_name') ?></th>
              <th><?= $this->Paginator->sort('user_cpf') ?></th>
              <th><?= $this->Paginator->sort('user_phone') ?></th>
              <th><?= $this->Paginator->sort('email') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
          <tr>
            <td><?= $this->Number->format($user->id_user) ?></td>
            <td><?= h($user->user_name) ?></td>
            <td><?= h($user->user_cpf) ?></td>
            <td><?= h($user->user_phone) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= $user->created->i18nFormat('dd/MM/Y') ?></td>
            <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $user->id_user], ['class'=>'btn btn-sm btn-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $user->id_user], ['class'=>'text-white btn btn-sm btn-warning', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $user->id_user], ['class'=>'btn btn-sm btn-danger', 'escape'=>false, 'confirm' => __('Deseja realmente excluir # {0}?', $user->user_name)]) ?>
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
