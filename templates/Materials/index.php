<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material[]|\Cake\Collection\CollectionInterface $materials
 */
?>
<div class="materials index content">
    <?= $this->Html->link(__('New Material'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Materials') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('material_description') ?></th>
                    <th><?= $this->Paginator->sort('material_quant') ?></th>
                    <th><?= $this->Paginator->sort('material_expiration') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($materials as $material): ?>
                <tr>
                    <td><?= $this->Number->format($material->id) ?></td>
                    <td><?= h($material->material_description) ?></td>
                    <td><?= $this->Number->format($material->material_quant) ?></td>
                    <td><?= h($material->material_expiration) ?></td>
                    <td><?= h($material->created) ?></td>
                    <td><?= h($material->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $material->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $material->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
