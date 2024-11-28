<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Admin/Blogs Controller
 *
 *
 * @method \App\Model\Entity\Admin/Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $blogs = $this->paginate($this->Blogs);

        $this->set(compact('blogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Admin/blog id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => [],
        ]);

        $this->set('admin/blog', $blog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blog = $this->Blogs->newEntity();
        if ($this->request->is('post')) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->getData());
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The admin/blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin/blog could not be saved. Please, try again.'));
        }
        $this->set(compact('admin/blog'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin/blog id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->getData());
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The admin/blog has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin/blog could not be saved. Please, try again.'));
        }
        $this->set(compact('admin/blog'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin/blog id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success(__('The admin/blog has been deleted.'));
        } else {
            $this->Flash->error(__('The admin/blog could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
