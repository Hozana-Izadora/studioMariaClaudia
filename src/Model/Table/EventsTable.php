<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \App\Model\Table\GoogleCalendarEventsTable&\Cake\ORM\Association\BelongsTo $GoogleCalendarEvents
 *
 * @method \App\Model\Entity\Event newEmptyEntity()
 * @method \App\Model\Entity\Event newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsTable extends Table
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

        $this->setTable('events');
        $this->setDisplayField('id_event');
        $this->setPrimaryKey('id_event');

        $this->addBehavior('Timestamp');

        
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
            ->integer('id_event')
            ->allowEmptyString('id_event', null, 'create');

        $validator
            ->scalar('summary')
            ->maxLength('summary', 255)
            ->allowEmptyString('summary');

        $validator
            ->scalar('colorid')
            ->maxLength('colorid', 255)
            ->allowEmptyString('colorid');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('htmllink')
            ->maxLength('htmllink', 255)
            ->allowEmptyString('htmllink');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->allowEmptyString('location');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->dateTime('time_start')
            ->requirePresence('time_start', 'create')
            ->notEmptyDateTime('time_start');

        $validator
            ->dateTime('time_end')
            ->requirePresence('time_end', 'create')
            ->notEmptyDateTime('time_end');
        
        $validator
        ->scalar('google_calendar_event_id')
        ->maxLength('google_calendar_event_id', 255)
        ->allowEmptyString('google_calendar_event_id');

        return $validator;
    }

}
