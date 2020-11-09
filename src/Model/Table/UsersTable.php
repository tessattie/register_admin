<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\HasMany $Customers
 * @property \App\Model\Table\JournalsTable&\Cake\ORM\Association\HasMany $Journals
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\SalesTable&\Cake\ORM\Association\HasMany $Sales
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\HasMany $Suppliers
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 * @property \App\Model\Table\CardsTable&\Cake\ORM\Association\BelongsToMany $Cards
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Customers', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Journals', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Payments', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Sales', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Suppliers', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsToMany('Cards', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'card_id',
            'joinTable' => 'cards_users',
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
            ->maxLength('name', 150)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('username')
            ->maxLength('username', 150)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->scalar('remember_token')
            ->maxLength('remember_token', 100)
            ->allowEmptyString('remember_token');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }
}
