<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendimento $atendimento
 */
?>

<?php $this->assign('title', __('Edit Atendimento') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Atendimentos' => ['action'=>'index'],
      'View' => ['action'=>'view', $atendimento->id_atendimento],
      'Edit',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <?= $this->Form->create($atendimento) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('agenda_id', ['options' => $agendas, 'empty' => true]);
      echo $this->Form->control('horario_id', ['options' => $horarios, 'empty' => true]);
      echo $this->Form->control('client_id', ['options' => $clients, 'empty' => true]);
      echo $this->Form->control('service_id', ['options' => $services, 'empty' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $atendimento->id_atendimento],
          ['confirm' => __('Are you sure you want to delete # {0}?', $atendimento->id_atendimento), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
