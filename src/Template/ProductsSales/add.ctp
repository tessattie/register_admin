<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductsSale $productsSale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products Sales'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Journals'), ['controller' => 'Journals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journal'), ['controller' => 'Journals', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productsSales form large-9 medium-8 columns content">
    <?= $this->Form->create($productsSale) ?>
    <fieldset>
        <legend><?= __('Add Products Sale') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('sale_id', ['options' => $sales]);
            echo $this->Form->control('price');
            echo $this->Form->control('quantity');
            echo $this->Form->control('height');
            echo $this->Form->control('width');
            echo $this->Form->control('wholesale');
            echo $this->Form->control('returned');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
