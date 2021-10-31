<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>

<?php
$this->assign('title', __('Client') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Clients' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($client->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Client Name') ?></th>
            <td><?= h($client->client_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Cpf') ?></th>
            <td><?= h($client->client_cpf) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Phone') ?></th>
            <td><?= h($client->client_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Email') ?></th>
            <td><?= h($client->client_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Client Birth') ?></th>
            <td><?= h($client->client_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($client->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($client->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $client->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $client->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $client->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


