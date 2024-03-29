<!DOCTYPE html>
<html lang="en">

<head>
   <title>SLR TOOL - without name</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Escrever desc do site para motores de busca">
   <meta name="author" content="Unipampa">
   <link rel="shortcut icon" href="<?= base_url() ?>assets/images/lesse.png" type="image/x-icon">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animate/animate.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/select2/select2.min.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/util.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/main.css">
</head>

<body>
   <div class="limiter">
      <div class="container-login100">
         <div class="wrap-login100">
            <div class="login100-pic">
               <img data-tilt src="<?= base_url() ?>assets/images/lesse_logo.png" alt="IMG">
            </div>
            <form class="login100-form needs-validation" method="post" name="formuser" action="<?= base_url() ?>register" novalidate>
               <span class="login100-form-title">
                  Create account
               </span>
               <div class="wrap-input100">
                  <i class="fa fa-user symbol-input100" aria-hidden="true"></i>
                  <input class="input100 form-control" id="name" placeholder="Name" name="name" required>
                  <span class="focus-input100"></span>
                  <div class="invalid-feedback">
                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   
                     <span id="required-field-password">Required field.</span>
                  </div>
               </div>
               <div class="wrap-input100">
                  <i class="fa fa-envelope symbol-input100" aria-hidden="true"></i>
                  <input class="input100 form-control" id="email" placeholder="E-mail" name="email" type="email" required>
                  <span class="focus-input100"></span>
                  <div class="invalid-feedback">
                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   
                     <span id="required-field-password">Required field.</span>
                  </div>
               </div>
               <div class="wrap-input100">
                  <i class="fa fa-university symbol-input100" aria-hidden="true"></i>
                  <input class="input100 form-control" id="institution" placeholder="Institution" name="institution" type="name">
                  <span class="focus-input100"></span>
                  <div class="invalid-feedback">
                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   
                     <span id="required-field-password">Required field.</span>
                  </div>
               </div>
               <div class="wrap-input100">
                  <i class="fa fa-unlock-alt symbol-input100" aria-hidden="true"></i>
                  <input class="input100 form-control" placeholder="Password" name="password" type="password" required>
                  <span class="focus-input100"></span>
                  <div class="invalid-feedback">
                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   
                     <span id="required-field-password">Required field.</span>
                  </div>
               </div>
               <div class="wrap-input100">
                  <i class="fa fa-unlock symbol-input100" aria-hidden="true"></i>
                  <input class="input100 form-control" placeholder="Confirm Password" name="repeat_password" type="password" required>
                  <span class="focus-input100"></span>
                  <div class="invalid-feedback">
                     <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   
                     <span id="required-field-password">Required field.</span>
                  </div>
               </div>
               <!-- Rever abaixo... -->
               <div class="container-login100-form-btn">
                  <button class="login100-form-btn" onclick="return validar()" id="register-account" type="submit" value="Create your account" class="btn btn-lg btn-success btn-block">
                     Register
                  </button>
               </div>
               <div class="text-center p-t-12">
                  <span class="txt1">
                     Forgot
                  </span>
                  <a class="txt2" data-toggle="modal" data-target="#forgot" href="#forgot">
                     Password?
                  </a>
                  <!-- Retorna msg sucesso ou falha para recuperacao email -->
                  <strong>
                     <p class='flashMsg flashSuccess text-center' style="color: #2ce14a"> <?= $this->session->flashdata('flashPassword') ?> </p>
                  </strong>
               </div>
               <div class="text-center p-t-136">
                  <a class="txt2" href="<?= base_url() ?>authentication/">
                     <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                     Return to Login
                  </a>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="ModalForgot" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="ModalForgot">Forgot Password?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?= base_url() ?>recover_password">
                  <fieldset>
                     <div class="form-group">
                        <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" value="" autofocus>
                     </div>
                     <div>A temporary password will be sent to your registered email address.</div>
                  </fieldset>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <input style="background: #d68e39; border-color: #333300;" id="login-submit" id="login-submit" type="submit" class="btn btn-primary" value="Send Password">
            </div>
            </form>
         </div>
      </div>
   </div>
   <script src="<?= base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
   <script src="<?= base_url() ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
   <script src="<?= base_url('assets/js/validate.js') ?>"></script>
   <script src="js/main.js"></script>

   <!-- JavaScript -->
   <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
   <!-- CSS -->
   <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />
</body>
</html>