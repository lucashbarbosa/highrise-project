<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * MenuItens Controller
 *
 * @method \App\Model\Entity\MenuIten[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuItensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function getByMenu($menuId){

        //TODO: FOCAR AQUI
        // $this->MenuItens
        // ->find('all')
        // ->where(['menu_id = ' => $menuId])
        // ->join([
        //     'table' => 'comments',
        //     'alias' => 'c',
        //     'type' => 'LEFT',
        //     'conditions' => 'c.article_id = articles.id',
        // ]);
        // ->orderBy('');
    }


    public function index()
    {
        $menuItens = $this->paginate($this->MenuItens);

        $this->set(compact('menuItens'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu Iten id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuIten = $this->MenuItens->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('menuIten'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuIten = $this->MenuItens->newEmptyEntity();
        if ($this->request->is('post')) {
            $menuIten = $this->MenuItens->patchEntity($menuIten, $this->request->getData());
            if ($this->MenuItens->save($menuIten)) {
                $this->Flash->success(__('The menu iten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu iten could not be saved. Please, try again.'));
        }
        $this->set(compact('menuIten'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Iten id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuIten = $this->MenuItens->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuIten = $this->MenuItens->patchEntity($menuIten, $this->request->getData());
            if ($this->MenuItens->save($menuIten)) {
                $this->Flash->success(__('The menu iten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu iten could not be saved. Please, try again.'));
        }
        $this->set(compact('menuIten'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Iten id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuIten = $this->MenuItens->get($id);
        if ($this->MenuItens->delete($menuIten)) {
            $this->Flash->success(__('The menu iten has been deleted.'));
        } else {
            $this->Flash->error(__('The menu iten could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
