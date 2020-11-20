<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Layout Controller
 *
 * @method \App\Model\Entity\Layout[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LayoutController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $layout = $this->paginate($this->Layout);

        $this->set(compact('layout'));
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
        $layout = $this->Layout->get($id, [
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
        $layout = $this->Layout->newEmptyEntity();
        if ($this->request->is('post')) {
            $layout = $this->Layout->patchEntity($layout, $this->request->getData());
            if ($this->Layout->save($layout)) {
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
        $layout = $this->Layout->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $layout = $this->Layout->patchEntity($layout, $this->request->getData());
            if ($this->Layout->save($layout)) {
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
        $layout = $this->Layout->get($id);
        if ($this->Layout->delete($layout)) {
            $this->Flash->success(__('The layout has been deleted.'));
        } else {
            $this->Flash->error(__('The layout could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
