<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>

<?php $this->assign('title', __('Editar Material') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Materiais' => ['action'=>'index'],
      'Vizualizar' => ['action'=>'view', $material->id_material],
      'Editar',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <?= $this->Form->create($material) ?>
  <div class="card-body">
    <?php
       echo $this->Form->control('material_description',['label'=>'Descrição do Material']);
       echo $this->Form->control('material_quantity',['label'=>'Quantidade']);
       echo $this->Form->control('material_purchaseday',['label'=>'Data da Compra']);
       echo $this->Form->control('material_expiration',['label'=>'Data de Expiração']);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Excluir'),
          ['action' => 'delete', $material->id_material],
          ['confirm' => __('Deseja realmente excluir # {0}?', $material->id_material), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Salvar'),['class'=>'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
