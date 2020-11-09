<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RatesTable&\Cake\ORM\Association\BelongsTo $Rates
 * @property \App\Model\Table\JournalsTable&\Cake\ORM\Association\HasMany $Journals
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\HasMany $Orders
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsToMany $Products
 *
 * @method \App\Model\Entity\Supplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Supplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supplier|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supplier findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SuppliersTable extends Table
{

    public $types = array(1 => "Local", 2 => 'Externe');

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('suppliers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Journals', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->hasMany('ProductsSuppliers', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->hasMany('Spayments', [
            'foreignKey' => 'supplier_id',
        ]);
        $this->belongsToMany('Products', [
            'foreignKey' => 'supplier_id',
            'targetForeignKey' => 'product_id',
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
            ->scalar('code')
            ->maxLength('code', 11)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('delay')
            ->allowEmptyString('delay');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 10)
            ->allowEmptyString('phone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('area_code')
            ->maxLength('area_code', 5)
            ->allowEmptyString('area_code');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
