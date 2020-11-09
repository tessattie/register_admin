<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stock Entity
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $supplier_id
 * @property int $type
 * @property float $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int $status
 * @property float|null $real_quantity
 * @property float|null $cost
 * @property int $rate_id
 * @property float $used
 * @property string $invoice_number
 * @property float $purchase_rate
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Rate $rate
 */
class Stock extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product_id' => true,
        'supplier_id' => true,
        'type' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'status' => true,
        'real_quantity' => true,
        'cost' => true,
        'rate_id' => true,
        'used' => true,
        'invoice_number' => true,
        'purchase_rate' => true,
        'product' => true,
        'supplier' => true,
        'user' => true,
        'rate' => true,
    ];
}
