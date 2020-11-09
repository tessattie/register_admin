<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stocks Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RatesTable&\Cake\ORM\Association\BelongsTo $Rates
 *
 * @method \App\Model\Entity\Stock get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stock|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stock findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StocksTable extends Table
{

    public $types = array(1 => "Inventaire", 2 => "Réception");
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('stocks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
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

        $validator
            ->notEmptyString('status');

        $validator
            ->decimal('real_quantity')
            ->allowEmptyString('real_quantity');

        $validator
            ->decimal('cost')
            ->allowEmptyString('cost');

        $validator
            ->decimal('used')
            ->notEmptyString('used');

        $validator
            ->scalar('invoice_number')
            ->maxLength('invoice_number', 40)
            ->requirePresence('invoice_number', 'create')
            ->notEmptyString('invoice_number');

        $validator
            ->decimal('purchase_rate')
            ->requirePresence('purchase_rate', 'create')
            ->notEmptyString('purchase_rate');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
