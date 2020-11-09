<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Configuration Entity
 *
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $website
 * @property string|null $checks
 * @property string|null $email
 * @property int $rate_id
 *
 * @property \App\Model\Entity\Rate $rate
 */
class Configuration extends Entity
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
        'logo' => true,
        'address' => true,
        'phone' => true,
        'website' => true,
        'checks' => true,
        'email' => true,
        'rate_id' => true,
        'enter_rate_id' => true,
        'rate' => true
    ];
}
