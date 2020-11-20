<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Layout Entity
 *
 * @property int|null $id
 * @property string|null $path
 * @property string|null $type
 * @property string|null $name
 *
 * @property \App\Model\Entity\Page[] $pages
 */
class Layout extends Entity
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
        'id' => true,
        'path' => true,
        'type' => true,
        'name' => true,
        'pages' => true,
    ];
}
