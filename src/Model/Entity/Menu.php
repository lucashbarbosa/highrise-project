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

    public function find(){
        $conn  = ConnectionManager::get('default');
        return $this->populate($conn->execute("SELECT * FROM menu WHERE name = '$this->name'")->fetchAll('assoc'));

    }
    public function findById($id){
        $conn  = ConnectionManager::get('default');
        return $this->populate($conn->execute("SELECT * FROM menu WHERE id = $id")->fetchAll('assoc'));

    }


    public function populate($menus){

        $i = 0;
        foreach($menus as $menu){


            $menus[$i]['sub_menus'] =  (new SubMenu())->find($menu['id']);

            $i++;
        }


        return $menus;

    }


}
