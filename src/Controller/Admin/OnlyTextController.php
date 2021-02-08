<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Itens Controller
 *
 * @method \App\Model\Entity\Iten[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OnlyTextController extends AppController{

    public $title;
    public $text;



    public function update($data, $id){
        $data = (object) $data;
        $conn  = ConnectionManager::get('default');

        try{
            return $conn->execute("UPDATE only_text_table SET text = '$data->text', title = '$data->title' WHERE id = $id");
        }catch(\PDOException $ex){
            return $ex->getMessage();

        }



    }

    function  verifyOrCreateTemplateContent($page):void{
        $conn = ConnectionManager::get('default');
        $template = $conn->execute("SELECT * FROM pages WHERE id = $page ")->fetch('assoc');

            if($template['template_content_id'] == null){
                $conn->execute("INSERT INTO only_text_table (text) VALUES(null)");

                $id = $conn->execute("SELECT id FROM only_text_table ORDER BY id DESC")->fetch('assoc')['id'];

                $conn->execute("UPDATE pages SET template_content_id = $id WHERE id = $page");
            }
   }



    public function findOne($id){

        $conn  = ConnectionManager::get('default');
        $page =  $conn->execute("
        SELECT p.name as page_name, p.id as page_id, p.template_content_id, tab.*, t.name as template_name FROM pages p
            INNER JOIN templates t
            ON p.template_id = t.id
            LEFT JOIN only_text_table tab
            ON p.template_content_id = tab.id
            WHERE p.id =" . $id
        )->fetch('assoc');


        if((isset($template['template_content_id'])  && $template['template_content_id'] == null)){
            return $this->createTemplateContentTable($page);
        }else{
            return $page;
        }

    }

    function createTemplateContentTable($page){
        debug($page);
        $conn  = ConnectionManager::get('default');
        $conn->execute("INSERT INTO only_text_table (text) VALUES (null)");
        $page['template_content_id'] = $conn->execute("SELECT id FROM only_text_table ORDER BY id DESC LIMIT 1")->fetch('assoc')['id'];
        $conn->execute("UPDATE pages SET template_content_id = ". $page['template_content_id'] );

        return $page;
    }



    function getSpecificInformation($template_info){
        return null;

    }
}
