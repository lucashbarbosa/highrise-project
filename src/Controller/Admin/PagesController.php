<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

use Cake\Datasource\ConnectionManager;
/**
 * Pages Controller
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{



     public static function findAllPages(){

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
        if($this->request->isPost()){

            $pages = $this->request->getData();
            $conn->insert('pages', $pages);

            echo "ok";


        }else{


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
    public function edit($id = null)
    {
        $conn = ConnectionManager::get('default');

        $page = $conn->execute("SELECT p.*, t.name as template_name, t.id as template_id FROM pages p INNER JOIN templates t ON t.id = p.template_id WHERE p.id = $id")->fetch('assoc');

        $fields = $conn->execute("SELECT f.id, f.field, f.data_type
        FROM templates_fields tf
        INNER JOIN fields f ON tf.field_id = f.id
        WHERE template_id = " . $page['template_id'])->fetchAll('assoc');

        $formdata = ["page" => $page, "fields" => $fields];

        $this->set(compact('formdata'));
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
}
