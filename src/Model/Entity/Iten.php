<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Iten Entity
 *
 * @property int $id
 * @property string|null $label
 * @property string|null $position
 * @property string|null $type
 * @property string|null $page_id
 *
 * @property \App\Model\Entity\Page $page
 */
class Iten extends Entity
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
        'label' => true,
        'position' => true,
        'type' => true,
        'page_id' => true,
        'page' => true,
    ];
}
