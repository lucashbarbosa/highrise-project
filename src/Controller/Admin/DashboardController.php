<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\ConnectionManager;
/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{


    public function beforeFilter(EventInterface $event){
        parent::beforeFilter($event);

        //  $this->populateDashboard();

    }
   function index(){

   }

   function populateDashboard(){
    $conn  = ConnectionManager::get('default');
    $menus = $conn->execute("SELECT * FROM menu")->fetchAll('assoc');
    $templates = $conn->execute("SELECT * FROM templates")->fetchAll('assoc');
    $submenus = $conn->execute("SELECT * FROM sub_menu")->fetchAll('assoc');

    return ["menus" => $menus, "templates" => $templates, "submenus" => $submenus];

    // $this->set(compact('menus'));

   }
}
