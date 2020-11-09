<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsSuppliersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsSuppliersTable Test Case
 */
class ProductsSuppliersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsSuppliersTable
     */
    public $ProductsSuppliers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductsSuppliers',
        'app.Products',
        'app.Suppliers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductsSuppliers') ? [] : ['className' => ProductsSuppliersTable::class];
        $this->ProductsSuppliers = TableRegistry::getTableLocator()->get('ProductsSuppliers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsSuppliers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
