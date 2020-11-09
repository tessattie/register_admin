<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Spayments Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RatesTable&\Cake\ORM\Association\BelongsTo $Rates
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 *
 * @method \App\Model\Entity\Spayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Spayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Spayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Spayment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Spayment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Spayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Spayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Spayment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SpaymentsTable extends Table
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

        $this->setTable('spayments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Rates', [
            'foreignKey' => 'rate_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Suppliers', [
            'foreignKey' => 'supplier_id',
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
            ->decimal('amount')
            ->notEmptyString('amount');

        $validator
            ->decimal('daily_rate')
            ->notEmptyString('daily_rate');

        $validator
            ->requirePresence('account', 'create')
            ->notEmptyString('account');

        $validator
            ->scalar('memo')
            ->maxLength('memo', 255)
            ->allowEmptyString('memo');

        $validator
            ->notEmptyString('type');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['rate_id'], 'Rates'));
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));

        return $rules;
    }
}
