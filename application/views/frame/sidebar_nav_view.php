<div class="navbar-default sidebar" role="navigation">
   <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
         <!-- photo and name -->
         <div class="sidebar-nav text-center">
            <img src="<?=base_url()?>assets/images/silverbullet_logo.png" class="welcome logo">
         </div><br>
         <!-- /lesse logo -->
         <!-- main panel -->
         <li>
            <a href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i> Dashboard</a>
         </li>
         <?php if($this->session->userdata('role') == 'admin'): ?>
         <li>z
            <a href="#"><i class="fa fa-user fa-fw"></i> Administrator<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li> <a href="<?=base_url('admin/user_list')?>">&raquo; User List</a> </li>
               <li> <a href="<?=base_url('admin/activity_log')?>">&raquo; Activity Log</a> </li>
            </ul>
         </li>
         <?php endif; ?>
         <li>
            <a href="#"><i class="fa fa-folder fa-fw"></i> Projects<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse in">
               <li> <a href="<?=base_url('new')?>"> <i class= "fa fa-plus-circle"></i> New Project</a> </li>
               <li> <a href="<?=base_url('projects')?>"><i class= "fa fa-folder-open"></i> My Projects</a> </li>
            </ul>
         </li>
         <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> Account<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
               <li> <a data-toggle="modal" data-target="#myAccount" href="#myAccount">&raquo; My Profile</a> </li>
            </ul>
         </li>
         <!-- fim do main panel -->
      </ul>
   </div>
</div>
</nav>
