<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsSupplier $productsSupplier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Supplier'), ['action' => 'edit', $productsSupplier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Supplier'), ['action' => 'delete', $productsSupplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsSupplier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsSuppliers view large-9 medium-8 columns content">
    <h3><?= h($productsSupplier->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsSupplier->has('product') ? $this->Html->link($productsSupplier->product->name, ['controller' => 'Products', 'action' => 'view', $productsSupplier->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $productsSupplier->has('supplier') ? $this->Html->link($productsSupplier->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $productsSupplier->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sizetype') ?></th>
            <td><?= h($productsSupplier->sizetype) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsSupplier->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($productsSupplier->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pack') ?></th>
            <td><?= $this->Number->format($productsSupplier->pack) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($productsSupplier->size) ?></td>
        </tr>
    </table>
</div>
