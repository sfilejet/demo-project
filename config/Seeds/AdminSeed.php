<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher; 
use Cake\ORM\TableRegistry;
/**
 * AdminSeeder seed.
 */
class AdminSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hasher = new DefaultPasswordHasher();
        $roles = TableRegistry::getTableLocator()->get('Roles');
        $adminRole = $roles->find()->where(["name"=>'Admin'])->first();
        $data = [
            [
                "name"=>"Admin",
                "email"=>"admin@filejet.com",
                "is_verified"=>true,
                "role_id"=>$adminRole->id,
                "password"=>$hasher->hash("123456"),
            ]
            
        ];
        foreach ($data as $key => $value) {
            
            $usersTable = TableRegistry::getTableLocator()->get("Users");
            $user = $usersTable->find('all')->where(["email"=>$value['email']])->first();
            
            if(!$user){
                $userEntity = $usersTable->newEntity($value);
                if($usersTable->save($userEntity)){
                    echo "Done";
                }
            }
        }
        
    }
}
