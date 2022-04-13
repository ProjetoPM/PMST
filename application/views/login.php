<!DOCTYPE html>
<html lang="en">
<head>
   <title>SILVER BULLET - A project management tool by LESSE Unipampa</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="tool,slr,systematic review literature,automation">
   <meta name="author" content="Unipampa">
   <link rel="shortcut icon" href="<?= base_url('assets/images/lesse.png') ?>" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/animate/animate.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/css-hamburgers/hamburgers.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/select2/select2.min.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/util.css') ?>">
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/main.css') ?>">
</head>
<body>
   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100">
            <div class="login100-pic"><img data-tilt src="<?= base_url('assets/images/lesse_logo.png') ?>" alt="IMG"></div>
            <form class="login100-form needs-validation" role="form" method="post" action="<?= base_url('authentication/login/') ?>" novalidate>
               <span class="login100-form-title">Member Login</span>
               <!-- Mensagens de erro devem aparecer aqui. -->
               <?php $this->load->view('template/messages') ?>
               <div class="wrap-input100">
                  <i class="fa fa-envelope symbol-input100" aria-hidden="true"></i>
                  <input class="input100 form-control" id="email" placeholder="E-mail" name="email" type="email" required>
                  <span class="focus-input100"></span>
                  <div class="invalid-feedback">
                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
                     <span id="required-field-email">Required field.</span>
                  </div>
               </div>
               <div class="wrap-input100">
                  <i class="fa fa-lock symbol-input100" aria-hidden="true"></i>
                  <input class="input100 form-control" id="password" placeholder="Password" name="password" type="password" required>
                  <span class="focus-input100"></span>
                  <div class="invalid-feedback">
                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   
                     <span id="required-field-password">Required field.</span>
                  </div>
               </div>
               <div class="container-btn-login">
                  <button type="submit" class="login100-form-btn" id="btn-login">Login</button>
               </div>
               <div class="text-center p-t-12">
                  <span class="txt1">Forgot</span>
                  <a class="txt2" data-toggle="modal" data-target="#forgot" href="#forgot" id="forgot-password">Password?</a>
               </div>
               <div class="text-center p-t-101">
                  <a class="txt2" href="<?= base_url('authentication/register/') ?>" id="create-account">
                     Create your Account
                     <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                  </a>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="ModalForgot" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <form class="needs-validation" role="form" id="modal" method="post" action="<?= base_url('recover_password') ?>" novalidate>
               <div class="modal-header">
                  <h5 class="modal-title" id="title-forgot">Forgot Password?</h5>
                  <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="form-group wrap-input100 has-validation">
                     <i class="fa fa-envelope symbol-input100" aria-hidden="true"></i>
                     <input class="input100 form-control" placeholder="E-mail" name="email" type="email" required>
                     <span class="focus-input100"></span>
                     <div class="invalid-feedback">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   
                        <span id="required-field-recover-email">Required field.</span>
                     </div>
                  </div>
                  <div class="alert alert-info">A temporary password will be sent to your <b>registered e-mail</b> address.</div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-orange" id="recover-submit">Send Password</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <script src="<?= base_url('assets/login/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
   <script src="<?= base_url('assets/login/vendor/bootstrap/js/popper.js') ?>"></script>
   <script src="<?= base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
   <script src="<?= base_url('assets/login/vendor/select2/select2.min.js') ?>"></script>
   <script src="<?= base_url('assets/login/vendor/tilt/tilt.jquery.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/validate.js') ?>"></script>
</body>
</html>
