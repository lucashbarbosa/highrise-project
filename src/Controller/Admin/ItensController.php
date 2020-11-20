<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Itens Controller
 *
 * @method \App\Model\Entity\Iten[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItensController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $itens = $this->paginate($this->Itens);

        $this->set(compact('itens'));
    }

    /**
     * View method
     *
     * @param string|null $id Iten id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $iten = $this->Itens->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('iten'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $iten = $this->Itens->newEmptyEntity();
        if ($this->request->is('post')) {
            $iten = $this->Itens->patchEntity($iten, $this->request->getData());
            if ($this->Itens->save($iten)) {
                $this->Flash->success(__('The iten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iten could not be saved. Please, try again.'));
        }
        $this->set(compact('iten'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Iten id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $iten = $this->Itens->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $iten = $this->Itens->patchEntity($iten, $this->request->getData());
            if ($this->Itens->save($iten)) {
                $this->Flash->success(__('The iten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The iten could not be saved. Please, try again.'));
        }
        $this->set(compact('iten'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Iten id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $iten = $this->Itens->get($id);
        if ($this->Itens->delete($iten)) {
            $this->Flash->success(__('The iten has been deleted.'));
        } else {
            $this->Flash->error(__('The iten could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
