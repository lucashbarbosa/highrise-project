<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $iten
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens form content">
            <?= $this->Form->create($iten) ?>
            <fieldset>
                <legend><?= __('Add Iten') ?></legend>
                <?php
                    echo $this->Form->control('label');
                    echo $this->Form->control('position');
                    echo $this->Form->control('type');
                    echo $this->Form->control('page_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
