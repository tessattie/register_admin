<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StocksFixture
 */
class StocksFixture extends TestFixture
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
        'supplier_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'quantity' => ['type' => 'decimal', 'length' => 20, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '3', 'comment' => '', 'precision' => null],
        'real_quantity' => ['type' => 'decimal', 'length' => 20, 'precision' => 6, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'cost' => ['type' => 'decimal', 'length' => 20, 'precision' => 6, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'rate_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'used' => ['type' => 'decimal', 'length' => 20, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => '0.000000', 'comment' => ''],
        'invoice_number' => ['type' => 'string', 'length' => 40, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'purchase_rate' => ['type' => 'decimal', 'length' => 20, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'product_id' => ['type' => 'index', 'columns' => ['product_id'], 'length' => []],
            'rate_id' => ['type' => 'index', 'columns' => ['rate_id'], 'length' => []],
            'supplier_id' => ['type' => 'index', 'columns' => ['supplier_id'], 'length' => []],
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'stocks_ibfk_1' => ['type' => 'foreign', 'columns' => ['product_id'], 'references' => ['products', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stocks_ibfk_2' => ['type' => 'foreign', 'columns' => ['rate_id'], 'references' => ['rates', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stocks_ibfk_3' => ['type' => 'foreign', 'columns' => ['supplier_id'], 'references' => ['suppliers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'stocks_ibfk_4' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'supplier_id' => 1,
                'type' => 1,
                'quantity' => 1.5,
                'created' => '2020-10-07 15:04:16',
                'modified' => '2020-10-07 15:04:16',
                'user_id' => 1,
                'status' => 1,
                'real_quantity' => 1.5,
                'cost' => 1.5,
                'rate_id' => 1,
                'used' => 1.5,
                'invoice_number' => 'Lorem ipsum dolor sit amet',
                'purchase_rate' => 1.5,
            ],
        ];
        parent::init();
    }
}
