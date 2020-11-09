<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journals'), ['controller' => 'Journals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journal'), ['controller' => 'Journals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Barcode') ?></th>
            <td><?= h($product->barcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $product->has('rate') ? $this->Html->link($product->rate->name, ['controller' => 'Rates', 'action' => 'view', $product->rate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($product->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($product->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Favori') ?></th>
            <td><?= $this->Number->format($product->favori) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($product->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost') ?></th>
            <td><?= $this->Number->format($product->cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wholesale') ?></th>
            <td><?= $this->Number->format($product->wholesale) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier Id') ?></th>
            <td><?= $this->Number->format($product->supplier_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Suppliers') ?></h4>
        <?php if (!empty($product->suppliers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Delay') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Area Code') ?></th>
                <th scope="col"><?= __('Rate Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->suppliers as $suppliers): ?>
            <tr>
                <td><?= h($suppliers->id) ?></td>
                <td><?= h($suppliers->code) ?></td>
                <td><?= h($suppliers->name) ?></td>
                <td><?= h($suppliers->created) ?></td>
                <td><?= h($suppliers->modified) ?></td>
                <td><?= h($suppliers->user_id) ?></td>
                <td><?= h($suppliers->delay) ?></td>
                <td><?= h($suppliers->phone) ?></td>
                <td><?= h($suppliers->email) ?></td>
                <td><?= h($suppliers->area_code) ?></td>
                <td><?= h($suppliers->rate_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Suppliers', 'action' => 'view', $suppliers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliers', 'action' => 'edit', $suppliers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliers', 'action' => 'delete', $suppliers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Customers') ?></h4>
        <?php if (!empty($product->customers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Credit Limit') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Discount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Discount Type') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Customer Number') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->customers as $customers): ?>
            <tr>
                <td><?= h($customers->id) ?></td>
                <td><?= h($customers->name) ?></td>
                <td><?= h($customers->email) ?></td>
                <td><?= h($customers->credit_limit) ?></td>
                <td><?= h($customers->phone) ?></td>
                <td><?= h($customers->discount) ?></td>
                <td><?= h($customers->created) ?></td>
                <td><?= h($customers->modified) ?></td>
                <td><?= h($customers->discount_type) ?></td>
                <td><?= h($customers->user_id) ?></td>
                <td><?= h($customers->customer_number) ?></td>
                <td><?= h($customers->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($product->orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Order Number') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->order_number) ?></td>
                <td><?= h($orders->supplier_id) ?></td>
                <td><?= h($orders->created) ?></td>
                <td><?= h($orders->modified) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sales') ?></h4>
        <?php if (!empty($product->sales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sale Number') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Taxe') ?></th>
                <th scope="col"><?= __('Subtotal') ?></th>
                <th scope="col"><?= __('Pointofsale Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Rate Id') ?></th>
                <th scope="col"><?= __('Daily Rate') ?></th>
                <th scope="col"><?= __('Percent Discount') ?></th>
                <th scope="col"><?= __('Value Discount') ?></th>
                <th scope="col"><?= __('Monnaie') ?></th>
                <th scope="col"><?= __('Change Rate') ?></th>
                <th scope="col"><?= __('Wholesale') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->sales as $sales): ?>
            <tr>
                <td><?= h($sales->id) ?></td>
                <td><?= h($sales->sale_number) ?></td>
                <td><?= h($sales->status) ?></td>
                <td><?= h($sales->user_id) ?></td>
                <td><?= h($sales->customer_id) ?></td>
                <td><?= h($sales->taxe) ?></td>
                <td><?= h($sales->subtotal) ?></td>
                <td><?= h($sales->pointofsale_id) ?></td>
                <td><?= h($sales->created) ?></td>
                <td><?= h($sales->modified) ?></td>
                <td><?= h($sales->total) ?></td>
                <td><?= h($sales->type) ?></td>
                <td><?= h($sales->rate_id) ?></td>
                <td><?= h($sales->daily_rate) ?></td>
                <td><?= h($sales->percent_discount) ?></td>
                <td><?= h($sales->value_discount) ?></td>
                <td><?= h($sales->monnaie) ?></td>
                <td><?= h($sales->change_rate) ?></td>
                <td><?= h($sales->wholesale) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sales', 'action' => 'view', $sales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sales', 'action' => 'edit', $sales->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sales', 'action' => 'delete', $sales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Journals') ?></h4>
        <?php if (!empty($product->journals)): ?>
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
            <?php foreach ($product->journals as $journals): ?>
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
