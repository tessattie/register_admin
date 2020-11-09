<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property int $credit_limit
 * @property string|null $phone
 * @property int $discount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $discount_type
 * @property int $user_id
 * @property string $customer_number
 * @property int $status
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\Product[] $products
 */
class Customer extends Entity
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
        'name' => true,
        'email' => true,
        'credit_limit' => true,
        'phone' => true,
        'discount' => true,
        'created' => true,
        'modified' => true,
        'discount_type' => true,
        'user_id' => true,
        'customer_number' => true,
        'status' => true,
        'user' => true,
        'payments' => true,
        'sales' => true,
        'products' => true,
    ];
}
