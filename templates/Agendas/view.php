<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agenda $agenda
 */
?>

<?php
$this->assign('title', __('Agenda') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Agendas' => ['action'=>'index'],
      'Vizualizar',
    ]
  ])
);
?>

<div class="view card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title "><?= $agenda->data->i18nFormat('dd/MM/Y')?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Id Agenda') ?></th>
            <td><?= $this->Number->format($agenda->id_agenda) ?></td>
        </tr>
        <tr>
            <th><?= __('Data') ?></th>
            <td><?= $agenda->data->i18nFormat('dd/MM/Y') ?></td>
        </tr>
        <tr>
            <th><?= __('Criado') ?></th>
            <td><?= $agenda->created->i18nFormat('dd/MM/Y') ?></td>
        </tr>
        <tr>
            <th><?= __('Modificado') ?></th>
            <td><?= $agenda->modified->i18nFormat('dd/MM/Y') ?></td>
        </tr>
        <tr>
            <th><?= __('Ativo') ?></th>
            <td><?= $agenda->ativo ? __('<small class="badge badge-success">SIM</small>') : __('<small class="badge badge-danger">NÃO</small>'); ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Excluir'),
          ['action' => 'delete',  $agenda->id_agenda],
          ['confirm' => __('Deseja excluir # {0}?',  $agenda->data), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Editar'), ['action' => 'edit',  $agenda->id_agenda], ['class' => 'btn bg-teal']) ?>
      <?= $this->Html->link(__('Cancelar'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-atendimentos view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Atendimentos do Dia') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('Cadastrar Atendimento'), ['controller' => 'Atendimentos' , 'action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
      <?= $this->Html->link(__('Listar Todos '), ['controller' => 'Atendimentos' , 'action' => 'index'], ['class' => 'btn bg-purple btn-sm']) ?>
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
      <?php if (empty($agenda->atendimentos)) { ?>
        <tr>
            <td colspan="8" class="text-muted">
              Registros de atendimentos não achados!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($agenda->atendimentos as $atendimentos) : ?>
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

<div class="related related-horarios view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Horarios do Dia') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('Cadastrar Horário'), ['controller' => 'Horarios' , 'action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
      <?= $this->Html->link(__('Listar Horários'), ['controller' => 'Horarios' , 'action' => 'index'], ['class' => 'btn bg-purple btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id Horario') ?></th>
          <th><?= __('Hora') ?></th>
          <th><?= __('Agenda Id') ?></th>
          <th class="actions"><?= __('Ações') ?></th>
      </tr>
      <?php if (empty($agenda->horarios)) { ?>
        <tr>
            <td colspan="6" class="text-muted">
             Registros de Horários não achados!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($agenda->horarios as $horarios) : ?>
        <tr>
            <td><?= h($horarios->id_horario) ?></td>
            <td><?= h($horarios->hora) ?></td>
            <td><?= h($horarios->agenda_id) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Horarios', 'action' => 'view', $horarios->id_horario], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Horarios', 'action' => 'edit', $horarios->id_horario], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Horarios', 'action' => 'delete', $horarios->id_horario], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $horarios->id_horario)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

