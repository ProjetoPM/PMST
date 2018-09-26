<style type="text/css">
   .modal-open[style] {
   padding-right: 0px !important;
   }
</style>
   <div class="col-lg-12 text-center" style="padding:5px;"><small>&copy; 2018 by <a target="_blank" href="http://unipampa.edu.br">UNIPAMPA</a></small></div>
    </div>

    <!-- data table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/js/sb-admin-2.js"></script>


    <script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
    </script>

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
  
   <!-- ToolTip -->
  <script type="text/javascript">
    $(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>


</body>

</html>