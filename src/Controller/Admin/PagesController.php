<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\Admin\only_text_dto;
use App\Controller\Admin\only_images_dto;
use Cake\Datasource\ConnectionManager;

/**
 * Pages Controller
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{


    public $documentTypeDto;



    public static function findAllPages()
    {

        $conn = ConnectionManager::get('default');

        $pages = $conn->execute("SELECT p.*, t.name as template_name, t.id as template_id FROM pages p INNER JOIN templates t ON t.id = p.template_id")->fetchAll('assoc');

        return $pages;
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pages = PagesController::findAllPages();

        $this->set(compact('pages'));
    }

    /**
     * View method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('page'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conn = ConnectionManager::get('default');
        if ($this->request->isPost()) {

            $pages = $this->request->getData();
            $conn->insert('pages', $pages);


            $this->redirect("/admin/pages/index");
        } else {


            $templates = $conn->execute("SELECT * FROM templates")->fetchAll('assoc');

            $this->set(compact('templates'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($documentType = false, $page_id = false, $template_id = false)
    {
        $dto = $this->choose($documentType);

        if ($this->request->isPost()) {
            $data = $this->request->getData();
            $dto->update($data, $template_id);

        }


        $this->request->isPost() ? "" : $dto->verifyOrCreateTemplateContent($page_id);
        $page = $dto->findOne($page_id);
        $this->set(compact('page'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    function upload()
    {
        $this->disableAutoRender();

        $images = new ImagesController();

        $image = $this->request->getUploadedFiles();
        debug($images->upload($_FILES['image']));
    }

    function pageImageSave($image, $page, $title)
    {
        $conn = ConnectionManager::get('default');
        $conn->execute("INSERT INTO pages_images (page_id, image_id, title) VALUES('$page', '$image', '$title')");
    }

    function choose($templateName)
    {

        str_replace("-", "_", $templateName);
        switch ($templateName) {

            case 'only_text':
                return new OnlyTextController();
            case 'only_images':
                return new OnlyImagesController();
            case 'free':
                return new FreeController();
            case 'mosaic':
                return new MosaicController();
        }
    }
}
