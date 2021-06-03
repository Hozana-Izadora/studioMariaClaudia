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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $material->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $material->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Materials'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="materials form content">
            <?= $this->Form->create($material) ?>
            <fieldset>
                <legend><?= __('Edit Material') ?></legend>
                <?php
                    echo $this->Form->control('material_description');
                    echo $this->Form->control('material_quant');
                    echo $this->Form->control('material_expiration');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
