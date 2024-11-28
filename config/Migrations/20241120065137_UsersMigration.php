<?php
use Migrations\AbstractMigration;

class UsersMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table("users");
        $table->addColumn("name",'string',[
            'default'=>null,
            'limit'=>255,
            'null'=>false,
        ]);

        $table->addColumn("email",'string',[
            'default'=>null,
            'limit'=>255,
            'null'=>false,
        ]);

        $table->addColumn("is_verified","boolean",[
            'default'=>false,
            'null'=>false
        ]);

        $table->addColumn("password",'string',[
            'limit'=>255,
            'null'=>false,
        ]);

        $table->addColumn("role_id",'integer')
        ->addForeignKey("role_id","roles",'id',[
            'delete'=>'CASCADE',
            'update'=>'NO_ACTION'
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
