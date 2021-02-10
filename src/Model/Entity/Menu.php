<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Datasource\ConnectionManager;
use App\controller\Admin\MenusDtoController;
use App\controller\Admin\PagesDtoController;

/**
 * Menu Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 *
 * @property \App\Model\Entity\MenuIten[] $menu_itens
 */
class Menu
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


    public $id;
    public $name;
    public $display_name;
    public $sub_menus;

    public function find()
    {
        $conn  = ConnectionManager::get('default');

        $id = $this->getMenuId();


        $menusDto = new MenusDtoController();

        $menus = $menusDto->build($id);


        foreach ($menus->submenus as $submenu) {

            $pagesDto = new PagesDtoController();

            $submenu->page = $pagesDto->getDeepPage($submenu->page_id);

            foreach ($submenu->tree as $tree) {
                $tree->page = $pagesDto->getDeepPage($tree->page_id);
            }


            $submenu->page['template_info']['specific'] = $pagesDto->getSpecificInformation($submenu->page['template_info']);
        }

        // debug($menus);
        return $menus;
    }

    function getMenuId()
    {

        $conn  = ConnectionManager::get('default');
        $id =  $conn->execute("SELECT id FROM menu WHERE name = '$this->name'")->fetch('assoc');
        if (isset($id['id'])) {
            return $id['id'];
        }

        return false;
    }

    public function findById($id)
    {
        $conn  = ConnectionManager::get('default');
        return $conn->execute("
            SELECT sm.name as submenu_name, sm.order as submenu_order, sm.tree as submenu_tree, sm.has_tree as submenu_hastree,  m.name as menu_name, m.display_name as menu_display_name, m.id as menu_id, m.order as menu_order FROM menu_sub_menus msm
            INNER JOIN menu m
            ON msm.menu_id = m.id
            INNER JOIN sub_menu sm
            ON msm.submenu_id = sm.id
            WHERE msm.menu_id = $id ")->fetchAll('assoc');
    }


    public function populate($menus)
    {

        $i = 0;
        foreach ($menus as $menu) {
            $menus[$i]['sub_menus'] =  (new SubMenu())->find($menu['menu_id']);
            $i++;
        }
        return $menus;
    }
}
