<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agenda $agenda
 */
?>

<?php $this->assign('title', __('Editar Agenda') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Agendas' => ['action'=>'index'],
      'Vizualizar' => ['action'=>'view', $agenda->id_agenda],
      'Editar',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
  <?= $this->Form->create($agenda) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('data');
      echo $this->Form->control('ativo', ['custom' => true]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Excluir'),
          ['action' => 'delete', $agenda->id_agenda],
          ['confirm' => __('Are you sure you want to delete # {0}?', $agenda->id_agenda), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Salvar'),['class'=>'bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
