<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Size[]|\Cake\Collection\CollectionInterface $sizes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Size'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sizes index large-9 medium-8 columns content">
    <h3><?= __('Sizes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('initial_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('final_size') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sizes as $size): ?>
            <tr>
                <td><?= $this->Number->format($size->id) ?></td>
                <td><?= $this->Number->format($size->initial_size) ?></td>
                <td><?= $this->Number->format($size->type) ?></td>
                <td><?= $this->Number->format($size->final_size) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $size->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $size->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $size->id], ['confirm' => __('Are you sure you want to delete # {0}?', $size->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
