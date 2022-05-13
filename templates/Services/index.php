<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service[]|\Cake\Collection\CollectionInterface $services
 */
?>

<?php $this->assign('title', __('Serviços') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Serviços',
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
      <?= $this->Html->link(__('Cadastrar Serviço'), ['action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('service_name',['label'=>'Serviço']) ?></th>
              <th><?= $this->Paginator->sort('price',['label'=>'Valor']) ?></th>
              <th class="actions"><?= __('Ações') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($services as $service): ?>
          <tr>
            <td><?= $this->Number->format($service->id_service) ?></td>
            <td><?= h($service->service_name) ?></td>
            <td><?= h($service->service_price) ?></td>
            <td class="actions">
            <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $service->id_service], ['class' => 'btn btn-sm bg-maroon', 'escape' => false, 'title' => 'Vizualizar']) ?>
              <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $service->id_service], ['class' => 'btn btn-sm btn-warning text-white', 'escape' => false, 'title' => 'Editar']) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete',$service->id_service], ['class' => 'btn btn-sm bg-purple', 'escape' => false, 'confirm' => __('Deseja realmente excluir # {0}?', $service->service_name)]) ?>
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
