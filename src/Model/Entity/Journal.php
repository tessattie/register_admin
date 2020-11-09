<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Journal Entity
 *
 * @property int $id
 * @property int|null $orders_product_id
 * @property int $product_id
 * @property int|null $products_sale_id
 * @property int|null $supplier_id
 * @property int $type
 * @property float $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\OrdersProduct $orders_product
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\ProductsSale $products_sale
 * @property \App\Model\Entity\Supplier $supplier
 * @property \App\Model\Entity\User $user
 */
class Journal extends Entity
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
        'orders_product_id' => true,
        'product_id' => true,
        'products_sale_id' => true,
        'supplier_id' => true,
        'type' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'orders_product' => true,
        'product' => true,
        'products_sale' => true,
        'supplier' => true,
        'user' => true,
    ];
}
