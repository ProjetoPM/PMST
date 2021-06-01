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
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('is_title')  ?>

							</h1>

							<?php extract($issues_record); ?>

							<form action="<?= base_url() ?>integration/issue-log/update/<?php echo $issues_record_id; ?>" method="post">

								<input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">
								<input type="hidden" name="status" value="1">
								<!-- Textarea -->


								<div class="col-lg-12 form-group">
									<label for="identification"><?= $this->lang->line('ir_identification') ?></label>
									<span class="ir_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ir_identification_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea(this.value, 'ir_1')" id="ir_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="identification"><?php echo $identification;?></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-6">
										<label><?= $this->lang->line('ir_identification_date') ?></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="identification_date" placeholder="YYYY/MM/DD" type="text" name="identification_date" value="<?php echo $identification_date; ?>">
										</div>
									</div>
								</div>

								<div class="form-group col-lg-6">
									<label for="question_description"><?= $this->lang->line('ir_question_description') ?></label>
									<span class="ir_2">255</span><?= $this->lang->line('character2') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ir_question_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea2(this.value, 'ir_2')" id="ir_txt_2" maxlength="255" oninput="eylem(this, this.value)" class="form-control elasticteste" name="question_description"><?php echo $question_description;?></textarea>
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label for="type"><?= $this->lang->line('ir_type') ?></label>
									<span class="ir_3">255</span><?= $this->lang->line('character2') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ir_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea2(this.value, 'ir_3')" id="ir_txt_3" maxlength="255" oninput="eylem(this, this.value)" class="form-control elasticteste" name="type"><?php echo $type;?></textarea>
									</div>
								</div>

								<div class="form-group col-lg-6">
									<label for="responsable"><?= $this->lang->line('ir_responsable') ?></label>
									<span class="ir_4">45</span><?= $this->lang->line('character3') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ir_responsable_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea3(this.value, 'ir_4')" id="ir_txt_4" maxlength="45" oninput="eylem(this, this.value)" class="form-control elasticteste" name="responsable"><?php echo $responsable;?></textarea>
									</div>
								</div>

								<div class="form-group col-lg-6">
									<label for="situation"><?= $this->lang->line('ir_situation') ?></label>
									<span class="ir_5">45</span><?= $this->lang->line('character3') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ir_situation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea3(this.value, 'ir_5')" id="ir_txt_5" maxlength="45" oninput="eylem(this, this.value)" class="form-control elasticteste" name="situation"><?php echo $situation;?></textarea>
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label for="action"><?= $this->lang->line('ir_action') ?></label>
									<span class="ir_6">45</span><?= $this->lang->line('character3') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ir_action_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea3(this.value, 'ir_6')" id="ir_txt_6" maxlength="45" oninput="eylem(this, this.value)" class="form-control elasticteste" name="action"><?php echo $action;?></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-6">
										<label><?= $this->lang->line('ir_resolution_date') ?></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="resolution_date" placeholder="YYYY/MM/DD" type="text" name="resolution_date" value="<?php echo $resolution_date; ?>"/>
										</div>
									</div>
								</div>


								<div class="form-group">
									<div class="col-lg-6">
										<label><?= $this->lang->line('ir_replan_date') ?></label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="replan_date" placeholder="YYYY/MM/DD" type="text" name="replan_date" value="<?php echo $replan_date; ?>" />
										</div>
									</div>
								</div>

								<div class="form-group col-lg-12">
									<label for="observations"><?= $this->lang->line('ir_observations') ?></label>
									<span class="ir_7">45</span><?= $this->lang->line('character3') ?>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('ir_observations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
									<textarea onkeyup="limite_textarea3(this.value, 'ir_7')" id="ir_txt_7" maxlength="45" oninput="eylem(this, this.value)" class="form-control elasticteste" name="observations"><?php echo $observations; ?></textarea>
									</div>
								</div>

								<!-- buttons -->
								<div class="col-lg-12"><button type="submit" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url() ?>integration/issue-log/list/<?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>


<script type="text/javascript">
	//////////////////////////////////
	// Date Normal
	//////////////////////////////////
	var currentDate = new Date();
	var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	var identification_date = $("#identification_date").datepicker({
		autoclose: true,
		format: 'yyyy/mm/dd',
		//language: 'pt-BR', //Idioma do Calendario
		container: container,
		keyboardNavigation: true,
		orientation: "bottom",
		todayHighlight: true,
		// startDate: today,
	});

	//var currentDate = new Date();
	//var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	//var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";

	var resolution_date = $("#resolution_date").datepicker({
		autoclose: true,
		format: 'yyyy/mm/dd',
		//language: 'pt-BR', //Idioma do Calendario
		container: container,
		keyboardNavigation: true,
		orientation: "bottom",
		todayHighlight: true,
		// startDate: today,
	});


	var replan_date = $("#replan_date").datepicker({
		autoclose: true,
		format: 'yyyy/mm/dd',
		//language: 'pt-BR', //Idioma do Calendario
		container: container,
		keyboardNavigation: true,
		orientation: "bottom",
		todayHighlight: true,
		// startDate: today,
	});

	for (var i = 1; i <= 7; i++) {
		if (document.getElementById("ir_tp_" + i).title == "") {
			document.getElementById("ir_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("ir_txt_" + i).value, "ir_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	function limite_textarea2(valor, txt) {
		var limite = 255;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	function limite_textarea3(valor, txt) {
		var limite = 45;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>