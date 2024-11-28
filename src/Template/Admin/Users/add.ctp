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
        <div class="row g-4">
        <div class="col-md-12"> <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Add User</div>
                    </div> <!--end::Header--> <!--begin::Form-->
                    <?= $this->Form->create($user) ?>  <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3"> 
                                <label for="name" class="form-label">Name</label> 
                                <?= $this->Form->control('name', [
                                    'class' => 'form-control',
                                    'label' => false,
                                    // 'error' => true,
                                    'id' => 'name'
                                ]) ?>
                            </div>
                            <div class="mb-3"> 
                                <label for="exampleInputEmail1" class="form-label">Email address</label> 
                                <?= $this->Form->control('email', [
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'label' => false,
                                    // 'error' => true,
                                    'id' => 'email'
                                ]) ?>
                                
                            </div>
                            <div class="mb-3"> 
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <?= $this->Form->control('password', [
                                    'type' => 'password',
                                    'class' => 'form-control',
                                    'label' => false,
                                    // 'error' => true,
                                    'id' => 'password'
                                ]) ?>
                            </div>
                            
                            
                        </div> <!--end::Body--> <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div> <!--end::Footer-->
                    <?= $this->Form->end() ?> <!--end::Form-->
                </div> <!--end::Quick Example--> <!--begin::Input Group-->
                
               
            </div> <!--end::Col--> <!--begin::Col-->
        </div>
    </div>
</div>