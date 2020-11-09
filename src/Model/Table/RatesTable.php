<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rates Model
 *
 * @property \App\Model\Table\ConfigurationsTable&\Cake\ORM\Association\HasMany $Configurations
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\HasMany $Sales
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\HasMany $Suppliers
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\Rate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rate findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RatesTable extends Table
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

        $this->setTable('rates');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Configurations', [
            'foreignKey' => 'rate_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'rate_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'rate_id',
        ]);
        $this->hasMany('Sales', [
            'foreignKey' => 'rate_id',
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'rate_id',
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'rate_id',
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
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->numeric('purchase')
            ->notEmptyString('purchase');

        return $validator;
    }
}
