<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
/**
 * Admin/Auth Controller
 *
 *
 * @method \App\Model\Entity\Admin/Auth[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        // $admin = $this->paginate($this->Admin/Auth);
        if($this->request->is("post")){
            $validator = new Validator();
            $validator->requirePresence('email')
            ->notEmpty("email","Email is required")
                ->add('email', 'validFormat', [
                    'rule' => 'email',
                    'message' => 'E-mail must be valid'
                ])
                ->requirePresence('password')
                ->notEmpty('password','Please provide password');
            $errors = $validator->validate($this->request->getData());
            if(!empty($errors)){
                $this->set(compact('errors'));
            }else{
                $user = $this->Auth->identify();
                if($user){
                    $rolesTable = TableRegistry::getTableLocator()->get("Roles");
                    $role = $rolesTable->find()->where(["name"=>ADMIN_ROLE])->first();
                    
                    if($user['role_id'] == $role->id && $user['is_verified'] == IS_VERIFIED){
                        $this->Auth->setUser($user);
                        return $this->redirect(['prefix' => 'admin', 'controller' => 'Admin', 'action' => 'index']);
                    }else{
                        $this->Flash->error('Your username or password is incorrect.');
                    }
                    
                    $users = TableRegistry::getTableLocator()->get("Users");

                }else{
                    $this->Flash->error('Your username or password is incorrect.');
                }
                
            }        
            
        }
        // $this->set(compact('admin/auth'));
        $this->layout = false;
        $admin = 'login';
        $this->set(compact('admin'));
    }
    public function logout(){
        $this->Auth->logout();
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
    /**
     * View method
     *
     * @param string|null $id Admin/auth id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admin = $this->Admin->get($id, [
            'contain' => [],
        ]);

        $this->set('admin/auth', $admin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admin = $this->Admin->newEntity();
        if ($this->request->is('post')) {
            $admin = $this->Admin->patchEntity($admin, $this->request->getData());
            if ($this->Admin->save($admin)) {
                $this->Flash->success(__('The admin/auth has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin/auth could not be saved. Please, try again.'));
        }
        $this->set(compact('admin/auth'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin/auth id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admin = $this->Admin->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admin->patchEntity($admin, $this->request->getData());
            if ($this->Admin->save($admin)) {
                $this->Flash->success(__('The admin/auth has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin/auth could not be saved. Please, try again.'));
        }
        $this->set(compact('admin/auth'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin/auth id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admin->get($id);
        if ($this->Admin->delete($admin)) {
            $this->Flash->success(__('The admin/auth has been deleted.'));
        } else {
            $this->Flash->error(__('The admin/auth could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
