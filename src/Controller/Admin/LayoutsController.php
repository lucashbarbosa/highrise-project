<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Layouts Controller
 *
 * @method \App\Model\Entity\Layout[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LayoutsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $layouts = $this->paginate($this->Layouts);

        $this->set(compact('layouts'));
    }

    /**
     * View method
     *
     * @param string|null $id Layout id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $layout = $this->Layouts->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('layout'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $layout = $this->Layouts->newEmptyEntity();
        if ($this->request->is('post')) {
            $layout = $this->Layouts->patchEntity($layout, $this->request->getData());
            if ($this->Layouts->save($layout)) {
                $this->Flash->success(__('The layout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The layout could not be saved. Please, try again.'));
        }
        $this->set(compact('layout'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Layout id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $layout = $this->Layouts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $layout = $this->Layouts->patchEntity($layout, $this->request->getData());
            if ($this->Layouts->save($layout)) {
                $this->Flash->success(__('The layout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The layout could not be saved. Please, try again.'));
        }
        $this->set(compact('layout'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Layout id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $layout = $this->Layouts->get($id);
        if ($this->Layouts->delete($layout)) {
            $this->Flash->success(__('The layout has been deleted.'));
        } else {
            $this->Flash->error(__('The layout could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
