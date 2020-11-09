<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Journals Model
 *
 * @property \App\Model\Table\OrdersProductsTable&\Cake\ORM\Association\BelongsTo $OrdersProducts
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\ProductsSalesTable&\Cake\ORM\Association\BelongsTo $ProductsSales
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Journal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Journal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Journal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Journal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Journal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Journal findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JournalsTable extends Table
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

        $this->setTable('journals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('OrdersProducts', [
            'foreignKey' => 'orders_product_id',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ProductsSales', [
            'foreignKey' => 'products_sale_id',
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->decimal('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

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
        $rules->add($rules->existsIn(['orders_product_id'], 'OrdersProducts'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['products_sale_id'], 'ProductsSales'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
