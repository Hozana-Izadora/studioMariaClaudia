<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id_event
 * @property string|null $summary
 * @property string|null $colorid
 * @property string|null $description
 * @property string|null $htmllink
 * @property string|null $location
 * @property \Cake\I18n\FrozenDate $date
 * @property \Cake\I18n\FrozenTime $time_start
 * @property \Cake\I18n\FrozenTime $time_end
 * @property string|null $google_calendar_event_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\GoogleCalendarEvent $google_calendar_event
 */
class Event extends Entity
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
        '*'=>true,
        'id_event'=>false,
    ];
}
