<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale[]|\Cake\Collection\CollectionInterface $sales
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pointofsales'), ['controller' => 'Pointofsales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pointofsale'), ['controller' => 'Pointofsales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sales index large-9 medium-8 columns content">
    <h3><?= __('Sales') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sale_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('taxe') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subtotal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pointofsale_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rate_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('daily_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('percent_discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value_discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monnaie') ?></th>
                <th scope="col"><?= $this->Paginator->sort('change_rate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('wholesale') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sale): ?>
            <tr>
                <td><?= $this->Number->format($sale->id) ?></td>
                <td><?= h($sale->sale_number) ?></td>
                <td><?= $this->Number->format($sale->status) ?></td>
                <td><?= $sale->has('user') ? $this->Html->link($sale->user->id, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?></td>
                <td><?= $sale->has('customer') ? $this->Html->link($sale->customer->name, ['controller' => 'Customers', 'action' => 'view', $sale->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($sale->taxe) ?></td>
                <td><?= $this->Number->format($sale->subtotal) ?></td>
                <td><?= $sale->has('pointofsale') ? $this->Html->link($sale->pointofsale->name, ['controller' => 'Pointofsales', 'action' => 'view', $sale->pointofsale->id]) : '' ?></td>
                <td><?= h($sale->created) ?></td>
                <td><?= h($sale->modified) ?></td>
                <td><?= $this->Number->format($sale->total) ?></td>
                <td><?= $this->Number->format($sale->type) ?></td>
                <td><?= $sale->has('rate') ? $this->Html->link($sale->rate->name, ['controller' => 'Rates', 'action' => 'view', $sale->rate->id]) : '' ?></td>
                <td><?= $this->Number->format($sale->daily_rate) ?></td>
                <td><?= $this->Number->format($sale->percent_discount) ?></td>
                <td><?= $this->Number->format($sale->value_discount) ?></td>
                <td><?= $this->Number->format($sale->monnaie) ?></td>
                <td><?= $this->Number->format($sale->change_rate) ?></td>
                <td><?= h($sale->wholesale) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sale->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sale->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?>
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
