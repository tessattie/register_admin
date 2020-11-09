<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsSupplier $productsSupplier
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productsSupplier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productsSupplier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Products Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsSuppliers form large-9 medium-8 columns content">
    <?= $this->Form->create($productsSupplier) ?>
    <fieldset>
        <legend><?= __('Edit Products Supplier') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('supplier_id', ['options' => $suppliers]);
            echo $this->Form->control('cost');
            echo $this->Form->control('pack');
            echo $this->Form->control('size');
            echo $this->Form->control('sizetype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
