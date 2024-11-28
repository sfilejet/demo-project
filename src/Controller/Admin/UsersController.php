<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher; 
use Cake\Mailer\Email;
use Exception;
use Cake\I18n\Time;

/**
 * Admin/Users Controller
 *
 *
 * @method \App\Model\Entity\Admin/User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate(
            $this->Users->find()
            ->contain(['Roles'=>function($q){
             return $q->where(["roles.name"=>USER_ROLE]);   
        }]));
        
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id Admin/user id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // $admin/user = $this->Admin/Users->get($id, [
        //     'contain' => [],
        // ]);

        // $this->set('admin/user', $admin/user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        $rolesTable = TableRegistry::getTableLocator()->get("Roles");
        $role = $rolesTable->find()->where(['name'=>USER_ROLE])->first();

        if ($this->request->is('post')) {
            $hasher = new DefaultPasswordHasher();
            $data = $this->request->getData();
            $data['is_verified'] = true;
            $data['role_id'] = $role->id;
            $data['password'] = $hasher->hash("123456");
            $user = $this->Users->patchEntity($user, $data);
            if($user->errors()){
                $this->set('errors', $user->errors());
            }else{
                
                if ($this->Users->save($user)) {
                    try {
                        $email = new Email('default');
                        $email->template('welcome')
                        ->emailFormat('html')
                        ->setViewVars(['name'=>$data['name'],'year'=>Time::now()->year])
                        ->setTo('sahil@mailinator.com')
                        ->setSubject('Onboarding Email')
                        ->send();
                    } catch (Exception $e) {
                        $this->Flash->error($e->getMessage());
                    }
                    
                    $this->Flash->success(__('User Created'));
                    return $this->redirect(['controller'=>'Users','action'=>'index']);
                } else {
                $this->Flash->error(__('There were some problems.'));
                }
            }
            
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin/user id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // $admin/user = $this->Admin/Users->get($id, [
        //     'contain' => [],
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $admin/user = $this->Admin/Users->patchEntity($admin/user, $this->request->getData());
        //     if ($this->Admin/Users->save($admin/user)) {
        //         $this->Flash->success(__('The admin/user has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The admin/user could not be saved. Please, try again.'));
        // }
        // $this->set(compact('admin/user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin/user id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        // $admin/user = $this->Admin/Users->get($id);
        // if ($this->Admin/Users->delete($admin/user)) {
        //     $this->Flash->success(__('The admin/user has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The admin/user could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['action' => 'index']);
    }

    public function getData(){
        
        $this->autoRender = false; // Disable the default view rendering
    $searchData = $this->request->getQuery('search')['value'];
    
    // Your data fetching logic here
    $records = 
        $this->Users->find()
        ->contain(['Roles'=>function($q){
         return $q->where(["roles.name"=>USER_ROLE]);   
    }]);
    if(!is_null($searchData)){
        $records = $records->where([
            'OR' => [
                ['Users.name LIKE' => '%' . $searchData . '%'],
                ['Users.email LIKE' => '%' . $searchData . '%'],
                ['Roles.name LIKE' => '%' . $searchData . '%']
            ]
            ]);
        
    }
    $totalRecords = $records->count();
    $users = $records->limit($this->request->getQuery('length'))->toArray();
    $response = [
        "draw" => $this->request->getQuery('draw'), // This is used for DataTables to maintain synchronization with the client-side
        "recordsTotal" => $totalRecords, // Total records in the database (without filters)
        "recordsFiltered" => $totalRecords, // Total records after filtering (same in this case since we're not applying other filters)
        "data" => $users // The actual user data to display
    ];
    // Return the data as a JSON response
    $this->response = $this->response->withType('application/json')
                                     ->withStringBody(json_encode($response));
    
    return $this->response;
    }
}
