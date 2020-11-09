<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Size Entity
 *
 * @property int $id
 * @property int $initial_size
 * @property int $type
 * @property int $final_size
 */
class Size extends Entity
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
        'initial_size' => true,
        'type' => true,
        'final_size' => true,
    ];
}
