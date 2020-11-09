<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int|null $delay
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $area_code
 * @property int $rate_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Rate $rate
 * @property \App\Model\Entity\Journal[] $journals
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Product[] $products
 */
class Supplier extends Entity
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
        'code' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'delay' => true,
        'phone' => true,
        'email' => true,
        'area_code' => true,
        'rate_id' => true,
        'user' => true,
        'rate' => true,
        'journals' => true,
        'orders' => true,
        'products' => true,
        'status' => true,
        'type' => true,
        'address' => true,
        'contact' => true
    ];
}
