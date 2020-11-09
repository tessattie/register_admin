<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsSuppliers Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\SuppliersTable&\Cake\ORM\Association\BelongsTo $Suppliers
 *
 * @method \App\Model\Entity\ProductsSupplier get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsSupplier newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductsSupplier[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsSupplier|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsSupplier saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsSupplier patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsSupplier[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsSupplier findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsSuppliersTable extends Table
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

        $this->setTable('products_suppliers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
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
            ->numeric('cost')
            ->allowEmptyString('cost');

        $validator
            ->numeric('pack')
            ->allowEmptyString('pack');

        $validator
            ->numeric('size')
            ->allowEmptyString('size');

        $validator
            ->scalar('sizetype')
            ->maxLength('sizetype', 10)
            ->allowEmptyString('sizetype');

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
        $rules->add($rules->existsIn(['supplier_id'], 'Suppliers'));

        return $rules;
    }
}
