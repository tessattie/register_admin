<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsSale $productsSale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Products Sale'), ['action' => 'edit', $productsSale->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Products Sale'), ['action' => 'delete', $productsSale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productsSale->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products Sales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Products Sale'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journals'), ['controller' => 'Journals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journal'), ['controller' => 'Journals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productsSales view large-9 medium-8 columns content">
    <h3><?= h($productsSale->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productsSale->has('product') ? $this->Html->link($productsSale->product->name, ['controller' => 'Products', 'action' => 'view', $productsSale->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sale') ?></th>
            <td><?= $productsSale->has('sale') ? $this->Html->link($productsSale->sale->id, ['controller' => 'Sales', 'action' => 'view', $productsSale->sale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productsSale->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($productsSale->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($productsSale->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Height') ?></th>
            <td><?= $this->Number->format($productsSale->height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Width') ?></th>
            <td><?= $this->Number->format($productsSale->width) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wholesale') ?></th>
            <td><?= $this->Number->format($productsSale->wholesale) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Returned') ?></th>
            <td><?= $this->Number->format($productsSale->returned) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Journals') ?></h4>
        <?php if (!empty($productsSale->journals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Orders Product Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Products Sale Id') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productsSale->journals as $journals): ?>
            <tr>
                <td><?= h($journals->id) ?></td>
                <td><?= h($journals->orders_product_id) ?></td>
                <td><?= h($journals->product_id) ?></td>
                <td><?= h($journals->products_sale_id) ?></td>
                <td><?= h($journals->supplier_id) ?></td>
                <td><?= h($journals->type) ?></td>
                <td><?= h($journals->quantity) ?></td>
                <td><?= h($journals->created) ?></td>
                <td><?= h($journals->modified) ?></td>
                <td><?= h($journals->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Journals', 'action' => 'view', $journals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Journals', 'action' => 'edit', $journals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Journals', 'action' => 'delete', $journals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
