<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\Admin\MenuItensController;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\Menu;
/**
 * Menus Controller
 *
 * @method \App\Model\Entity\Menu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenusDtoController extends AppController

{

    public $name;
    public $display_name;
    public $id;
    public $order;
    public $submenus;
    public $page_name;
    public $page_id;




    function build($id){
        $menuDto = $this->getMenuSubmenus($id);

        $menu = new MenusDtoController();

        if(count($menuDto) <= 0){
            $menuDto = $this->getMenu($id);

        }else{
            foreach($menuDto as $submenus){
                $menu->submenus[] = $this->findDeepMenu($submenus);
            }
        }

        $menu->name = $menuDto[0]['menu_name'];
        $menu->display_name = $menuDto[0]['menu_display_name'];
        $menu->id = $menuDto[0]['menu_id'];
        $menu->order = $menuDto[0]['menu_order'];
        $menu->page_name = isset($menuDto[0]['page_name']) ? $menuDto[0]['page_name'] : "" ;
        $menu->page_id = isset($menuDto[0]['page_id']) ? $menuDto[0]['page_id'] : "" ;




        return $menu;
    }

    function findDeepMenu($submenus){

        return (new SubmenusDtoController())->build($submenus);


    }

    function getMenu($id){
        $conn = ConnectionManager::get("default");

        return $conn->execute("SELECT
        name as menu_name,
        display_name as menu_display_name,
        id as menu_id,
        'order' as menu_order
        FROM menu
        WHERE id = $id")->fetchAll('assoc');
    }


    function getMenuSubmenus($id){
        $conn = ConnectionManager::get("default");

        return $conn->execute(
        "SELECT sm.id as submenu_id,
        sm.name as submenu_name,
        sm.order as submenu_order,
        sm.tree,
        sm.has_tree,
        m.name as menu_name,
        m.display_name as
        menu_display_name,
        m.id as menu_id,
        m.order as menu_order,
        p.name as page_name,
        p.template_id,
        p.template_content_id,
        p.id as page_id


        FROM menu_sub_menus msm
        INNER JOIN menu m
        ON msm.menu_id = m.id
        INNER JOIN sub_menu sm
        ON msm.submenu_id = sm.id
        LEFT JOIN pages p
        ON sm.page_id = p.id
        WHERE msm.menu_id = $id")->fetchAll('assoc');



    }




}
