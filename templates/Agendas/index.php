<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material[]|\Cake\Collection\CollectionInterface $materials
 */
?>
<?php echo $this->Html->css('estilo'); ?>
<?php $this->assign('title', __('Materiais') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Materiais',
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
      <?= $this->Html->link(__('Cadastrar Material'), ['action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_agenda') ?></th>
              <th><?= $this->Paginator->sort('data') ?></th>
              <th><?= $this->Paginator->sort('ativo') ?></th>
              <th class="actions"><?= __('Ações') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($agendas as $agenda): ?>
          <tr>
            <td><?= $this->Number->format($agenda->id_agenda) ?></td>
            <td><?= $agenda->data?$agenda->data->i18nFormat('dd/MM/Y') : '' ?></td>
            <td><?= $agenda->ativo?'<span>SIM</span>' : '<span>SIM</span>' ?></td>
           
            <td class="actions">
            <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $agenda->id_agenda], ['class' => 'btn btn-sm bg-maroon', 'escape' => false, 'title' => 'Vizualizar']) ?>
              <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $agenda->id_agenda], ['class' => 'btn btn-sm btn-warning text-white', 'escape' => false, 'title' => 'Editar']) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $agenda->id_agenda], ['class' => 'btn btn-sm bg-purple', 'escape' => false, 'confirm' => __('Deseja realmente excluir # {0}?', $agenda->data)]) ?>
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
