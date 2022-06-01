<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event[]|\Cake\Collection\CollectionInterface $events
 */
?>

<?php $this->assign('title', __('Events') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Events',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><!-- --></h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
            'label'=>false,
            'class' => 'form-control-sm',
          ]); ?>
      <?= $this->Html->link(__('New Event'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id_event') ?></th>
              <th><?= $this->Paginator->sort('summary') ?></th>
              <th><?= $this->Paginator->sort('colorid') ?></th>
              <th><?= $this->Paginator->sort('htmllink') ?></th>
              <th><?= $this->Paginator->sort('location') ?></th>
              <th><?= $this->Paginator->sort('date') ?></th>
              <th><?= $this->Paginator->sort('time_start') ?></th>
              <th><?= $this->Paginator->sort('time_end') ?></th>
              <th><?= $this->Paginator->sort('google_calendar_event_id') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($events as $event): ?>
          <tr>
            <td><?= $this->Number->format($event->id_event) ?></td>
            <td><?= h($event->summary) ?></td>
            <td><?= h($event->colorid) ?></td>
            <td><?= h($event->htmllink) ?></td>
            <td><?= h($event->location) ?></td>
            <td><?= h($event->date) ?></td>
            <td><?= h($event->time_start) ?></td>
            <td><?= h($event->time_end) ?></td>
            <td><?= h($event->google_calendar_event_id) ?></td>
            <td><?= h($event->created) ?></td>
            <td><?= h($event->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $event->id_event], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $event->id_event], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $event->id_event], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $event->id_event)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
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
