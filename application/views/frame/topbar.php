<?php 

$invites = $_SESSION['invites'] ?? [];
$open_inbox = isset($view_id) && strcmp($view_id, "79") === 0 && count($invites) > 0 ? 'open' : '';
$animate = isset($invites) && !empty($invites) ? 'animation' : '';
$language = strcmp($_SESSION['language'], "US") == 0 ? "US" : "BR";

?>

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
          /* Solução temporária... */
          @media(max-width: 768px) {
             .main-header>.logo>.logo-lg {
               display: none;
             }

             .main-header>a.logo {
               display: none;
             }
           }
           
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
             left: 5%;
             /* right: 54%; */
             color: black;
             white-space: nowrap;
             font-size: large;
             color: aliceblue;

           }

           .language {
             background-color: transparent;
             color: #f6f6f6;
             border-color: transparent;
             box-shadow: none;
             border: transparent;
             padding-top: 15px;
             font-size: 15px;
           }

           .language.active.focus,
           .language.active:focus,
           .language.focus,
           .language:active.focus,
           .language:active:focus,
           .language:focus {
              color: #f6f6f6;
             text-decoration: none;
             background: rgba(0, 0, 0, 0.1);
           }

           /* .language.dropdown-menu>li>a:hover {
             color: #f6f6f6;
           } */

           .language.focus,
           .language.focus,
           .language:hover {
            color: #f6f6f6;
             text-decoration: none;
             background: rgba(0, 0, 0, 0.1);
           }

           .dropdown-menu > li > a {
              cursor: pointer;
           }

           .animation {
            animation: text-change 1.5s infinite;
           }

           @keyframes text-change {
            100% {
              text-shadow: 0 0 20px red;
            }
           }
         </style>

         <?php if ($_SESSION['project_id'] != null) { ?>
           <div class="title">
             <p>
               <strong><?= $this->lang->line('project_title') ?> <?= $_SESSION['project_name'] ?></strong>
             </p>
           </div>

         <?php } ?>
         <div class="load" ><i style="padding-top:2px;padding-right:100%" class="fa fa-cog fa-spin fa-2x fa-fw"></i><span  class="sr-only">Loading...</span>
         </div>

         <li class="dropdown hidden-xs" style="max-height: 50px;background-color: transparent;vertical-align:bottom">
           <form>
             <div class="form-group" style="vertical-align:bottom">
            
               <div id="advanced" style="vertical-align:bottom" data-input-name="country3" data-selected-country="<?= $language ?>" data-button-size="btn-lg" data-button-type="language" data-scrollable="true" data-scrollable-height="250px" data-countries='{"US": "English","BR": "Português"}'>
               </div>
             </div>
           </form>
         </li>

         <?php if ($_SESSION['project_id'] != null) { ?>

           <li class="dropdown hidden-xs">
           <li class="dropdown notifications-menu">
             <a href="<?= base_url('view-all-notifications'); ?>">
               <i class="glyphicon glyphicon-bell"></i>
             </a>
           </li>
           </li>

         <?php } ?>
        <li class="dropdown <?= $open_inbox ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
            <span class="fa fa-inbox <?= $animate ?>" style="font-size:18px;"></span>
          </a>
          <ul class="dropdown-menu" style="width: 400px; padding: 10px; border-radius: 0 0 10px 10px;">
            <?php if (isset($view_id) && strcmp($view_id, "79") === 0 && count($invites) > 0): ?>
                <p class="text-center m-t-2"><?= $this->lang->line('ws_feedback_invite_detected') ?></p>
                <hr>
            <?php endif ?>
            <?php if (isset($invites) && !empty($invites)) : ?>
              <li>
                <?php $last_index = count($invites) ?>
                <?php foreach ($invites as $key => $item): ?>
                  <span>
                    <div style="display: flex;justify-content: end;align-items: center;gap: 2px;margin: 10px 0;border-left: 5px solid #5a5a5a;border-left-width: 10px;padding-left: 15px;left: -20px;">
                        <p style="margin: 0;"><?= $this->lang->line('ws_feedback_invite') ?><strong><?= $item->name  ?></strong>.</p>
                        <a class="btn btn-sm btn-success" href="<?= base_url("workspace/accept-invite/$item->workspace_id/$item->access_level") ?>">
                            <i class="fa fa-check" style="width: 20px; height: 10px;" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-sm btn-danger" href="<?= base_url("workspace/decline-invite/$item->workspace_id") ?>">
                            <i class="fa fa-times" style="width: 20px; height: 10px;" aria-hidden="true"></i>
                        </a>
                    </div>
                  </span>
                  <?= $key !== $last_index - 1 ? '<hr>' : ''?>
                <?php endforeach ?>
              <?php else : ?>
                <div>
                  <label for=""><?= $this->lang->line('ws_feedback_no_invite') ?> <i class="fa fa-smile-o" aria-hidden="true"></i></label>
                </div>
              <?php endif ?>
              </li>
          </ul>
        </li>

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
                 <a data-toggle="modal" data-target="#myAccount" href="#myAccount" class="btn btn-info btn-flat"><?= $this->lang->line('my_profile')?> </a>
               </div>
               <div class="pull-right">
                 <a href="<?= base_url(); ?>authentication/logout" class="btn btn-danger btn-block"><?= $this->lang->line('logout'); ?></a>
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
                   <h2 class="modal-title w-100 font-weight-bold"><?= $this->lang->line('user_data')?></h2>
                 </div>
                 <?php $this->db->where('user_id', $_SESSION['user_id']);
                  $datauser = $this->db->get('user')->result();
                  foreach ($datauser as $data) { ?>
                   <div class="modal-body mx-3">
                     <div class="form-group">
                       <input id="user_id" name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $data->user_id; ?>" required="true" readonly>
                     </div>
                     <div class="md-form mb-5">
                       <label data-error="wrong" data-success="right" for="form3"><?= $this->lang->line('user_name')?></label>
                       <input class="form-control" id="name" placeholder="Full name" name="name" type="name" value="<?= $data->name; ?>" required="true">
                     </div>
                     <br>
                     <div class="md-form mb-4">
                       <label data-error="wrong" data-success="right" for="form2"><?= $this->lang->line('user_email')?></label>
                       <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" value="<?= $data->email; ?>" required="true" readonly>
                     </div>
                     <br>
                     <div class="md-form mb-4">
                       <label data-error="wrong" data-success="right" for="form2"><?= $this->lang->line('user_institution')?></label>
                       <input class="form-control" id="institution" placeholder="Institution" name="institution" type="institution" value="<?= $data->institution; ?>" required="true">
                     </div>
                     <br>
                     <div class="md-form mb-4">
                       <label data-error="wrong" data-success="right" for="form2">Member Since <?= date("l jS \of F Y", strtotime($data->created_at)); ?></label>
                     </div> <?php } ?>
                   </div>

                   <!-- <h2><a class="modal-title w-100 font-weight-bold" data-toggle="modal" data-dismiss="modal" data-target="#changePasswordModal" href="#myAccount">Change Password</a></h2>
                   <div class="form-group"> -->


                   <div class="modal-footer">
                     <div class="pull-left">
                       <a data-toggle="modal" data-target="#changePasswordModal" href="#changePasswordModal" class="btn btn-info btn-flat"><?= $this->lang->line('change-password')?></a>
                     </div>
                     <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('btn-close')?></button>
                     <input id="login-submit" id="login-submit" type="submit" class="btn btn-success" value="<?= $this->lang->line('btn-save');?>">
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
                 &nbsp;
                 <form method="POST" name="formuser" action="<?= base_url() ?>register/update_password">
                   <input name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $_SESSION['user_id']; ?>" required="true" readonly>
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label>Password</label> &nbsp;&nbsp;
                         <input class="form-control" id="newPassword" placeholder="New Password" name="password" type="password" required autofocus>
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label>Confirm Password</label> &nbsp;&nbsp;
                         <input class="form-control" id="confirmNewPassword" placeholder="Confirm New Password" name="rep_senha" type="password" required autofocus>
                       </div>
                     </div>
                   </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal"><?= $this->lang->line('btn-cancel')?></button>
                 <button type="submit" onclick="return validar()" class="btn btn-success"><?= $this->lang->line('btn-save')?></button>
                 </form>
               </div>
             </div>
           </div>

           <!-- JavaScript -->
           <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
           <!-- CSS -->
           <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

           <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
           <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
           <script src="<?= base_url() ?>assets/js/jquery.flagstrap.js"></script>

           <script>
             $('#advanced').flagStrap({
               buttonSize: "btn-lg",
               buttonType: "language",
               labelMargin: "20px",
               scrollable: false,
               scrollableHeight: "350px",
               onSelect: function(value, element) {
                 $.ajax({
                   url: "<?= base_url() ?>change_language/" + value,
                   type: "POST",
                   // data: form_data,
                   cache: true,
                   success: function(returnhtml) {
                     alertify.success('<?= strcmp($_SESSION['language'], "US") !== 0 ? 'Language changed! Updating...' : 'Idioma alterado! Atualizando...' ?>');
                     location.reload(true);
                   }
                 });
               }
             });


             function validar() {
               var senha = formuser.password.value;
               var rep_senha = formuser.rep_senha.value;

               if (senha != rep_senha) {
                 alertify.alert('The passwords are different!').setting({
                   title: 'Alert!',
                 }).show();
                 formuser.password.focus();
                 return false;
               }
             }

             /**
              * Ajustando ao centro o botão de trocar o idioma. 🫣
              */
             const advanced = document.getElementById('advanced');
             const advancedButton = advanced.childNodes;

             advancedButton[2].style = "padding-top: 10px; margin: 5px 0";
           </script>
       </ul>
     </div>
   </nav>
 </header>