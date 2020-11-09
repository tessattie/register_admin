<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($customer->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $customer->has('user') ? $this->Html->link($customer->user->id, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Number') ?></th>
            <td><?= h($customer->customer_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Credit Limit') ?></th>
            <td><?= $this->Number->format($customer->credit_limit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($customer->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Type') ?></th>
            <td><?= $this->Number->format($customer->discount_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($customer->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($customer->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Favori') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Barcode') ?></th>
                <th scope="col"><?= __('Cost') ?></th>
                <th scope="col"><?= __('Wholesale') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Rate Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->name) ?></td>
                <td><?= h($products->category_id) ?></td>
                <td><?= h($products->price) ?></td>
                <td><?= h($products->type) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td><?= h($products->status) ?></td>
                <td><?= h($products->favori) ?></td>
                <td><?= h($products->position) ?></td>
                <td><?= h($products->barcode) ?></td>
                <td><?= h($products->cost) ?></td>
                <td><?= h($products->wholesale) ?></td>
                <td><?= h($products->supplier_id) ?></td>
                <td><?= h($products->rate_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Payments') ?></h4>
        <?php if (!empty($customer->payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sale Id') ?></th>
                <th scope="col"><?= __('Method Id') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Rate Id') ?></th>
                <th scope="col"><?= __('Daily Rate') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Memo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->payments as $payments): ?>
            <tr>
                <td><?= h($payments->id) ?></td>
                <td><?= h($payments->sale_id) ?></td>
                <td><?= h($payments->method_id) ?></td>
                <td><?= h($payments->amount) ?></td>
                <td><?= h($payments->user_id) ?></td>
                <td><?= h($payments->created) ?></td>
                <td><?= h($payments->modified) ?></td>
                <td><?= h($payments->description) ?></td>
                <td><?= h($payments->rate_id) ?></td>
                <td><?= h($payments->daily_rate) ?></td>
                <td><?= h($payments->customer_id) ?></td>
                <td><?= h($payments->memo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Payments', 'action' => 'edit', $payments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payments', 'action' => 'delete', $payments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sales') ?></h4>
        <?php if (!empty($customer->sales)): ?>
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
            <?php foreach ($customer->sales as $sales): ?>
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
</div>
