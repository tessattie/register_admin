<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsSalesFixture
 */
class ProductsSalesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'product_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sale_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'price' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'quantity' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'height' => ['type' => 'decimal', 'length' => 10, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => '0.000000', 'comment' => ''],
        'width' => ['type' => 'decimal', 'length' => 10, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => '0.000000', 'comment' => ''],
        'wholesale' => ['type' => 'decimal', 'length' => 10, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'returned' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_SalesProducts' => ['type' => 'index', 'columns' => ['product_id'], 'length' => []],
            'FK_ProductsSales' => ['type' => 'index', 'columns' => ['sale_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_ProductsSales' => ['type' => 'foreign', 'columns' => ['sale_id'], 'references' => ['sales', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'FK_SalesProducts' => ['type' => 'foreign', 'columns' => ['product_id'], 'references' => ['products', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'product_id' => 1,
                'sale_id' => 1,
                'price' => 1,
                'quantity' => 1,
                'height' => 1.5,
                'width' => 1.5,
                'wholesale' => 1.5,
                'returned' => 1,
            ],
        ];
        parent::init();
    }
}
