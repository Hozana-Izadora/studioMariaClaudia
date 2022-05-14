<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>
<?php echo $this->Html->script('mask'); ?>
<?php echo $this->Html->css('estilo'); ?>
<?php $this->assign('title', __('Cadastrar Material') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Materiais' => ['action'=>'index'],
      'Cadastrar',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <?= $this->Form->create($material) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('material_description',['label'=>'Descrição do Material','class'=>'uppercase']);
      echo $this->Form->control('material_quantity',['label'=>'Quantidade']);
      echo $this->Form->control('material_purchaseday',['label'=>'Data da Compra']);
      echo $this->Form->control('material_expiration',['label'=>'Data de Expiração']);
      echo $this->Form->control('price',[
        'label'=>'Valor da Compra',
        'placeholder'=>'R$'  
      ]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Salvar'),['class'=>'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
