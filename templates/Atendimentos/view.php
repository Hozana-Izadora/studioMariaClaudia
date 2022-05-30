<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendimento $atendimento
 */
?>

<?php
$this->assign('title', __('Atendimento') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Atendimentos' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($atendimento->id_atendimento) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Agenda') ?></th>
            <td><?= $atendimento->has('agenda') ? $this->Html->link($atendimento->agenda->data, ['controller' => 'Agendas', 'action' => 'view', $atendimento->agenda->id_agenda]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Horario') ?></th>
            <td><?= $atendimento->has('horario') ? $this->Html->link($atendimento->horario->id_horario, ['controller' => 'Horarios', 'action' => 'view', $atendimento->horario->id_horario]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Client') ?></th>
            <td><?= $atendimento->has('client') ? $this->Html->link($atendimento->client->client_name, ['controller' => 'Clients', 'action' => 'view', $atendimento->client->id_client]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Service') ?></th>
            <td><?= $atendimento->has('service') ? $this->Html->link($atendimento->service->services, ['controller' => 'Services', 'action' => 'view', $atendimento->service->id_service]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id Atendimento') ?></th>
            <td><?= $this->Number->format($atendimento->id_atendimento) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($atendimento->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($atendimento->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $atendimento->id_atendimento],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $atendimento->id_atendimento), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $atendimento->id_atendimento], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


