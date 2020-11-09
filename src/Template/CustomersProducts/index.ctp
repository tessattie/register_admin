<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomersProduct[]|\Cake\Collection\CollectionInterface $customersProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customers Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customersProducts index large-9 medium-8 columns content">
    <h3><?= __('Customers Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customersProducts as $customersProduct): ?>
            <tr>
                <td><?= $this->Number->format($customersProduct->id) ?></td>
                <td><?= $customersProduct->has('customer') ? $this->Html->link($customersProduct->customer->name, ['controller' => 'Customers', 'action' => 'view', $customersProduct->customer->id]) : '' ?></td>
                <td><?= $customersProduct->has('product') ? $this->Html->link($customersProduct->product->name, ['controller' => 'Products', 'action' => 'view', $customersProduct->product->id]) : '' ?></td>
                <td><?= $this->Number->format($customersProduct->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customersProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customersProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customersProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customersProduct->id)]) ?>
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
