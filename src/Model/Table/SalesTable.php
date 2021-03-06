<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sales Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\PointofsalesTable&\Cake\ORM\Association\BelongsTo $Pointofsales
 * @property \App\Model\Table\RatesTable&\Cake\ORM\Association\BelongsTo $Rates
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\BelongsToMany $Payments
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\Sale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalesTable extends Table
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

        $this->setTable('sales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Pointofsales', [
            'foreignKey' => 'pointofsale_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Rates', [
            'foreignKey' => 'rate_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'sale_id',
        ]);
        $this->belongsToMany('Payments', [
            'foreignKey' => 'sale_id',
            'targetForeignKey' => 'payment_id',
            'joinTable' => 'payments_sales',
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'sale_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'products_sales',
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
            ->scalar('sale_number')
            ->maxLength('sale_number', 255)
            ->requirePresence('sale_number', 'create')
            ->notEmptyString('sale_number')
            ->add('sale_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->numeric('taxe')
            ->notEmptyString('taxe');

        $validator
            ->decimal('subtotal')
            ->notEmptyString('subtotal');

        $validator
            ->decimal('total')
            ->notEmptyString('total');

        $validator
            ->notEmptyString('type');

        $validator
            ->decimal('daily_rate')
            ->requirePresence('daily_rate', 'create')
            ->notEmptyString('daily_rate');

        $validator
            ->decimal('percent_discount')
            ->notEmptyString('percent_discount');

        $validator
            ->decimal('value_discount')
            ->notEmptyString('value_discount');

        $validator
            ->decimal('monnaie')
            ->notEmptyString('monnaie');

        $validator
            ->notEmptyString('change_rate');

        $validator
            ->boolean('wholesale')
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
        $rules->add($rules->isUnique(['sale_number']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['pointofsale_id'], 'Pointofsales'));
        $rules->add($rules->existsIn(['rate_id'], 'Rates'));

        return $rules;
    }
}
