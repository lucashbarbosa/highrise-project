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
            <?= $this->Html->link(__('Edit Menu Iten'), ['action' => 'edit', $menuIten->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Menu Iten'), ['action' => 'delete', $menuIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuIten->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Menu Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Menu Iten'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="menuItens view content">
            <h3><?= h($menuIten->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Menu Id') ?></th>
                    <td><?= h($menuIten->menu_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item Id') ?></th>
                    <td><?= h($menuIten->item_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($menuIten->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
