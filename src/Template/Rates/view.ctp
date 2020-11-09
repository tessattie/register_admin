<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rate $rate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rate'), ['action' => 'edit', $rate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rate'), ['action' => 'delete', $rate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Configurations'), ['controller' => 'Configurations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Configuration'), ['controller' => 'Configurations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales'), ['controller' => 'Sales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sale'), ['controller' => 'Sales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transactions'), ['controller' => 'Transactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction'), ['controller' => 'Transactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rates view large-9 medium-8 columns content">
    <h3><?= h($rate->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($rate->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($rate->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase') ?></th>
            <td><?= $this->Number->format($rate->purchase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rate->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Configurations') ?></h4>
        <?php if (!empty($rate->configurations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Logo') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Website') ?></th>
                <th scope="col"><?= __('Checks') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Rate Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rate->configurations as $configurations): ?>
            <tr>
                <td><?= h($configurations->id) ?></td>
                <td><?= h($configurations->name) ?></td>
                <td><?= h($configurations->logo) ?></td>
                <td><?= h($configurations->address) ?></td>
                <td><?= h($configurations->phone) ?></td>
                <td><?= h($configurations->website) ?></td>
                <td><?= h($configurations->checks) ?></td>
                <td><?= h($configurations->email) ?></td>
                <td><?= h($configurations->rate_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Configurations', 'action' => 'view', $configurations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Configurations', 'action' => 'edit', $configurations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Configurations', 'action' => 'delete', $configurations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configurations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Payments') ?></h4>
        <?php if (!empty($rate->payments)): ?>
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
            <?php foreach ($rate->payments as $payments): ?>
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
        <?php if (!empty($rate->products)): ?>
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
            <?php foreach ($rate->products as $products): ?>
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
        <h4><?= __('Related Sales') ?></h4>
        <?php if (!empty($rate->sales)): ?>
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
            <?php foreach ($rate->sales as $sales): ?>
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
        <h4><?= __('Related Suppliers') ?></h4>
        <?php if (!empty($rate->suppliers)): ?>
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
            <?php foreach ($rate->suppliers as $suppliers): ?>
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
        <h4><?= __('Related Transactions') ?></h4>
        <?php if (!empty($rate->transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Rate Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Pointofsale Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($rate->transactions as $transactions): ?>
            <tr>
                <td><?= h($transactions->id) ?></td>
                <td><?= h($transactions->created) ?></td>
                <td><?= h($transactions->modified) ?></td>
                <td><?= h($transactions->user_id) ?></td>
                <td><?= h($transactions->rate_id) ?></td>
                <td><?= h($transactions->type) ?></td>
                <td><?= h($transactions->amount) ?></td>
                <td><?= h($transactions->comment) ?></td>
                <td><?= h($transactions->pointofsale_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
