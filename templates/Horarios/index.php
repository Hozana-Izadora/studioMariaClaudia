<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario[]|\Cake\Collection\CollectionInterface $horarios
 */
?>

<?php $this->assign('title', __('Horarios') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Horários',
    ]
  ])
);
?>

<div class="card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><!-- --></h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
            'label'=>false,
            'class' => 'form-control-sm',
          ]); ?>
      <?= $this->Html->link(__('Cadastrar Horário'), ['action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_horario') ?></th>
              <th><?= $this->Paginator->sort('hora') ?></th>
              <th><?= $this->Paginator->sort('agenda_id') ?></th>
              <th class="actions"><?= __('Ações') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($horarios as $horario): ?> 
          <tr>
            <td><?= $this->Number->format($horario->id_horario) ?></td>
            <td><?= h($horario->hora) ?></td>
            <td><?= $horario->has('agenda') ? $this->Html->link($horario->agenda->data->i18nFormat('dd/MM/Y'), ['controller' => 'Agendas', 'action' => 'view', $horario->agenda->id_agenda]) : '' ?></td>
            <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $horario->id_horario], ['class' => 'btn btn-sm bg-maroon', 'escape' => false, 'title' => 'Vizualizar']) ?>
              <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $horario->id_horario], ['class' => 'btn btn-sm btn-warning text-white', 'escape' => false, 'title' => 'Editar']) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $horario->id_horario], ['class' => 'btn btn-sm bg-purple', 'escape' => false, 'confirm' => __('Deseja realmente excluir # {0}?', $horario->hora)]) ?>
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
