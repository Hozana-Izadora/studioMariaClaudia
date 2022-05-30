<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agendas Model
 *
 * @property \App\Model\Table\AtendimentosTable&\Cake\ORM\Association\HasMany $Atendimentos
 * @property \App\Model\Table\HorariosTable&\Cake\ORM\Association\HasMany $Horarios
 *
 * @method \App\Model\Entity\Agenda newEmptyEntity()
 * @method \App\Model\Entity\Agenda newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Agenda[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agenda get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agenda findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Agenda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agenda[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agenda|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agenda saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agenda[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agenda[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agenda[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agenda[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AgendasTable extends Table
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

        $this->setTable('agendas');
        $this->setDisplayField('data');
        $this->setPrimaryKey('id_agenda');

        $this->addBehavior('Timestamp');

        $this->hasMany('Atendimentos', [
            'foreignKey' => 'agenda_id',
        ]);
        $this->hasMany('Horarios', [
            'foreignKey' => 'agenda_id',
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
            ->integer('id_agenda')
            ->allowEmptyString('id_agenda', null, 'create');

        $validator
            ->date('data')
            ->requirePresence('data', 'create')
            ->notEmptyDate('data');

        $validator
            ->boolean('ativo')
            ->allowEmptyString('ativo');

        return $validator;
    }
}
