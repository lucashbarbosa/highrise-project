<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $page
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Page'), ['action' => 'edit', $page->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Page'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Page'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pages view content">
            <h3><?= h($page->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($page->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($page->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($page->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Content') ?></th>
                    <td><?= h($page->content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Layout Id') ?></th>
                    <td><?= h($page->layout_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($page->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
