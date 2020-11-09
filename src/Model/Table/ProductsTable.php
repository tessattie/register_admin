<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\RatesTable&\Cake\ORM\Association\BelongsTo $Rates
 * @property \App\Model\Table\JournalsTable&\Cake\ORM\Association\HasMany $Journals
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsToMany $Customers
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsToMany $Orders
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\BelongsToMany $Sales
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsToMany $Suppliers
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->belongsTo('Rates', [
            'foreignKey' => 'rate_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Journals', [
            'foreignKey' => 'product_id',
        ]);
        $this->hasMany('ProductsSuppliers', [
            'foreignKey' => 'product_id',
        ]);
        $this->belongsToMany('Customers', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'customer_id',
            'joinTable' => 'customers_products',
        ]);
        $this->belongsToMany('Sales', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'sale_id',
            'joinTable' => 'products_sales',
        ]);
        $this->belongsToMany('Suppliers', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'supplier_id',
            'joinTable' => 'products_suppliers',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->numeric('price')
            ->notEmptyString('price');

        $validator
            ->integer('type')
            ->notEmptyString('type');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->notEmptyString('favori');

        $validator
            ->integer('position')
            ->notEmptyString('position');

        $validator
            ->scalar('barcode')
            ->maxLength('barcode', 255)
            ->requirePresence('barcode', 'create')
            ->notEmptyString('barcode');

        $validator
            ->numeric('cost')
            ->notEmptyString('cost');

        $validator
            ->numeric('wholesale')
            ->notEmptyString('wholesale');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['rate_id'], 'Rates'));

        return $rules;
    }
}
