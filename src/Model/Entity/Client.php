<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $client_name
 * @property string $client_cpf
 * @property \Cake\I18n\FrozenDate $client_birth
 * @property string $client_phone
 * @property string $client_email
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 */
class Client extends Entity
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
        'client_name' => true,
        'client_cpf' => true,
        'client_birth' => true,
        'client_phone' => true,
        'client_email' => true,
        'created' => true,
        'modified' => true,
    ];
}
