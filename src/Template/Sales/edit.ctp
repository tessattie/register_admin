<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sales'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pointofsales'), ['controller' => 'Pointofsales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pointofsale'), ['controller' => 'Pointofsales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sales form large-9 medium-8 columns content">
    <?= $this->Form->create($sale) ?>
    <fieldset>
        <legend><?= __('Edit Sale') ?></legend>
        <?php
            echo $this->Form->control('sale_number');
            echo $this->Form->control('status');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('taxe');
            echo $this->Form->control('subtotal');
            echo $this->Form->control('pointofsale_id', ['options' => $pointofsales]);
            echo $this->Form->control('total');
            echo $this->Form->control('type');
            echo $this->Form->control('rate_id', ['options' => $rates]);
            echo $this->Form->control('daily_rate');
            echo $this->Form->control('percent_discount');
            echo $this->Form->control('value_discount');
            echo $this->Form->control('monnaie');
            echo $this->Form->control('change_rate');
            echo $this->Form->control('wholesale');
            echo $this->Form->control('payments._ids', ['options' => $payments]);
            echo $this->Form->control('products._ids', ['options' => $products]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
