<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Spayment[]|\Cake\Collection\CollectionInterface $spayments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Spayment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="spayments index large-9 medium-8 columns content">
    <h3><?= __('Spayments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('daily_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account') ?></th>
                <th scope="col"><?= $this->Paginator->sort('memo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($spayments as $spayment): ?>
            <tr>
                <td><?= $this->Number->format($spayment->id) ?></td>
                <td><?= $spayment->has('user') ? $this->Html->link($spayment->user->id, ['controller' => 'Users', 'action' => 'view', $spayment->user->id]) : '' ?></td>
                <td><?= h($spayment->created) ?></td>
                <td><?= h($spayment->modified) ?></td>
                <td><?= $this->Number->format($spayment->amount) ?></td>
                <td><?= $spayment->has('rate') ? $this->Html->link($spayment->rate->name, ['controller' => 'Rates', 'action' => 'view', $spayment->rate->id]) : '' ?></td>
                <td><?= $this->Number->format($spayment->daily_rate) ?></td>
                <td><?= $spayment->has('supplier') ? $this->Html->link($spayment->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $spayment->supplier->id]) : '' ?></td>
                <td><?= $this->Number->format($spayment->account) ?></td>
                <td><?= h($spayment->memo) ?></td>
                <td><?= $this->Number->format($spayment->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $spayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $spayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $spayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $spayment->id)]) ?>
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
