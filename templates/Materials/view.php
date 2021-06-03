<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Materials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Material'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="materials view content">
            <h3><?= h($material->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Material Description') ?></th>
                    <td><?= h($material->material_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($material->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Material Quant') ?></th>
                    <td><?= $this->Number->format($material->material_quant) ?></td>
                </tr>
                <tr>
                    <th><?= __('Material Expiration') ?></th>
                    <td><?= h($material->material_expiration) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($material->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($material->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
