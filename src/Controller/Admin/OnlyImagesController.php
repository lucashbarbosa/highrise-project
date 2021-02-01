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
class OnlyImagesController extends AppController{

    public $title;
    public $text;



    public function update($data, $id){
        $data = (object) $data;
        $conn  = ConnectionManager::get('default');
        try{
             $conn->execute("UPDATE only_image_table SET text = '$data->text', title = '$data->title' WHERE id = $id");
        }catch(\PDOException $ex){
            return $ex->getMessage();

        }



    }

    public function findOne($id){

        $conn  = ConnectionManager::get('default');
        $page =  $conn->execute("
        SELECT p.name as page_name, p.id as page_id, p.template_content_id, tab.*, t.name as template_name FROM pages p
            INNER JOIN templates t
            ON p.template_id = t.id
            LEFT JOIN only_image_table tab
            ON p.template_content_id = tab.id
            WHERE p.id =" . $id
        )->fetch('assoc');

        $images = $conn->execute(

            "SELECT * FROM images im
            INNER JOIN pages_images pim
            ON pim.image_id = im.id
            WHERE pim.page_id =". $id)->fetchAll('assoc') ;

        $page['images'] = $images;


        if(is_null($page['template_content_id'])){
            return $this->createTemplateContentTable($page);
        }else{
            return $page;
        }

    }

    function createTemplateContentTable($page){
        debug($page);
        $conn  = ConnectionManager::get('default');
        $conn->execute("INSERT INTO only_image_table (text) VALUES (null)");
        $page['template_content_id'] = $conn->execute("SELECT id FROM only_image_table ORDER BY id DESC LIMIT 1")->fetch('assoc')['id'];
        $conn->execute("UPDATE pages SET template_content_id = ". $page['template_content_id'] );

        return $page;
    }

    public function save($page_id){
        $this->disableAutoRender();

        $data = $this->request->getData();



        $images = new ImagesController();
        $file = $_FILES['image'];
        $uploaded = $images->upload($file);

        $page = new PagesController();
        $page->pageImageSave($uploaded[0]['id'], $page_id);

        $this->redirect("admin/pages/edit/only_images/". $page_id);
    }

    function addOrRemove($data, $page){
        $conn  = ConnectionManager::get('default');

        $conn->execute("SELECT * FROM pages WHERE template_content_id WHERE");
    }

}
