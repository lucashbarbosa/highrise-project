<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Datasource\ConnectionManager;

/**
 * Menu Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 *
 * @property \App\Model\Entity\MenuIten[] $menu_itens
 */
class SubMenu
{

    public $id;
    public $name;
    public $display_name;
    public $template_name;
    public $title;
    public $text;
    public $related;
    public $menu_id;
    public $order;



    public function find($menu_id)
    {
        $conn  = ConnectionManager::get('default');
        return $this->populate($conn->execute("
        SELECT sm.id as submenu_id, sm.name as submenu_name, sm.order as submenu_order, sm.tree, sm.has_tree, sm.page_id, t.id as templates_id, p.template_content_id, t.name as template_name FROM sub_menu sm
        INNER JOIN pages p
        ON sm.page_id = p.id
        INNER JOIN templates t
        ON p.template_id = t.id
        WHERE sm.menu_id = $menu_id
        ORDER BY sm.order ASC")->fetchAll('assoc'));
    }

    public function populateSubMenu($tree){
        $conn  = ConnectionManager::get('default');

        return $this->populate($conn->execute("SELECT sm.id,
        sm.name,
        sm.display_name,
        p.name,
        sm.menu_id,
        sm.order,
        sm.tree,
        sm.has_tree,
        t.name as template_name
        FROM sub_menu sm
        INNER JOIN pages p
        ON sm.page_id = p.id
        INNER JOIN templates t
        ON p.template_id = t.id
        WHERE tree = $tree")->fetchAll('assoc'));
    }


    public function populate($submenus)
    {
        $i = 0;
        foreach ($submenus as $submenu) {

            if($submenu['has_tree']){
               $submenus[$i]['tree_menu'] = $this->populateSubMenu($submenu['id']);
            }
            // $submenus[$i]['related'] = (new Related())->find($submenu['id']);

            $i++;
        }

        // debug($submenus);
        return $submenus;
    }
}
