<?php
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');
$actionArr = array("add","index","edit","view");
?>

<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link"> 
                <!--begin::Brand Image-->
                <?= $this->Html->image('AdminLTELogo.png',["alt"=>"AdminLTE Logo","class"=>"brand-image opacity-75 shadow"]) ?>
                 <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-icon bi bi-speedometer"></i> <p>Dashboard</p> ',
                            ['controller'=>'Admin','action'=>'index'],
                            ['escape' => false, 'class' => 'nav-link '. (($controller =='Admin' && $action =='index') ? 'active' : '')]) ?>                     
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-icon bi bi-palette"></i> <p>Users</p>',
                            ['controller'=>'Users','action'=>'index'],
                            ['escape'=>false,'class'=>'nav-link '.(($controller =='Users' && in_array($action,$actionArr) ) ? 'active' : '')]) ?> 
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-icon bi bi-palette"></i> <p>Blogs</p>',
                            [],
                            ['escape'=>false,'class'=>'nav-link '.(($controller =='Blogs' && $action =='index') ? 'active' : '')]) ?> 
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('<i class="nav-icon bi bi-tree-fill"></i> <p>Messages</p>',
                            [],
                            ['escape'=>false,'class'=>'nav-link'.(($controller =='Messages' && $action =='index') ? 'active' : '')]) ?> 
                        </li>
                        
                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar--> <!--begin::App Main-->