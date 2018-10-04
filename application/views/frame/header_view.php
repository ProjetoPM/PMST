<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SLR Tool</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/stepbystep.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom tab icons -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/lesse.png" type="image/x-icon">        
    <!-- CSS refatorados da dashboard principal -->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">

    <!-- Cod Elastic TextArea -->
    <script src="<?=base_url()?>assets/js/elasticTextarea.js" type="text/javascript"></script>

    <!-- Inclusão do jQuery-->
    <script src="<?=base_url()?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
    <!-- Inclusão do Plugin jQuery Validation-->
    <script src="<?=base_url()?>assets/js/jquery.validate.js" type="text/javascript"></script>

    <!-- Inicio Import's para o datepicker -->
    <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
    <link href="<?=base_url()?>assets/css/bootstrap-iso.css" rel="stylesheet">
    <!-- Include jQuery -->
    <script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js" type="text/javascript"></script> <!--Verificar se é necessario ja que ja tem o 1.11.1 -->
    <!-- Include Date Range Picker -->
    <script src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

    <link href="<?=base_url()?>assets/css/bootstrap-datepicker3.css" rel="stylesheet">

    <script src="<?=base_url()?>assets/js/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>

    <!-- Fim Import's para o datepicker -->

    <input type="hidden"  id="base-url" value="<?=base_url()?>"/>
  </head>
  <body>
    <div class="overlay"></div>
    <img id="loading"  width="250px" src="<?=base_url()?>assets/images/loading.gif" alt="Loading...">
    <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">#</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url();?>">
        <div class="inline"> &nbsp;SLR Tool </div>
      </a>
    </div>
    <!-- /.navbar-header -->
    <!-- opcoes do navbar direita -->
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown hidden-xs">
        <a href="#" class="dropdown-toggle pull-right" data-toggle="dropdown" style="padding-right: 45px;">
        <span class="glyphicon glyphicon-user"></span> 
        <span class="glyphicon glyphicon-chevron-down"></span>
        </a>
        <ul class="dropdown-menu" style="padding-right: 50px;">
          <li>
            <div class="navbar-login">
              <div class="row">
                <div class="col-lg-4 hidden-xs">
                  <p class="text-center">
                    <span class="glyphicon glyphicon-user icon-size"></span>
                  </p>
                </div>
                <div class="col-lg-8">
                  <p class="text-center">
                    <?php echo '<p class="welcome"><b>' . $this->session->userdata('name') . "</b><br>" . $this->session->userdata('email') . "</p>";?>
                  </p>
                  <p class="text-left">
                    <a data-toggle="modal" data-target="#myAccount" href="#myAccount" class="btn btn-primary btn-block btn-sm">Account Update</a>
                  </p>
                </div>
              </div>
            </div>
          </li>
          <li class="divider"></li>
          <li>
            <div class="navbar-login navbar-login-session">
              <div class="row">
                <div class="col-lg-12">
                  <p>
                    <a href="<?=base_url();?>authentication/logout" class="btn btn-danger btn-block">Logout</a>
                  </p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <!-- /.fim das opcoes do navbar direita -->
<!-- Inicio modal my account -->
  <div class="modal fade" id="myAccount" tabindex="-1" role="dialog" aria-labelledby="ModalmyAccount" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?=base_url()?>register/saveUpdateUser/">
          <div class="modal-header text-center">
            <h2 class="modal-title w-100 font-weight-bold">Your Personal Information</h2>
          </div>
          <?php $this->db->where('user_id', $_SESSION['user_id']); $datauser = $this->db->get('user')->result(); foreach ($datauser as $data) {?>
          <div class="modal-body mx-3">
            <div class="form-group">
              <input id="user_id" name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $data->user_id;?>" required="true" readonly>
            </div>
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form3">Your name</label>
              <input class="form-control" id="name" placeholder="Full name" name="name" type="name" value="<?=$data->name;?>" required="true">
            </div>
            <br>
            <div class="md-form mb-4">
              <label data-error="wrong" data-success="right" for="form2">Your email</label>
              <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" value="<?=$data->email;?>" required="true" readonly>                    
            </div>
            <br>
            <div class="md-form mb-4">
              <label data-error="wrong" data-success="right" for="form2">Your Institution</label>
              <input class="form-control" id="institution" placeholder="Institution" name="institution" type="institution" value="<?=$data->institution;?>" required="true">                    
            </div>
            <br>
            <div class="md-form mb-4">
              <label data-error="wrong" data-success="right" for="form2">Member Since <?php echo date("l jS \of F Y", strtotime($data->created_at)); ?></label>                    
            </div> <?php } ?> 
          </div>
          <div class="modal-header text-center">
            <h2><a class="modal-title w-100 font-weight-bold" data-toggle="modal" data-dismiss="modal" data-target="#changePasswordModal" href="#myAccount">Change Password</a></h2>
            <div class="form-group">
              <input id="user_id" name="user_id" type="hidden" placeholder="user_id" class="form-control input-md" value="<?= $data->user_id;?>" required="true" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input  id="login-submit" id="login-submit" type="submit" class="btn btn-primary" value="Save"> 
          </div>
        </form>
      </div>
    </div>
  </div>  
  <!-- Fim modal my account -->


    <!-- modal password -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="ModalmyAccount" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h2 class="modal-title w-100 font-weight-bold" id="myModalLabel">CHANGE PASSWORD (<?=$this->session->userdata('email')?>)</h2>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
            <button id="changePasswordSubmit" type="button" class="btn btn-primary">UPDATE</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    