<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journal $journal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Journal'), ['action' => 'edit', $journal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Journal'), ['action' => 'delete', $journal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Journals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journal'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders Products'), ['controller' => 'OrdersProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orders Product'), ['controller' => 'OrdersProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products Sales'), ['controller' => 'ProductsSales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Sale'), ['controller' => 'ProductsSales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="journals view large-9 medium-8 columns content">
    <h3><?= h($journal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Orders Product') ?></th>
            <td><?= $journal->has('orders_product') ? $this->Html->link($journal->orders_product->id, ['controller' => 'OrdersProducts', 'action' => 'view', $journal->orders_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $journal->has('product') ? $this->Html->link($journal->product->name, ['controller' => 'Products', 'action' => 'view', $journal->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Products Sale') ?></th>
            <td><?= $journal->has('products_sale') ? $this->Html->link($journal->products_sale->id, ['controller' => 'ProductsSales', 'action' => 'view', $journal->products_sale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $journal->has('supplier') ? $this->Html->link($journal->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $journal->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $journal->has('user') ? $this->Html->link($journal->user->id, ['controller' => 'Users', 'action' => 'view', $journal->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($journal->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($journal->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($journal->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($journal->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($journal->modified) ?></td>
        </tr>
    </table>
</div>
