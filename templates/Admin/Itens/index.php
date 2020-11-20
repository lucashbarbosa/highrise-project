<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $itens
 */
?>
<div class="itens index content">
    <?= $this->Html->link(__('New Iten'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Itens') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('label') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('page_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itens as $iten): ?>
                <tr>
                    <td><?= $this->Number->format($iten->id) ?></td>
                    <td><?= h($iten->label) ?></td>
                    <td><?= h($iten->position) ?></td>
                    <td><?= h($iten->type) ?></td>
                    <td><?= h($iten->page_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $iten->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $iten->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $iten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id)]) ?>
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
