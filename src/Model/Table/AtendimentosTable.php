<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Atendimentos Model
 *
 * @property \App\Model\Table\AgendasTable&\Cake\ORM\Association\BelongsTo $Agendas
 * @property \App\Model\Table\HorariosTable&\Cake\ORM\Association\BelongsTo $Horarios
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\Atendimento newEmptyEntity()
 * @method \App\Model\Entity\Atendimento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Atendimento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Atendimento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Atendimento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendimento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Atendimento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AtendimentosTable extends Table
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

        $this->setTable('atendimentos');
        $this->setDisplayField('id_atendimento');
        $this->setPrimaryKey('id_atendimento');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Agendas', [
            'foreignKey' => 'agenda_id',
        ]);
        $this->belongsTo('Horarios', [
            'foreignKey' => 'horario_id',
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
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
            ->integer('id_atendimento')
            ->allowEmptyString('id_atendimento', null, 'create');

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
        $rules->add($rules->existsIn(['horario_id'], 'Horarios'), ['errorField' => 'horario_id']);
        $rules->add($rules->existsIn(['client_id'], 'Clients'), ['errorField' => 'client_id']);
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
