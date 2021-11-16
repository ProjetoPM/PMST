<body class="hold-transition skin-gray sidebar-mini">
	<script>
		(function() {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>
				<?php extract($assumption_log); ?>

				<!-- avaliação -->
				<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
				<?php $view_name = "assumption log";
				getViewFields($view_name);
				?>
				<?php $this->load->view('construction_services/write_field_evaluation') ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('acl_title') ?> - <?= $type == "A" ? $this->lang->line('acl_assumption') : $this->lang->line('acl_constraint') ?>

							</h1>


							<form action="<?= base_url() ?>integration/assumption-log/update/<?php echo $assumption_log_id; ?>" method="post">

								<input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
								<input type="hidden" name="status" value="1">

								<div class=" col-lg-12 form-group">
									<label for="description_log"><?= $this->lang->line('acl_description_log') ?>*</label>
									<a class="btn-sm btn-default" id="acl_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('acl_description_log_tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span class="acl_1">2000</span> <?= $this->lang->line('character') ?>
									<a <?= fieldStatus($view_name, $assumption_log_id, "description_log") ?> data-field="description_log" data-field_name="<?= $this->lang->line('acl_description_log') ?>" data-item_id="<?= $assumption_log_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'acl_1')" style="min-height:300px;" maxlength="2000" required oninput="eylem(this, this.value)" class="form-control elasticteste" id="acl_txt_1" name="description_log"><?php echo $description_log; ?></textarea>
									</div>
								</div>

								<div class="col-lg-12">
									<button id="assumption-log-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('integration/assumption-log/list/');  ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script>
	if (document.getElementById("acl_tp_1").title == "") {
		document.getElementById("acl_tp_1").hidden = true;
		limite_textarea(document.getElementById("acl_txt_1").value, "acl_1");
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>



<?php $this->load->view('frame/footer_view') ?>