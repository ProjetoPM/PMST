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

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('tep-title')  ?>
								<?php $view_name = "project closure" ?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
							</h1>

							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>

							<?php
							foreach ($project_closure as $pc) {
							?>

								<form method="POST" action="<?php echo base_url('integration/project-closure/update'); ?>">
									<input type="hidden" name="status" value="1">
									<div class="col-lg-9 form-group">
										<label for="client"><?= $this->lang->line('tep-client') ?> *</label>
										<span class="tep_1">255</span><?= $this->lang->line('character2') ?>
										<a class="btn-sm btn-default" id="tep_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-client-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pc->project_closure_term_id, "client") ?> data-field="client" data-field_name="<?= $this->lang->line('tep-client') ?>" data-item_id="<?= $pc->project_closure_term_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<input id="tep_txt_1" type="text" name="client" class="form-control input-md" value="<?= $pc->client; ?>" onkeyup="limite_textarea2(this.value, 'tep_1')" maxlength="255" oninput="eylem(this, this.value)" required="false">
										</div>
									</div>

									<div class="col-lg-3 form-group">
										<label><?= $this->lang->line('tep-project_closure_date') ?></label>
										<a class="btn-sm btn-default" id="tep_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-project_closure_date-tp') ?>"></a>
										<a <?= fieldStatus($view_name, $pc->project_closure_term_id, "project_closure_date") ?> data-field="project_closure_date" data-field_name="<?= $this->lang->line('tep-project_closure_date') ?>" data-item_id="<?= $pc->project_closure_term_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div class="input-group">
											<input class="form-control" id="project_closure_date" placeholder="YYYY/MM/DD" type="date" name="project_closure_date" value="<?= $pc->project_closure_date; ?>" />
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="main_changes_approved"><?= $this->lang->line('tep-main_changes_approved') ?></label>
										<span class="tep_3">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-main_changes_approved-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pc->project_closure_term_id, "business_deals") ?> data-field="business_deals" data-field_name="<?= $this->lang->line('tep-main_changes_approved') ?>" data-item_id="<?= $pc->project_closure_term_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'tep_3')" id="tep_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="main_changes_approved"><?= $pc->main_changes_approved; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="main_lessons_learned"><?= $this->lang->line('tep-main_lessons_learned') ?> </label>
										<span class="tep_4">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-main_lessons_learned-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pc->project_closure_term_id, "main_changes_approved") ?> data-field="main_changes_approved" data-field_name="<?= $this->lang->line('tep-main_lessons_learned') ?>" data-item_id="<?= $pc->project_closure_term_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'tep_4')" id="tep_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="main_lessons_learned"><?= $pc->main_lessons_learned; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-6 form-group">
										<label for="main_deviations"><?= $this->lang->line('tep-main_deviations') ?></label>
										<span class="tep_5">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-main_deviations-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pc->project_closure_term_id, "main_deviations") ?> data-field="main_deviations" data-field_name="<?= $this->lang->line('tep-main_deviations') ?>" data-item_id="<?= $pc->project_closure_term_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'tep_5')" id="tep_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="main_deviations"><?= $pc->main_deviations; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-6 form-group">
										<label for="client_comments"><?= $this->lang->line('tep-client_comments') ?></label>
										<span class="tep_6">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-client_comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pc->project_closure_term_id, "client_comments") ?> data-field="client_comments" data-field_name="<?= $this->lang->line('tep-client_comments') ?>" data-item_id="<?= $pc->project_closure_term_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'tep_6')" id="tep_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="client_comments"><?= $pc->client_comments; ?></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="sponsor_comments"><?= $this->lang->line('tep-sponsor_comments') ?> </label>
										<span class="tep_7">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep-sponsor_comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $pc->project_closure_term_id, "sponsor_comments") ?> data-field="sponsor_comments" data-field_name="<?= $this->lang->line('tep-sponsor_comments') ?>" data-item_id="<?= $pc->project_closure_term_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<div>
											<textarea onkeyup="limite_textarea(this.value, 'tep_7')" id="tep_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="sponsor_comments"><?= $pc->sponsor_comments; ?></textarea>
										</div>
									</div>

									<div class="col-lg-12">
										<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
								</form>


								<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id'] ?>">
									<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
								</form>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
	for (var i = 1; i <= 18; i++) {
		if (document.getElementById("tep_tp_" + i).title == "") {
			document.getElementById("tep_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("tep_txt_" + i).value, "tep_" + i);
		limite_textarea2(document.getElementById("tep_txt_" + i).value, "tep_" + i);
		limite_textarea3(document.getElementById("tep_txt_" + i).value, "tep_" + i);
		limite_textarea4(document.getElementById("tep_txt_" + i).value, "tep_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>




<script type="text/javascript">
	var currentDate = new Date();
	var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
	var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

	//Start Date Ends Here
	var endDate = $("#project_closure_date").datepicker({
		autoclose: true,
		format: 'yyyy/mm/dd',
		//language: 'pt-BR', //Idioma do Calendario
		container: container,
		keyboardNavigation: true,
		orientation: "bottom",
		startDate: today,
		/*todayHighlight : true,*/
	});
	//End Date Ends Here

	for (var i = 1; i <= 7; i++) {
		if (document.getElementById("cl_tp_" + i).title == "") {
			document.getElementById("cl_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("cl_txt_" + i).value, "cl_" + i);
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
<?php $this->load->view('frame/footer_view'); ?>