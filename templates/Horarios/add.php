<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario $horario
 */
?>

<?php $this->assign('title', __('Cadastrar Horário') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Horários' => ['action'=>'index'],
      'Cadastrar',
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
    <div class="ml-auto">
      <?= $this->Form->button(__('Salvar'),['class'=>'bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
