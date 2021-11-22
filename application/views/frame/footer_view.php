<footer class="main-footer">
  <div class="col-lg-12 text-center" vertical-align="middle"><small>&copy; <?= $this->lang->line('footer_unipampa'); ?> <a target="_blank" href="http://unipampa.edu.br">UNIPAMPA</a></small></div>
  </div>
  <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div> -->
</footer>
<div class="control-sidebar-bg"></div>


<!-- jQuery -->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<!-- <script src="<?= base_url() ?>assets/js/metisMenu.min.js"></script> -->
<!-- Custom Theme JavaScript -->
<!-- <script src="<?= base_url() ?>assets/js/sb-admin-2.js"></script> -->

<!-- JavaScript Chat-->
<script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>assets/js/fastclick.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slimscroll.min.js"></script>






<script>
  // Click handler can be added latter, after jQuery is loaded...
  $('.sidebar-toggle').click(function(event) {
    event.preventDefault();
    if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
      sessionStorage.setItem('sidebar-toggle-collapsed', '');
    } else {
      sessionStorage.setItem('sidebar-toggle-collapsed', '1');
    }
  });
</script>






<!-- Include jQuery -->
<!--Verificar se é necessario ja que ja tem o 1.11.1 -->
<!-- Include Date Range Picker -->
<!-- <script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/js/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
 -->
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>

<script>
  window.onload = hideLoginErrors();

  function hideLoginErrors() {
    $("#login-empty-input").hide();
  }

  function checkEmptyInput() {
    hideLoginErrors();
    $("#login-invalid-input").hide();
    if ($("#email").val() == '' || $("#password").val() == '') {
      $("#login-empty-input").show();
      return false;
    }
  }
</script>

<!-- ToolTip -->
<script type="text/javascript">
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
  $("[data-tt=tooltip]").tooltip();
</script>

<!-- <?php if ($this->uri->segment(1) != 'chat') { ?>
  <script src="<?= base_url('assets') ?>/PACE/pace.min.js"></script>
<?php } ?> -->


<script>
  // $(document).ready(function() {
  //   $('.sidebar-menu').tree()
  // })
  // // <?php if ($this->uri->segment(1) != 'chat') { ?>
  // //   $(document).ajaxStart(function() {
  // //     Pace.restart();
  // //   });
  // // <?php } ?>
</script>
<script>
  //código usando jQuery
  $(document).ready(function() {
    $('.load').hide();
  });
</script>