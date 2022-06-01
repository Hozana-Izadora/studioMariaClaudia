<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>

<?php
$this->assign('title', __('Event') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Events' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($event->id_event) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Summary') ?></th>
            <td><?= h($event->summary) ?></td>
        </tr>
        <tr>
            <th><?= __('Colorid') ?></th>
            <td><?= h($event->colorid) ?></td>
        </tr>
        <tr>
            <th><?= __('Htmllink') ?></th>
            <td><?= h($event->htmllink) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($event->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Google Calendar Event Id') ?></th>
            <td><?= h($event->google_calendar_event_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Event') ?></th>
            <td><?= $this->Number->format($event->id_event) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($event->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Start') ?></th>
            <td><?= h($event->time_start) ?></td>
        </tr>
        <tr>
            <th><?= __('Time End') ?></th>
            <td><?= h($event->time_end) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($event->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($event->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $event->id_event],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $event->id_event), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $event->id_event], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>

<div class="view text card">
  <div class="card-header">
    <h3 class="card-title"><?= __('Description') ?></h3>
  </div>
  <div class="card-body">
    <?= $this->Text->autoParagraph(h($event->description)); ?>
  </div>
</div>

