<?= $this->Html->css('https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css', ['block' => true]) ?>
<div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-10">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-sm-2 d-flex justify-content-end">
                        
                        <a href="<?= $this->Url->build(["controller"=>"Users","action"=>"add"]) ?>" class="btn btn-primary btn-sm float-right">Add User</a>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
</div> <!--end::App Content Header--> <!--begin::App Content-->
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="card-header">
                        <h3 class="card-title">Users List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="users_table">
                            <thead>
                                <tr>
                                    <th><?= __("User Id") ?></th>
                                    <th><?= __("name") ?></th>
                                    <th><?= __("email") ?></th>
                                    <th><?= __("is_verified") ?></th>
                                    <th><?= __("role_name") ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(['bootstrap.min.js','dataTables.min.js','DataTables.cakephp.dataTables.js'],['block'=>true]) ?>
<?= $this->Html->script('users.js',['block'=>true])?>