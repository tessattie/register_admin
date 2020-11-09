<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $order_number
 * @property int|null $supplier_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int $status
 * @property int $type
 * @property float $fees
 * @property int $rate_id
 * @property float $purchase_rate
 * @property string|null $requisition_number
 * @property int $order_type
 *
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product[] $products
 */
class Order extends Entity
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
        'order_number' => true,
        'supplier_id' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'status' => true,
        'type' => true,
        'fees' => true,
        'rate_id' => true,
        'purchase_rate' => true,
        'requisition_number' => true,
        'order_type' => true,
        'supplier' => true,
        'real_total' => true,
        'user' => true,
        'products' => true,
    ];
}
