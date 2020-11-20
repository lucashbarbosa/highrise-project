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
            <?= $this->Html->link(__('Edit Iten'), ['action' => 'edit', $iten->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Iten'), ['action' => 'delete', $iten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $iten->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Itens'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Iten'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="itens view content">
            <h3><?= h($iten->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Label') ?></th>
                    <td><?= h($iten->label) ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= h($iten->position) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($iten->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Page Id') ?></th>
                    <td><?= h($iten->page_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($iten->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
