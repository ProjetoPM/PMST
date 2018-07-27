<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/icone.png" type="image/x-icon">

    <title>PMST - Sign Up</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

      <!-- Começo form registro -->

      <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">SLR Tool - Create account</h3>
                  </div>
                  <div class="panel-body">
                      <form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?=base_url()?>register/">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" id="name" placeholder="Full name" name="name" type="name" autofocus>
                              </div>   

                              <div class="form-group">
                                  <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" value="">
                              </div>
                              
                              <div class="form-group">
                                  <input class="form-control" id="institution" placeholder="Institution" name="institution" type="institution" value="">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" id="lattes_address" placeholder="Lattes Address" name="lattes_address" type="lattes_address" value="">
                              </div>
                              
                              <div>A temporary password will be sent to your registered email address.</div><br>

                              <input id="login-submit" type="submit" value="Create your account" class="btn btn-lg btn-success btn-block">
                          </fieldset>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>








      <!-- Fim do registro -->
  	

	

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/js/sb-admin-2.js"></script>

    <script>
    	window.onload = hideLoginErrors();
    	function hideLoginErrors(){
    		$("#login-empty-input").hide();
    	}

		function checkEmptyInput(){
			hideLoginErrors();
			$("#login-invalid-input").hide();
			if( $("#email").val() == '' || $("#password").val() == '' ){
				$("#login-empty-input").show();
				return false;
			}
		}
	</script>

</body>

</html>
