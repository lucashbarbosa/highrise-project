<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $menuItens
 */
?>
<div class="menuItens index content">
    <?= $this->Html->link(__('New Menu Iten'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Menu Itens') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('menu_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menuItens as $menuIten): ?>
                <tr>
                    <td><?= $this->Number->format($menuIten->id) ?></td>
                    <td><?= h($menuIten->menu_id) ?></td>
                    <td><?= h($menuIten->item_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $menuIten->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menuIten->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menuIten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuIten->id)]) ?>
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
