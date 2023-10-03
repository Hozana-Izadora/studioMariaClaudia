<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agenda $agenda
 */
?>

<?php $this->assign('title', __('Add Agenda') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Agendas' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <?= $this->Form->create($agenda) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('data',['type'=>'date']);
      echo $this->Form->control('ativo', ['custom' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
