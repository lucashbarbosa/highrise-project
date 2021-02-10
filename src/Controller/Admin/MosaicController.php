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
class MosaicController extends AppController
{

    public $title;
    public $text;



    public function update($data, $id)
    {
        $data = (object) $data;
        $conn  = ConnectionManager::get('default');

        try {
            return $conn->execute("UPDATE mosaic_table SET text = '$data->text', title = '$data->title' WHERE id = $id");
        } catch (\PDOException $ex) {
            return $ex->getMessage();
        }
    }


    public function addNewItem($mosaicId)
    {
        $title = $this->request->getData()['title'];
        $text = $this->request->getData()['text'];
        $coverText = $this->request->getData()['cover_text'];
    }

    public function save($page_id, $template_id, $new = false)
    {
        $this->disableAutoRender();

        $title = $this->request->getData()['title'];
        $text = $this->request->getData()['text'];
        $mosaic_id = isset($this->request->getData()['mosaic-id']) ? $this->request->getData()['mosaic-id'] : false ;
        $coverText = $this->request->getData()['cover_text'];
        $conn  = ConnectionManager::get('default');




        $images = new ImagesController();
        $image = isset($_FILES['image']) ? $_FILES['image'] : null;


        if ($image != null && $image['error'] == 0) {
            $uploaded = $images->upload($image);
            $page = new PagesController();
            $imageId = $uploaded[0]['id'];
            $page->pageImageSave($imageId, $page_id, "");


            $url = $conn->execute("SELECT i.url FROM pages_images pim
            INNER JOIN images i
            ON i.id = pim.image_id
            WHERE page_id = $page_id AND image_id = $imageId ORDER BY pim.id DESC LIMIT 1")->fetch('assoc')['url'];



            if (!$new) {
                $this->updateMosaicPhoto($url, $mosaic_id);
            }
        }
        if ($new) {
            $conn->execute("INSERT INTO mosaic (title, text, cover_text, mosaic_table_id, cover_photo_url) VALUES ('$title', '$text', '$coverText', '$template_id', '$url' )");
        } else {
            $conn->execute("UPDATE mosaic
                        SET
                        title = '$title',
                        text = '$text',
                        cover_text = '$coverText'
                        WHERE id = $mosaic_id");
        }
        $this->redirect("admin/pages/edit/mosaic/" . $page_id);
    }



    function updateMosaicPhoto($url, $mosaic_id)
    {

        $conn  = ConnectionManager::get('default');
        $conn->execute("UPDATE mosaic
        SET
        cover_photo_url = '$url'
        WHERE id = $mosaic_id ");
    }


    function  verifyOrCreateTemplateContent($page): void
    {

        $conn = ConnectionManager::get('default');
        $template = $conn->execute("SELECT * FROM pages WHERE id = $page ")->fetch('assoc');

        if ($template['template_content_id'] == null) {
            $conn->execute("INSERT INTO mosaic_table (title) VALUES(null)");

            $id = $conn->execute("SELECT id FROM mosaic_table ORDER BY id DESC")->fetch('assoc')['id'];
            $conn->execute("INSERT INTO mosaic (mosaic_table_id) VALUES($id)");
            $conn->execute("UPDATE pages SET template_content_id = $id WHERE id = $page");
        }
    }



    public function findOne($id)
    {

        $conn  = ConnectionManager::get('default');
        $page =  $conn->execute(
            "
        SELECT  p.name as page_name, p.id as page_id, p.template_content_id, tab.*, t.name as template_name FROM pages p
        INNER JOIN templates t
        ON p.template_id = t.id
        LEFT JOIN mosaic_table tab
        ON p.template_content_id = tab.id
        INNER JOIN mosaic m
        ON tab.id = m.mosaic_table_id
        WHERE p.id =" . $id
        )->fetch('assoc');




        if($page){
            if (is_null($page['template_content_id'])) {
                $mosaic = $this->createTemplateContentTable($page);
            } else {
                $mosaic =  $page;
            }

            $mosaic['itens'] = $conn->execute("SELECT * FROM mosaic WHERE mosaic_table_id = " . $mosaic['template_content_id'])->fetchAll('assoc');
        }else{
            $mosaic["template_name"] = "mosaic" ;
            $mosaic['$page_id'] = $id;
            $mosaic = $this->createTemplateContentTable($id);
        }






        // $images = $conn->execute(
        // "SELECT * FROM images im
        // LEFT JOIN pages_images pim
        // ON pim.image_id = im.id
        // "
        // )->fetchAll('assoc');

        // $page['images'] = $images;

        return $mosaic;
    }

    function createTemplateContentTable($page)
    {

        $conn  = ConnectionManager::get('default');
        $conn->execute("INSERT INTO mosaic_table (text) VALUES (null)");
        $page['template_content_id'] = $conn->execute("SELECT id FROM mosaic_table ORDER BY id DESC LIMIT 1")->fetch('assoc')['id'];
        $conn->execute("UPDATE pages SET template_content_id = " . $page['template_content_id']);
        $conn->execute("INSERT INTO mosaic (mosaic_table_id)  VALUES( " . $page['template_content_id']) . ")";
        $page['item'] = $conn->execute("SELECT  FROM mosaic ORDER BY id DESC LIMIT 1")->fetch('assoc');

        return $page;
    }



    function getSpecificInformation($template_info)
    {
        $conn  = ConnectionManager::get('default');
        return $conn->execute("SELECT * FROM mosaic WHERE mosaic_table_id = " . $template_info['template_content_id'])->fetchAll('assoc');
    }
}
