<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario $horario
 */
?>

<?php
$this->assign('title', __('Horário') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Horários' => ['action'=>'index'],
      'Vizualizar',
    ]
  ])
);
?>

<div class="view card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($horario->hora) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Agenda') ?></th>
            <td><?= $horario->has('agenda') ? $this->Html->link($horario->agenda->data->i18nFormat('dd/MM/Y'), ['controller' => 'Agendas', 'action' => 'view', $horario->agenda->id_agenda]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id Horario') ?></th>
            <td><?= $this->Number->format($horario->id_horario) ?></td>
        </tr>
        <tr>
            <th><?= __('Hora') ?></th>
            <td><?= h($horario->hora) ?></td>
        </tr>
        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= $horario->created->i18nFormat('dd/MM/Y') ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= $horario->modified->i18nFormat('dd/MM/Y') ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Excluir'),
          ['action' => 'delete',  $horario->id_horario],
          ['confirm' => __('Deseja excluir # {0}?',  $horario->id_horario), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Editar'), ['action' => 'edit',  $horario->id_horario], ['class' => 'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-atendimentos view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Atendimentos') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('Cadastrar Atendimento'), ['controller' => 'Atendimentos' , 'action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
      <?= $this->Html->link(__('Listar Atendimentos'), ['controller' => 'Atendimentos' , 'action' => 'index'], ['class' => 'btn bg-purple btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Atendimento') ?></th>
          <th><?= __('Agenda Id') ?></th>
          <th><?= __('Horario Id') ?></th>
          <th><?= __('Client Id') ?></th>
          <th><?= __('Service Id') ?></th>
          <th class="actions"><?= __('Ações') ?></th>
      </tr>
      <?php if (empty($horario->atendimentos)) { ?>
        <tr>
            <td colspan="8" class="text-muted">
              Registros de atendimentos não achados!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($horario->atendimentos as $atendimentos) : ?>
        <tr>
            <td><?= h($atendimentos->id_atendimento) ?></td>
            <td><?= h($atendimentos->agenda_id) ?></td>
            <td><?= h($atendimentos->horario_id) ?></td>
            <td><?= h($atendimentos->client_id) ?></td>
            <td><?= h($atendimentos->service_id) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Atendimentos', 'action' => 'view', $atendimentos->id_atendimento], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Atendimentos', 'action' => 'edit', $atendimentos->id_atendimento], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Atendimentos', 'action' => 'delete', $atendimentos->id_atendimento], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $atendimentos->id_atendimento)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

