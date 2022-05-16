<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendimento $atendimento
 */
?>

<?php $this->assign('title', __('Cadastrar Atendimento') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Atendimentos' => ['action'=>'index'],
      'Cadastrar',
    ]
  ])
);
?>


<div class="card card-pink card-outline">
    <?= $this->Form->create($atendimento) ?>
    <div class="card-body">
        <?php
      echo $this->Form->control('agenda_id',  ['options' => $agendas, 'empty' => true, 'label'=>'Dia']);
      echo $this->Form->control('horario_id', ['options' => $horarios,'empty' => true, 'label'=>'Horário']);
      echo $this->Form->control('client_id',  ['options' => $clients, 'empty' => true, 'label'=>'Cliente']);
      echo $this->Form->control('service_id', ['options' => $services,'empty' => true, 'label'=>'Serviço']);
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