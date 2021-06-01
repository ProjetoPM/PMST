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

				<?php extract($activity); ?>

				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('tap-title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/activity-list/update/<?php echo $id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->
								<ul class="abas">
									<!-- Aqui, criação da primeira aba -->

									<div class=" col-lg-4 form-group">
										<label for="associated_id"><?= $this->lang->line('al_label') ?></label>
										<a class="btn-sm btn-default" id="al_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_associated_id_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="al_1">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="al_txt_1" type="text" name="associated_id" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'al_1')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $associated_id ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="milestone"><?= $this->lang->line('al_milestone') ?></label>
										<a class="btn-sm btn-default" id="al_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_milestone_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="al_2">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="al_txt_2" type="text" name="milestone" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'al_2')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $milestone ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="activity_name"><?= $this->lang->line('al_activity_name') ?></label>
										<a class="btn-sm btn-default" id="al_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_activity_name_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="al_3">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="al_txt_3" type="text" name="activity_name" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'al_3')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $activity_name?>">
										</div>
									</div>

									<div class=" col-lg-6 form-group">
										<label for="project_phase"><?= $this->lang->line('al_project_phase') ?></label>
										<a class="btn-sm btn-default" id="al_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_project_phase_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="al_4">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="al_txt_4" type="text" name="project_phase" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'al_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $project_phase?>">
										</div>
									</div>
									<div class=" col-lg-6 form-group">
										<label for="wbs_id"><?= $this->lang->line('wbs_id') ?></label>
										<a class="btn-sm btn-default" id="al_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wbs_id_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="al_5">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="al_txt_5" type="text" name="wbs_id" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'al_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $wbs_id?>">
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="description"><?= $this->lang->line('al_description') ?></label>
										<a class="btn-sm btn-default" id="al_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="al_6">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="al_txt_6" type="text" name="description" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'al_6')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $description ?>">
										</div>
									</div>

									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('schedule/activity-list/list/'); ?><?php echo $project_id; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script>
for (var i = 1; i <= 15; i++) {
		if (document.getElementById("al_tp_"+i).title == "") {
			document.getElementById("al_tp_"+i).hidden = true;
		}
		limite_textarea(document.getElementById("al_txt_" + i).value, "al_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>