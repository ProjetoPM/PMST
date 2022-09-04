<footer class="main-footer">
    <div class="col-lg-12 text-center" vertical-align="middle">
        <small>&copy; <?= date('Y') ?> by <a target="_blank" href="https://lesse.com.br/site/">LESSE</a></small>
    </div>
</footer>

<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('assets/js/fastclick.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('assets/js/demo.js') ?>"></script>

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
</script>

<!-- <?php if ($this->uri->segment(1) != 'chat') { ?>
  <script src="<?= base_url('assets') ?>/PACE/pace.min.js"></script>
<?php } ?> -->


<script>
    $(document).ready(function() {
        $('.sidebar-menu').tree()
    })
    // <?php if ($this->uri->segment(1) != 'chat') { ?>
    //   $(document).ajaxStart(function() {
    //     Pace.restart();
    //   });
    // <?php } ?>
</script>
<script>
    //código usando jQuery
    $(document).ready(function() {
        $('.load').hide();
    });
</script>

<!-- teste: weekly_report -> list.php -->
<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

-->
<script type="text/javascript">
	'use strict'
	let table;

	$(document).ready(function() {
		table = $('#table_report').DataTable({
			"columns": [{
					"data": "date"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],
			"order": [
				[1, 'attr']
			]
		});
	});

	// document.getElementById('btn-report').disabled = "true"
</script>

<script src="<?= base_url('assets/js/utils/util.js') ?>"></script>
<script src="https://kit.fontawesome.com/a3de6dbf75.js" crossorigin="anonymous"></script>

</body>
</html>