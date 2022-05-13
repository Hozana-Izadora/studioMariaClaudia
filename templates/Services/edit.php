<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>

<?php $this->assign('title', __('Editar Serviços') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Serviços' => ['action'=>'index'],
      'Vizualizar' => ['action'=>'view', $service->id_service],
      'Editar',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <?= $this->Form->create($service) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('service_name',['label'=>'Serviço']);
      echo $this->Form->control('price',['label'=>'Valor']);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Excluir'),
          ['action' => 'delete', $service->id_service],
          ['confirm' => __('Deseja realmente excluir # {0}?', $service->id_service), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Salvar'),['class'=>'bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
