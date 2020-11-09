<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Spayment Entity
 *
 * @property int $id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property float $amount
 * @property int $rate_id
 * @property float $daily_rate
 * @property int $supplier_id
 * @property int $account
 * @property string|null $memo
 * @property int $type
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Rate $rate
 * @property \App\Model\Entity\Supplier $supplier
 */
class Spayment extends Entity
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
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'amount' => true,
        'rate_id' => true,
        'daily_rate' => true,
        'supplier_id' => true,
        'account' => true,
        'memo' => true,
        'type' => true,
        'user' => true,
        'rate' => true,
        'supplier' => true,
    ];
}
