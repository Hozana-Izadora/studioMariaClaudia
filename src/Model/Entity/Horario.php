<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Horario Entity
 *
 * @property int $id_horario
 * @property \Cake\I18n\Time|null $hora
 * @property int|null $agenda_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Agenda $agenda
 * @property \App\Model\Entity\Atendimento[] $atendimentos
 */
class Horario extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'hora' => true,
        'agenda_id' => true,
        'created' => true,
        'modified' => true,
        'agenda' => true,
        'atendimentos' => true,
    ];
}
