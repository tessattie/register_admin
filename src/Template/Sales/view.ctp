<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sale'), ['action' => 'edit', $sale->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sale'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pointofsales'), ['controller' => 'Pointofsales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pointofsale'), ['controller' => 'Pointofsales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rates'), ['controller' => 'Rates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rate'), ['controller' => 'Rates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sales view large-9 medium-8 columns content">
    <h3><?= h($sale->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sale Number') ?></th>
            <td><?= h($sale->sale_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $sale->has('user') ? $this->Html->link($sale->user->id, ['controller' => 'Users', 'action' => 'view', $sale->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $sale->has('customer') ? $this->Html->link($sale->customer->name, ['controller' => 'Customers', 'action' => 'view', $sale->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pointofsale') ?></th>
            <td><?= $sale->has('pointofsale') ? $this->Html->link($sale->pointofsale->name, ['controller' => 'Pointofsales', 'action' => 'view', $sale->pointofsale->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $sale->has('rate') ? $this->Html->link($sale->rate->name, ['controller' => 'Rates', 'action' => 'view', $sale->rate->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sale->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($sale->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taxe') ?></th>
            <td><?= $this->Number->format($sale->taxe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subtotal') ?></th>
            <td><?= $this->Number->format($sale->subtotal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($sale->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($sale->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Daily Rate') ?></th>
            <td><?= $this->Number->format($sale->daily_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percent Discount') ?></th>
            <td><?= $this->Number->format($sale->percent_discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value Discount') ?></th>
            <td><?= $this->Number->format($sale->value_discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monnaie') ?></th>
            <td><?= $this->Number->format($sale->monnaie) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Change Rate') ?></th>
            <td><?= $this->Number->format($sale->change_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($sale->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($sale->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wholesale') ?></th>
            <td><?= $sale->wholesale ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Payments') ?></h4>
        <?php if (!empty($sale->payments)): ?>
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
            <?php foreach ($sale->payments as $payments): ?>
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
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($sale->products)): ?>
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
            <?php foreach ($sale->products as $products): ?>
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
</div>
