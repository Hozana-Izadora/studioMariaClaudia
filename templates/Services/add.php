<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<?php echo $this->Html->script('mask'); ?>
<?php echo $this->Html->css('estilo'); ?>

<?php $this->assign('title', __('Cadastrar Serviços') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Serviços' => ['action'=>'index'],
      'Cadastrar',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
    <?= $this->Form->create($service) ?>
    <div class="card-body">
        <?php
      echo $this->Form->control('service_name',[
        'label'=>'Serviço',
        'class'=>'uppercase',
      ]);
      echo $this->Form->control('price',
      ['label'=>'Valor', 
      'id'=>'price',
      'placeholder'=> 'R$'
    ]);
    ?>
    </div>

    <div class="card-footer d-flex">
        <div class="ml-auto">
            <?= $this->Form->button(__('Salvar'),['class' => 'btn bg-teal']) ?>
            <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
        </div>
    </div>

    <?= $this->Form->end() ?>
</div>