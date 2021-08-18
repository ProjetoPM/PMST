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
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>
				<!-- /.row -->
				<!-- acessa o objeto do array -->

				<?php extract($procurement_statement_of_work); ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('psw_title')  ?>

							</h1>

							<form action="<?= base_url() ?>procurement/procurement-statement-of-work/update/<?php echo $id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->

								<div class=" col-lg-4 form-group">
									<label for="description"><?= $this->lang->line('psw_description') ?> </label>
									<span class="psw_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_1')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_1" name="description" required ="false" ><?php echo $description; ?></textarea>	

								</div>

								<div class=" col-lg-4 form-group">
									<label for="types"><?= $this->lang->line('psw_types') ?> </label>
									<span class="psw_2">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_types_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_2')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_2" name="types" required ="false" ><?php echo $types; ?></textarea>

								</div>

								<div class=" col-lg-4 form-group">
									<label for="selection_criterias"><?= $this->lang->line('psw_selection_criterias') ?> </label>
									<span class="psw_3">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_selection_criterias_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_3')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_3" name="selection_criterias" required ="false" ><?php echo $selection_criterias; ?></textarea>

								</div>

								<div class=" col-lg-12 form-group">
									<label for="restrictions"><?= $this->lang->line('psw_restrictions') ?> </label>
									<span class="psw_4">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_restrictions_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_4')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_4" name="restrictions" required ="false" ><?php echo $restrictions; ?></textarea>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="premises"><?= $this->lang->line('psw_premises') ?> </label>
									<span class="psw_5">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_premises_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_5')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_5" name="premises" required ="false" ><?php echo $premises; ?></textarea>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="schedule"><?= $this->lang->line('psw_schedule') ?> </label>
									<span class="psw_6">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_schedule_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_6')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_6" name="schedule" required ="false" ><?php echo $schedule; ?></textarea>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="informations"><?= $this->lang->line('psw_informations') ?> </label>
									<span class="psw_7">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_informations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_7')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_7" name="informations" required ="false" ><?php echo $informations; ?></textarea>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="procurement_management"><?= $this->lang->line('psw_procurement_management') ?> </label>
									<span class="psw_8">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="psw_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('psw_procurement_management_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

									<textarea onkeyup="limite_textarea(this.value, 'psw_8')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="psw_txt_8" name="procurement_management" required ="false" ><?php echo $procurement_management; ?></textarea>
								</div>

								<div class="col-lg-12">
									<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url('procurement/procurement-statement-of-work/list/'); ?><?php echo $project_id; ?>">
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
<script type="text/javascript">
for (var i = 1; i <= 8; i++) {
		if (document.getElementById("psw_tp_" + i).title == "") {
			document.getElementById("psw_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("psw_txt_" + i).value, "psw_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<script type="text/javascript">
	//////////////////////////////////
	// Start Date & End Date
	//////////////////////////////////
	var currentDate = new Date();
	var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	var startDate = $("#date").datepicker({
		autoclose: true,
		format: 'yyyy/mm/dd',
		//language: 'pt-BR', //Idioma do Calendario
		container: container,
		keyboardNavigation: true,
		orientation: "bottom",
		todayHighlight: true,
		startDate: today,
	}).on('changeDate', function(ev) {
		var newDate = new Date(ev.date.setDate(ev.date.getDate() + 1));
		endDate.datepicker("setStartDate", newDate);
	});

	for (var i = 1; i <= 8; i++) {
		if (document.getElementById("psw_tp_" + i).title == "") {
			document.getElementById("psw_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("psw_txt_" + i).value, "psw_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	//Start Date Ends Here
</script>
<?php $this->load->view('frame/footer_view') ?>