 <header class="main-header" style="
    position:fixed;
    width:100%;
    height:auto;
    top:0;
    ">

   <!-- Logo -->

   <a href="#" class="logo">
     <!-- mini logo for sidebar mini 50x50 pixels -->

     <span class="logo-mini"><b>SB</b></span>
     <!-- logo for regular state and mobile devices -->
     <figure class="logo-lg"><img src="<?= base_url() ?>assets/images/silverbullet_logo.png" align="center" style="display: block; max-width: 65%; height: auto; margin-left: auto; max-height: max-content;
  margin-right: auto;" margin-left: auto; margin-right: auto;></figure>
     <!-- <span class="logo-lg"><b>Silver Bullet</b></span> -->
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
     <!-- Sidebar toggle button-->
     <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" enableRemember="true">
       <span class="sr-only">Toggle navigation</span>
     </a>

     <div class="navbar-custom-menu">
       <ul class="nav navbar-nav">
         <!-- Messages: style can be found in dropdown.less-->
         <!-- <div class="overlay"></div>
         <img id="loading" width="250px" src="<?= base_url() ?>assets/images/loading.gif" alt="Loading...">  -->

         <style>
           .load {
             width: 100px;
             height: 100px;
             position: absolute;
             top: 15%;
             left: 70%;
             color: black;
             text-align: center;
             vertical-align: middle;
           }

           .title {
             position: absolute;
             padding-top: 12px;
             left: 46%;
             right: 54%;
             color: black;
          
             font-size: large;
             color: aliceblue;
           }
         </style>

         <?php if ($_SESSION['project_id'] != null) { ?>
           <div class="title">
             <p >
               <strong> <?php echo $_SESSION['project_name'] ?></strong>
             </p>
         </div>

         <?php } ?>
         <div class="load"> <i class="fa fa-cog fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>
         </div>



         <?php if ($_SESSION['project_id'] != null) { ?>

           <li class="dropdown hidden-xs">
           <li class="dropdown notifications-menu">
             <a href="<?= base_url('view-all-notifications'); ?>">
               <i class="glyphicon glyphicon-bell"></i>
             </a>
           </li>
           </li>

         <?php } ?>

         <li class="dropdown user user-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <img src="<?= base_url() ?>assets/images/user-icon.jpg" class="user-image profileImgUrl" alt="User Image">
             <span class="hidden-xs NameEdt"><?= $this->session->userdata('name'); ?></span>
           </a>
           <ul class="dropdown-menu">
             <!-- User image -->
             <li class="user-header">

               <img src="<?= base_url() ?>assets/images/user-icon.jpg" class="img-circle profileImgUrl" alt="User Image">

               <p>
                 <span class="NameEdt"><?= $this->session->userdata('name'); ?></span>
                 <small><?= $this->session->userdata('email'); ?></small>
               </p>
             </li>
             <li class="user-footer">
               <div class="pull-left">
                 <!-- <a href="#" class="btn btn-info btn-flat">Profile</a> -->
                 <a data-toggle="modal" data-target="#myAccount" href="#myAccount" class="btn btn-info btn-flat">My Profile</a>
               </div>
               <div class="pull-right">
                 <a href="<?= base_url(); ?>authentication/logout" class="btn btn-danger btn-block">Logout</a>
               </div>
             </li>
           </ul>
         </li>




         <div class="modal fade" id="myAccount" tabindex="-1" role="dialog" aria-labelledby="ModalmyAccount" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?= base_url() ?>register/saveUpdateUser/">
                 <div class="modal-header text-center">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   <h2 class="modal-title w-100 font-weight-bold">Your Personal Information</h2>
                 </div>
                 <?php $this->db->where('user_id', $_SESSION['user_id']);
                  $datauser = $this->db->get('user')->result();
                  foreach ($datauser as $data) { ?>
                   <div class="modal-body mx-3">
                     <div class="form-group">
                       <input id="user_id" name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $data->user_id; ?>" required="true" readonly>
                     </div>
                     <div class="md-form mb-5">
                       <label data-error="wrong" data-success="right" for="form3">Your name</label>
                       <input class="form-control" id="name" placeholder="Full name" name="name" type="name" value="<?= $data->name; ?>" required="true">
                     </div>
                     <br>
                     <div class="md-form mb-4">
                       <label data-error="wrong" data-success="right" for="form2">Your email</label>
                       <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" value="<?= $data->email; ?>" required="true" readonly>
                     </div>
                     <br>
                     <div class="md-form mb-4">
                       <label data-error="wrong" data-success="right" for="form2">Your Institution</label>
                       <input class="form-control" id="institution" placeholder="Institution" name="institution" type="institution" value="<?= $data->institution; ?>" required="true">
                     </div>
                     <br>
                     <div class="md-form mb-4">
                       <label data-error="wrong" data-success="right" for="form2">Member Since <?php echo date("l jS \of F Y", strtotime($data->created_at)); ?></label>
                     </div> <?php } ?>
                   </div>

                   <!-- <h2><a class="modal-title w-100 font-weight-bold" data-toggle="modal" data-dismiss="modal" data-target="#changePasswordModal" href="#myAccount">Change Password</a></h2>
                   <div class="form-group"> -->


                   <div class="modal-footer">
                     <div class="pull-left">
                       <a data-toggle="modal" data-target="#changePasswordModal" href="#changePasswordModal" class="btn btn-info btn-flat">Change Password</a>
                     </div>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <input id="login-submit" id="login-submit" type="submit" class="btn btn-success" value="Save">
                   </div>
               </form>
             </div>
           </div>
         </div>




         <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="ModalmyAccount" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header text-center">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h2 class="modal-title w-100 font-weight-bold" id="myModalLabel">CHANGE PASSWORD (<?= $this->session->userdata('email') ?>)</h2>
               </div>
               <div class="modal-body">
                 <div class="row">
                   <div class="col-lg-12">
                     <label class="error" id="error_changePassword">invalid current password</label>
                     <label class="error" id="error_changePassword2">password must be at least 8 characters (alphanumeric or special characters)</label>
                   </div>
                 </div>
                 &nbsp;
                 <div class="row">
                   <div class="col-lg-12">
                     <div class="form-group">
                       <label>Current Password</label> &nbsp;&nbsp;
                       <label class="error" id="error_currentPassword"> field is required.</label>
                       <input class="form-control" id="currentPassword" placeholder="Current Password" name="currentPassword" type="password" autofocus>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>New Password</label> &nbsp;&nbsp;
                       <label class="error" id="error_newPassword"> field is required.</label>
                       <label class="error" id="error_newPassword2"> password not match</label>
                       <input class="form-control" id="newPassword" placeholder="New Password" name="newPassword" type="password" autofocus>
                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="form-group">
                       <label>Confirm New Password</label> &nbsp;&nbsp;
                       <input class="form-control" id="confirmNewPassword" placeholder="Confirm New Password" name="confirmNewPassword" type="password" autofocus>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                 <button id="changePasswordSubmit" type="button" class="btn btn-success">Save</button>
               </div>
             </div>

           </div>



       </ul>
     </div>
   </nav>
 </header>