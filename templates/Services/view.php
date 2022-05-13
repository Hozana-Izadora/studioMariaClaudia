<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>

<?php
$this->assign('title', __('Serviço') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Serviços' => ['action'=>'index'],
      'Vizualizar',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($service->service_name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($service->id_service) ?></td>
        </tr>
        <tr>
            <th><?= __('Valor') ?></th>
            <td><?= $this->Number->format($service->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= ($service->created->i18nFormat('dd/MM/Y')) ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= ($service->modified->i18nFormat('dd/MM/Y')) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Excluir'),
          ['action' => 'delete',  $service->id],
          ['confirm' => __('Deseja realmente excluir # {0}?',  $service->id_service), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Editar'), ['action' => 'edit',  $service->id_service], ['class' => 'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


