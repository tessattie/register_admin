<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pointofsales'), ['controller' => 'Pointofsales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pointofsale'), ['controller' => 'Pointofsales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactions view large-9 medium-8 columns content">
    <h3><?= h($transaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $transaction->has('user') ? $this->Html->link($transaction->user->id, ['controller' => 'Users', 'action' => 'view', $transaction->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $transaction->has('rate') ? $this->Html->link($transaction->rate->name, ['controller' => 'Rates', 'action' => 'view', $transaction->rate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($transaction->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pointofsale') ?></th>
            <td><?= $transaction->has('pointofsale') ? $this->Html->link($transaction->pointofsale->name, ['controller' => 'Pointofsales', 'action' => 'view', $transaction->pointofsale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($transaction->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($transaction->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($transaction->modified) ?></td>
        </tr>
    </table>
</div>
