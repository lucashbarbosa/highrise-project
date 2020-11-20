<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $title
 * @property string|null $content
 * @property string|null $layout_id
 *
 * @property \App\Model\Entity\Layout $layout
 * @property \App\Model\Entity\Iten[] $itens
 */
class Page extends Entity
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
        'name' => true,
        'type' => true,
        'title' => true,
        'content' => true,
        'layout_id' => true,
        'layout' => true,
        'itens' => true,
    ];
}
