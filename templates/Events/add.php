<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>

<?php $this->assign('title', __('Add Event') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Events' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($event) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('summary');
      echo $this->Form->control('colorid');
      echo $this->Form->control('description');
      echo $this->Form->control('htmllink');
      echo $this->Form->control('location');
      echo $this->Form->control('date');
      echo $this->Form->control('time_start');
      echo $this->Form->control('time_end');
      echo $this->Form->control('google_calendar_event_id');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
