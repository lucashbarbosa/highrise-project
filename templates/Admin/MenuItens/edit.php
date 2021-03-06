<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $menuIten
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menuIten->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menuIten->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Menu Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="menuItens form content">
            <?= $this->Form->create($menuIten) ?>
            <fieldset>
                <legend><?= __('Edit Menu Iten') ?></legend>
                <?php
                    echo $this->Form->control('menu_id');
                    echo $this->Form->control('item_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
