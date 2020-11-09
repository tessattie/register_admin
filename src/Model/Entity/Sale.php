<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property string $sale_number
 * @property int $status
 * @property int $user_id
 * @property int $customer_id
 * @property float $taxe
 * @property float $subtotal
 * @property int $pointofsale_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property float $total
 * @property int $type
 * @property int $rate_id
 * @property float $daily_rate
 * @property float $percent_discount
 * @property float $value_discount
 * @property float $monnaie
 * @property int $change_rate
 * @property bool $wholesale
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Pointofsale $pointofsale
 * @property \App\Model\Entity\Rate $rate
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Product[] $products
 */
class Sale extends Entity
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
        'sale_number' => true,
        'status' => true,
        'user_id' => true,
        'customer_id' => true,
        'taxe' => true,
        'subtotal' => true,
        'pointofsale_id' => true,
        'created' => true,
        'modified' => true,
        'total' => true,
        'type' => true,
        'rate_id' => true,
        'daily_rate' => true,
        'percent_discount' => true,
        'value_discount' => true,
        'monnaie' => true,
        'change_rate' => true,
        'wholesale' => true,
        'user' => true,
        'customer' => true,
        'pointofsale' => true,
        'rate' => true,
        'payments' => true,
        'products' => true,
    ];
}
