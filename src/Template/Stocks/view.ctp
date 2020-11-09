<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stock'), ['action' => 'edit', $stock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stock'), ['action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stocks view large-9 medium-8 columns content">
    <h3><?= h($stock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $stock->has('product') ? $this->Html->link($stock->product->name, ['controller' => 'Products', 'action' => 'view', $stock->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $stock->has('supplier') ? $this->Html->link($stock->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $stock->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $stock->has('user') ? $this->Html->link($stock->user->id, ['controller' => 'Users', 'action' => 'view', $stock->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $stock->has('rate') ? $this->Html->link($stock->rate->name, ['controller' => 'Rates', 'action' => 'view', $stock->rate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Invoice Number') ?></th>
            <td><?= h($stock->invoice_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($stock->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($stock->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($stock->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Real Quantity') ?></th>
            <td><?= $this->Number->format($stock->real_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($stock->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Used') ?></th>
            <td><?= $this->Number->format($stock->used) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Rate') ?></th>
            <td><?= $this->Number->format($stock->purchase_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($stock->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($stock->modified) ?></td>
        </tr>
    </table>
</div>
