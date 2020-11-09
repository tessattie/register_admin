<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $status
 * @property string|null $remember_token
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Journal[] $journals
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\Supplier[] $suppliers
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Card[] $cards
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'role_id' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'remember_token' => true,
        'role' => true,
        'customers' => true,
        'journals' => true,
        'orders' => true,
        'payments' => true,
        'sales' => true,
        'suppliers' => true,
        'transactions' => true,
        'cards' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
