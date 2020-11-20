<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Itens Model
 *
 * @property \App\Model\Table\PagesTable&\Cake\ORM\Association\BelongsTo $Pages
 *
 * @method \App\Model\Entity\Iten newEmptyEntity()
 * @method \App\Model\Entity\Iten newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Iten[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Iten get($primaryKey, $options = [])
 * @method \App\Model\Entity\Iten findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Iten patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Iten[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Iten|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Iten saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Iten[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Iten[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Iten[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Iten[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ItensTable extends Table
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

        $this->setTable('itens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pages', [
            'foreignKey' => 'page_id',
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

        $validator
            ->scalar('label')
            ->maxLength('label', 255)
            ->allowEmptyString('label');

        $validator
            ->scalar('position')
            ->maxLength('position', 255)
            ->allowEmptyString('position');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');

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
        $rules->add($rules->existsIn(['page_id'], 'Pages'), ['errorField' => 'page_id']);

        return $rules;
    }
}
