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

								<?= $this->lang->line('tep_title')  ?>

							</h1>

							<form method="POST" action="<?php echo base_url('integration/project-closure/insert/'); ?>">

							<div class="col-lg-9 form-group">
										<label for="client"><?= $this->lang->line('tep_client') ?> *</label>
										<span class="tep_1">255</span><?= $this->lang->line('character2') ?>
										<a class="btn-sm btn-default" id="tep_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_client_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<input id="tep_txt_1" type="text" name="client" class="form-control input-md" onkeyup = "limite_textarea2(this.value, 'tep_1')" maxlength="255" oninput="eylem(this, this.value)" required="false">
										</div>
									</div>


									<div class="col-lg-3 form-group">
										<label><?= $this->lang->line('tep_project_closure_date') ?></label>
										<a class="btn-sm btn-default" id="tep_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_project_closure_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="form-control" id="project_closure_date" placeholder="YYYY/MM/DD" type="text" name="project_closure_date" />
										</div>
									</div>


									<!--
							<div class=" col-lg-6 form-group">
								<label for="project_closure_date"><?= $this->lang->line('tep_project_closure_date') ?></label> 
								<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_project_closure_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

								<div >                 
									<input oninput="eylem(this, this.value)" class="form-control" type="date" id="project_closure_date" name="project_closure_date" value="<?= $pc->project_closure_date; ?>">
								</div>
							</div>
						-->
									<div class=" col-lg-12 form-group">
										<label for="main_changes_approved"><?= $this->lang->line('tep_main_changes_approved') ?></label>
										<span class="tep_2">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_main_changes_approved_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'tep_2')" id="tep_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="main_changes_approved"></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="main_lessons_learned"><?= $this->lang->line('tep_main_lessons_learned') ?> </label>
										<span class="tep_3">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_main_lessons_learned_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'tep_3')" id="tep_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="main_lessons_learned"></textarea>
										</div>
									</div>


									<div class=" col-lg-6 form-group">
										<label for="main_deviations"><?= $this->lang->line('tep_main_deviations') ?></label>
										<span class="tep_4">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_main_deviations_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'tep_4')" id="tep_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="main_deviations"></textarea>
										</div>
									</div>


									<div class=" col-lg-6 form-group">
										<label for="client_comments"><?= $this->lang->line('tep_client_comments') ?></label>
										<span class="tep_5">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_client_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
										<textarea onkeyup="limite_textarea(this.value, 'tep_5')" id="tep_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="client_comments"></textarea>
										</div>
									</div>


									<div class=" col-lg-12 form-group">
										<label for="sponsor_comments"><?= $this->lang->line('tep_sponsor_comments') ?> </label>
										<span class="tep_6">2000</span><?= $this->lang->line('character') ?>
										<a class="btn-sm btn-default" id="tep_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('tep_sponsor_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

										<div>
										<textarea onkeyup="limite_textarea(this.value, 'tep_6')" id="tep_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="sponsor_comments"></textarea>
										</div>
									</div>

								<div class="col-lg-12">
									<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>


							<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
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
	for (var i = 1; i <= 18; i++) {
		if (document.getElementById("tep_tp_" + i).title == "") {
			document.getElementById("tep_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("tep_txt_" + i).value, "tep_" + i);
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
</script>
<?php $this->load->view('frame/footer_view'); ?>