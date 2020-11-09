<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int $rate_id
 * @property int $type
 * @property float $amount
 * @property string|null $comment
 * @property int $pointofsale_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Rate $rate
 * @property \App\Model\Entity\Pointofsale $pointofsale
 */
class Transaction extends Entity
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
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'rate_id' => true,
        'type' => true,
        'amount' => true,
        'comment' => true,
        'pointofsale_id' => true,
        'user' => true,
        'rate' => true,
        'pointofsale' => true,
    ];
}
