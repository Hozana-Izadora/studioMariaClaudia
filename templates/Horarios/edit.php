<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario $horario
 */
?>

<?php $this->assign('title', __('Edit Horario') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Horarios' => ['action'=>'index'],
      'View' => ['action'=>'view', $horario->id_horario],
      'Edit',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <?= $this->Form->create($horario) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('hora', ['empty' => true]);
      echo $this->Form->control('agenda_id', ['options' => $agendas, 'empty' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $horario->id_horario],
          ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id_horario), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
