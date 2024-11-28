<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Admin/Messages Controller
 *
 *
 * @method \App\Model\Entity\Admin/Message[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $messages = $this->paginate($this->Messages);

        $this->set(compact('messages'));
    }

    /**
     * View method
     *
     * @param string|null $id Admin/message id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $admin/message = $this->Messages->get($id, [
        //     'contain' => [],
        // ]);

        // $this->set('admin/message', $admin/message);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $admin/message = $this->Admin/Messages->newEntity();
        // if ($this->request->is('post')) {
        //     $admin/message = $this->Admin/Messages->patchEntity($admin/message, $this->request->getData());
        //     if ($this->Admin/Messages->save($admin/message)) {
        //         $this->Flash->success(__('The admin/message has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The admin/message could not be saved. Please, try again.'));
        // }
        // $this->set(compact('admin/message'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin/message id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // $admin/message = $this->Admin/Messages->get($id, [
        //     'contain' => [],
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $admin/message = $this->Admin/Messages->patchEntity($admin/message, $this->request->getData());
        //     if ($this->Admin/Messages->save($admin/message)) {
        //         $this->Flash->success(__('The admin/message has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The admin/message could not be saved. Please, try again.'));
        // }
        // $this->set(compact('admin/message'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin/message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        // $admin/message = $this->Admin/Messages->get($id);
        // if ($this->Admin/Messages->delete($admin/message)) {
        //     $this->Flash->success(__('The admin/message has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The admin/message could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['action' => 'index']);
    }
}
