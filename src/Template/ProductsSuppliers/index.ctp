<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsSupplier[]|\Cake\Collection\CollectionInterface $productsSuppliers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Products Supplier'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsSuppliers index large-9 medium-8 columns content">
    <h3><?= __('Products Suppliers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supplier_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pack') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sizetype') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsSuppliers as $productsSupplier): ?>
            <tr>
                <td><?= $this->Number->format($productsSupplier->id) ?></td>
                <td><?= $productsSupplier->has('product') ? $this->Html->link($productsSupplier->product->name, ['controller' => 'Products', 'action' => 'view', $productsSupplier->product->id]) : '' ?></td>
                <td><?= $productsSupplier->has('supplier') ? $this->Html->link($productsSupplier->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $productsSupplier->supplier->id]) : '' ?></td>
                <td><?= $this->Number->format($productsSupplier->cost) ?></td>
                <td><?= $this->Number->format($productsSupplier->pack) ?></td>
                <td><?= $this->Number->format($productsSupplier->size) ?></td>
                <td><?= h($productsSupplier->sizetype) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productsSupplier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productsSupplier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productsSupplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsSupplier->id)]) ?>
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
