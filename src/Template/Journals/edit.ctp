<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journal $journal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $journal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $journal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Journals'), ['action' => 'index']) ?></li>
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
<div class="journals form large-9 medium-8 columns content">
    <?= $this->Form->create($journal) ?>
    <fieldset>
        <legend><?= __('Edit Journal') ?></legend>
        <?php
            echo $this->Form->control('orders_product_id', ['options' => $ordersProducts, 'empty' => true]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('products_sale_id', ['options' => $productsSales, 'empty' => true]);
            echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true]);
            echo $this->Form->control('type');
            echo $this->Form->control('quantity');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
