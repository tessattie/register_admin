<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property float $price
 * @property int $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $status
 * @property int $favori
 * @property int $position
 * @property string $barcode
 * @property float $cost
 * @property float $wholesale
 * @property int|null $supplier_id
 * @property int $rate_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Supplier[] $suppliers
 * @property \App\Model\Entity\Rate $rate
 * @property \App\Model\Entity\Journal[] $journals
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Sale[] $sales
 */
class Product extends Entity
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
        'category_id' => true,
        'price' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'favori' => true,
        'position' => true,
        'barcode' => true,
        'cost' => true,
        'wholesale' => true,
        'supplier_id' => true,
        'purchase_limit' => true,
        'stock' => true,
        'rate_id' => true,
        'category' => true,
        'suppliers' => true,
        'rate' => true,
        'journals' => true,
        'customers' => true,
        'orders' => true,
        'sales' => true,
    ];
}
