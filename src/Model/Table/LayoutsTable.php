<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Layouts Model
 *
 * @property \App\Model\Table\PagesTable&\Cake\ORM\Association\HasMany $Pages
 *
 * @method \App\Model\Entity\Layout newEmptyEntity()
 * @method \App\Model\Entity\Layout newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Layout[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Layout get($primaryKey, $options = [])
 * @method \App\Model\Entity\Layout findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Layout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Layout[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Layout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Layout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Layout[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Layout[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Layout[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Layout[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LayoutsTable extends Table
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

        $this->setTable('layouts');
        $this->setDisplayField('name');

        $this->hasMany('Pages', [
            'foreignKey' => 'layout_id',
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
            ->allowEmptyString('id');

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->allowEmptyString('path');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        return $validator;
    }
}
