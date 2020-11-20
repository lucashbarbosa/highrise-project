<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MenuItens Model
 *
 * @property \App\Model\Table\MenusTable&\Cake\ORM\Association\BelongsTo $Menus
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\MenuIten newEmptyEntity()
 * @method \App\Model\Entity\MenuIten newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\MenuIten[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MenuIten get($primaryKey, $options = [])
 * @method \App\Model\Entity\MenuIten findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\MenuIten patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MenuIten[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MenuIten|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuIten saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MenuIten[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MenuIten[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\MenuIten[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\MenuIten[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MenuItensTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('menu_itens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id',
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['menu_id'], 'Menus'), ['errorField' => 'menu_id']);
        $rules->add($rules->existsIn(['item_id'], 'Items'), ['errorField' => 'item_id']);

        return $rules;
    }
}
