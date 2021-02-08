<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\Admin\MenuItensController;
use App\Controller\Admin\OnlyTextController;
use Cake\Datasource\ConnectionManager;
use App\Model\Entity\Menu;
/**
 * Menus Controller
 *
 * @method \App\Model\Entity\Menu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesDtoController extends AppController

{

    public $name;
    public $template_id;
    public $template_content_id;
    public $id;




    function build($id, $pageName, $template_id,  $template_content_id ){

        $pageDto = new pagesDtoController();
        $pageDto->id = $id;
        $pageDto->name = $pageName;
        $pageDto->template_id = $template_id;
        $pageDto->template_content_id = $template_content_id;

        return $pageDto;

    }

    function getDeepPage($id){

        $conn  = ConnectionManager::get('default');

        $templateInfo = $this->getTemplateInformation($id);



        $templateTableName = $templateInfo['template_name'] . "_table";

        $page = $conn->execute("SELECT * FROM $templateTableName WHERE id = ". $templateInfo['template_content_id'])->fetch('assoc');

        $page['template_info'] = $templateInfo;

        // $this->getSpecificInformation();

        return $page;

    }


    function getTemplateInformation($id){
        $conn = ConnectionManager::get('default');
        return $conn->execute("SELECT p.*, t.name as template_name FROM pages p
        INNER JOIN templates t
        ON p.template_id = t.id
        WHERE p.id = $id")->fetch('assoc');
    }


    function getSpecificInformation($template_info) {

        $dto = (new PagesController)->choose($template_info['template_name']);
        return $dto->getSpecificInformation($template_info);
    }

}
