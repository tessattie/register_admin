<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journal[]|\Cake\Collection\CollectionInterface $journals
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Journal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders Products'), ['controller' => 'OrdersProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Orders Product'), ['controller' => 'OrdersProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products Sales'), ['controller' => 'ProductsSales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Products Sale'), ['controller' => 'ProductsSales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="journals index large-9 medium-8 columns content">
    <h3><?= __('Journals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orders_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('products_sale_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($journals as $journal): ?>
            <tr>
                <td><?= $this->Number->format($journal->id) ?></td>
                <td><?= $journal->has('orders_product') ? $this->Html->link($journal->orders_product->id, ['controller' => 'OrdersProducts', 'action' => 'view', $journal->orders_product->id]) : '' ?></td>
                <td><?= $journal->has('product') ? $this->Html->link($journal->product->name, ['controller' => 'Products', 'action' => 'view', $journal->product->id]) : '' ?></td>
                <td><?= $journal->has('products_sale') ? $this->Html->link($journal->products_sale->id, ['controller' => 'ProductsSales', 'action' => 'view', $journal->products_sale->id]) : '' ?></td>
                <td><?= $journal->has('supplier') ? $this->Html->link($journal->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $journal->supplier->id]) : '' ?></td>
                <td><?= $this->Number->format($journal->type) ?></td>
                <td><?= $this->Number->format($journal->quantity) ?></td>
                <td><?= h($journal->created) ?></td>
                <td><?= h($journal->modified) ?></td>
                <td><?= $journal->has('user') ? $this->Html->link($journal->user->id, ['controller' => 'Users', 'action' => 'view', $journal->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $journal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $journal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $journal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journal->id)]) ?>
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
