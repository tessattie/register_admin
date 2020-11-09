<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction[]|\Cake\Collection\CollectionInterface $transactions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pointofsales'), ['controller' => 'Pointofsales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pointofsale'), ['controller' => 'Pointofsales', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactions index large-9 medium-8 columns content">
    <h3><?= __('Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pointofsale_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?= $this->Number->format($transaction->id) ?></td>
                <td><?= h($transaction->created) ?></td>
                <td><?= h($transaction->modified) ?></td>
                <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->id, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
                <td><?= $transaction->has('rate') ? $this->Html->link($transaction->rate->name, ['controller' => 'Rates', 'action' => 'view', $transaction->rate->id]) : '' ?></td>
                <td><?= $this->Number->format($transaction->type) ?></td>
                <td><?= $this->Number->format($transaction->amount) ?></td>
                <td><?= h($transaction->comment) ?></td>
                <td><?= $transaction->has('pointofsale') ? $this->Html->link($transaction->pointofsale->name, ['controller' => 'Pointofsales', 'action' => 'view', $transaction->pointofsale->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?>
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
