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

    public function save($page_id, $template_id)
    {
        $this->disableAutoRender();

        $title = $this->request->getData()['title'];
        $text = $this->request->getData()['text'];
        $coverText = $this->request->getData()['cover_text'];
        // $coverPhotoUrl = $this->request->getData()['cover_photo_url'];
        $conn  = ConnectionManager::get('default');
        $conn->execute("UPDATE mosaic_table
        SET title = '$title'  WHERE id = $template_id ");



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

            $this->updateMosaicPhoto($url, $template_id);


        }

        $conn->execute("UPDATE mosaic
                        SET
                        title = '$title',
                        text = '$text',
                        cover_text = '$coverText'
                        WHERE mosaic_table_id = $template_id ");

        $this->redirect("admin/pages/edit/mosaic/" . $page_id);
    }

    function updateMosaicPhoto($url, $template_id){
        $conn  = ConnectionManager::get('default');
        $conn->execute("UPDATE mosaic
        SET
        cover_photo_url = '$url';
        WHERE mosaic_table_id = $template_id ");

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
        SELECT m.*, p.name as page_name, p.id as page_id, p.template_content_id, tab.*, t.name as template_name FROM pages p
        INNER JOIN templates t
        ON p.template_id = t.id
        LEFT JOIN mosaic_table tab
        ON p.template_content_id = tab.id
        INNER JOIN mosaic m
        ON tab.id = m.mosaic_table_id
        WHERE p.id =" . $id
        )->fetch('assoc');

        $images = $conn->execute(

            "SELECT * FROM images im
        LEFT JOIN pages_images pim
        ON pim.image_id = im.id
        "
        )->fetchAll('assoc');

        $page['images'] = $images;


        if (is_null($page['template_content_id'])) {
            return $this->createTemplateContentTable($page);
        } else {
            return $page;
        }
    }

    function createTemplateContentTable($page)
    {

        $conn  = ConnectionManager::get('default');
        $conn->execute("INSERT INTO mosaic_table (text) VALUES (null)");
        $page['template_content_id'] = $conn->execute("SELECT id FROM mosaic_table ORDER BY id DESC LIMIT 1")->fetch('assoc')['id'];
        $conn->execute("UPDATE pages SET template_content_id = " . $page['template_content_id']);

        return $page;
    }



    function getSpecificInformation($template_info)
    {
        return null;
    }
}
