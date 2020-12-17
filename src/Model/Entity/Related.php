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
class Related
{

    public $id;
    public $text;
    public $sub_menu_id;




    public function find($sub_menu_id){
        $conn  = ConnectionManager::get('default');
        return $this->populate($conn->execute("SELECT * FROM related WHERE sub_menu_id = $sub_menu_id")->fetch('assoc'));

    }



    public function populate($related){

        $arr['name'] =  isset($related['id']) ? $related['id'] : null;
        $arr['text'] =   isset($related['text']) ? $related['text'] : null;
        $arr['sub_menu_id '] =  isset($related['sub_menu_id']) ? $related['sub_menu_id'] : null;

        return $arr;

    }


}
