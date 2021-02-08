<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\Admin\MenuItensController;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\Menu;
use ArrayObject;

/**
 * Menus Controller
 *
 * @method \App\Model\Entity\Menu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubmenusDtoController extends AppController

{

    public $name;
    public $id;
    public $order;
    public $has_tree = [];
    public $tree;
    public $page_name;
    public $page;
    public $page_id;




    function build($menus)
    {

        $menus = (object) $menus;



        $submenu = new SubmenusDtoController();
        $submenu->name = $menus->submenu_name;
        $submenu->id = $menus->submenu_id;
        $submenu->order = $menus->submenu_order;
        $submenu->has_tree = false;
        $submenu->page_name = $menus->page_name;
        $submenu->tree = $this->buildTree($this->findDeepSubMenu($menus->submenu_id));
        $submenu->page_id = $menus->page_id;


        // debug($submenu); die();

        return $submenu;
    }

    function buildTree($tree){

        $arr = [];
        foreach ($tree as $t){
            $t = (object) $t;
            $submenu = new SubmenusDtoController();
            $submenu->name = $t->submenu_name;
            $submenu->id = $t->submenu_id;
            $submenu->order = $t->submenu_order;
            $submenu->page_name = $t->page_name;
            $submenu->page_id = $t->page_id;
            $arr[] = $submenu;
        }


        return $arr;
    }

    function findDeepSubMenu($submenu_id)
    {
        return $this->getSubmenus($submenu_id);
    }

    function getSubmenus($id)
    {
        $conn = ConnectionManager::get("default");

        return $conn->execute("SELECT  sm.name as submenu_name,
        sm.order as submenu_order,
        sm.tree,
        sm.has_tree,
        sm.id as submenu_id,
        p.name as page_name,
        p.template_id,
        p.template_content_id,
        p.id as page_id

        FROM submenu_tree smt
        INNER JOIN sub_menu sm
        ON smt.submenu_filho = sm.id
        LEFT  JOIN pages p
        ON sm.page_id = p.id
        WHERE submenu_pai = $id")->fetchAll('assoc');
    }


    function add(){
        $this->disableAutoRender();
        $data = (object) $this->request->getData();
        $conn = ConnectionManager::get("default");
        $conn->execute("INSERT INTO sub_menu (name, menu_id, page_id) VALUES ('$data->submenu_name', $data->menu_id, $data->page_id)");
        $addedId = $conn->execute("SELECT id FROM sub_menu WHERE name = '$data->submenu_name' AND menu_id = $data->menu_id AND page_id = $data->page_id")->fetch('assoc')['id'];

        if($data->submenu_pai == "true"){

            $conn->execute("INSERT INTO menu_sub_menus (menu_id, submenu_id) VALUES ($data->submenu_id, $addedId)");
        }else{

            $conn->execute("INSERT INTO submenu_tree (submenu_pai, submenu_filho) VALUES ($data->submenu_id, $addedId)");
        }






        $this->redirect("/admin/menus/edit/". $data->menu_id);

    }


    function removeSubmenu($menuId, $submenuId){
        $this->disableAutoRender();
        $conn = ConnectionManager::get("default");


        $conn->execute("DELETE from submenu_tree WHERE submenu_pai = $menuId AND submenu_filho = $submenuId");


        echo json_encode("deleted");


    }
}
