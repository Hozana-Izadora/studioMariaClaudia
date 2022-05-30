<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendimento[]|\Cake\Collection\CollectionInterface $atendimentos
 */
?>

<?php $this->assign('title', __('Atendimentos') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Listar Atendimentos',
    ]
  ])
);
?>

<div class="card card-pink card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><!-- --></h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
            'label'=>false,
            'class' => 'form-control-sm',
          ]); ?>
      <?= $this->Html->link(__('Cadastrar Atendimento'), ['action' => 'add'], ['class' => 'btn bg-maroon btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_atendimento') ?></th>
              <th><?= $this->Paginator->sort('agenda_id') ?></th>
              <th><?= $this->Paginator->sort('horario_id') ?></th>
              <th><?= $this->Paginator->sort('client_id',['label'=>'Cliente']) ?></th>
              <th><?= $this->Paginator->sort('service_id',['label'=>'Serviço']) ?></th>
             
              <th class="actions"><?= __('Ações') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($atendimentos as $atendimento): ?>
          <tr>
            <td><?= $this->Number->format($atendimento->id_atendimento) ?></td>
            <td><?= $atendimento->has('agenda') ? $this->Html->link($atendimento->agenda->data->i18nFormat('dd/MM/Y'), ['controller' => 'Agendas', 'action' => 'view', $atendimento->agenda->id_agenda]) : '' ?></td>
            <td><?= $atendimento->has('horario') ? $this->Html->link($atendimento->horario->hora, ['controller' => 'Horarios', 'action' => 'view', $atendimento->horario->id_horario]) : '' ?></td>
            <td><?= $atendimento->has('client') ? $this->Html->link($atendimento->client->client_name, ['controller' => 'Clients', 'action' => 'view', $atendimento->client->id_client]) : '' ?></td>
            <td><?= $atendimento->has('service') ? $this->Html->link($atendimento->service->service_name, ['controller' => 'Services', 'action' => 'view', $atendimento->service->id_service]) : '' ?></td>
            
            <td class="actions">
              <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $atendimento->id_atendimento], ['class'=>'btn btn-sm bg-maroon', 'escape'=>false]) ?>
              <?= $this->Html->link(__('<i class="fa fa-edit"></i>'), ['action' => 'edit', $atendimento->id_atendimento], ['class'=>'btn btn-sm text-white btn-warning', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('<i class="fa fa-trash"></i>'), ['action' => 'delete', $atendimento->id_atendimento], ['class'=>'btn btn-sm bg-purple', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $atendimento->id_atendimento)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Pág {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} no total')) ?>
    </div>

    <ul class="pagination pagination-sm">
      <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape'=>false]) ?>
    </ul>

  </div>
  <!-- /.card-footer -->
</div>
