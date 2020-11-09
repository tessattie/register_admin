<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesFixture
 */
class SalesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sale_number' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'taxe' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'subtotal' => ['type' => 'decimal', 'length' => 20, 'precision' => 10, 'unsigned' => false, 'null' => false, 'default' => '0.0000000000', 'comment' => ''],
        'pointofsale_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'total' => ['type' => 'decimal', 'length' => 10, 'precision' => 0, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'type' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'rate_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'daily_rate' => ['type' => 'decimal', 'length' => 10, 'precision' => 3, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'percent_discount' => ['type' => 'decimal', 'length' => 10, 'precision' => 3, 'unsigned' => false, 'null' => false, 'default' => '0.000', 'comment' => ''],
        'value_discount' => ['type' => 'decimal', 'length' => 10, 'precision' => 3, 'unsigned' => false, 'null' => false, 'default' => '0.000', 'comment' => ''],
        'monnaie' => ['type' => 'decimal', 'length' => 20, 'precision' => 6, 'unsigned' => false, 'null' => false, 'default' => '0.000000', 'comment' => ''],
        'change_rate' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'wholesale' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_salesCustomers' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
            'FK_salesPOS' => ['type' => 'index', 'columns' => ['pointofsale_id'], 'length' => []],
            'FK_salesUsers' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'rate_id' => ['type' => 'index', 'columns' => ['rate_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'sale_number' => ['type' => 'unique', 'columns' => ['sale_number'], 'length' => []],
            'FK_salesCustomers' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_salesPOS' => ['type' => 'foreign', 'columns' => ['pointofsale_id'], 'references' => ['pointofsales', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_salesUsers' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'sales_ibfk_1' => ['type' => 'foreign', 'columns' => ['rate_id'], 'references' => ['rates', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'sale_number' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'user_id' => 1,
                'customer_id' => 1,
                'taxe' => 1,
                'subtotal' => 1.5,
                'pointofsale_id' => 1,
                'created' => '2020-09-23 14:22:11',
                'modified' => '2020-09-23 14:22:11',
                'total' => 1.5,
                'type' => 1,
                'rate_id' => 1,
                'daily_rate' => 1.5,
                'percent_discount' => 1.5,
                'value_discount' => 1.5,
                'monnaie' => 1.5,
                'change_rate' => 1,
                'wholesale' => 1,
            ],
        ];
        parent::init();
    }
}
