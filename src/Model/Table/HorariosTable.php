<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horarios Model
 *
 * @property \App\Model\Table\AgendasTable&\Cake\ORM\Association\BelongsTo $Agendas
 * @property \App\Model\Table\AtendimentosTable&\Cake\ORM\Association\HasMany $Atendimentos
 *
 * @method \App\Model\Entity\Horario newEmptyEntity()
 * @method \App\Model\Entity\Horario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Horario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Horario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Horario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Horario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Horario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Horario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Horario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Horario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Horario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HorariosTable extends Table
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

        $this->setTable('horarios');
        $this->setDisplayField('hora');
        $this->setPrimaryKey('id_horario');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Agendas', [
            'foreignKey' => 'agenda_id',
        ]);
        $this->hasMany('Atendimentos', [
            'foreignKey' => 'horario_id',
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
            ->integer('id_horario')
            ->allowEmptyString('id_horario', null, 'create');

        $validator
            ->time('hora')
            ->allowEmptyTime('hora');

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
        $rules->add($rules->existsIn(['agenda_id'], 'Agendas'), ['errorField' => 'agenda_id']);

        return $rules;
    }
}
