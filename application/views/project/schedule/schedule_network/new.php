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


				<style>
					.form-check {
						vertical-align: bottom;
						line-height: 60px;
						height: 60px;
					}
				</style>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('snd_title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/project-schedule-network-diagram/insert/" <?= $id ?> method="post">

								<div class="col-lg-6 form-group">
									<label><?= $this->lang->line('activity_name') ?></label>
									<a class="btn-sm btn-default" id="al_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select name="activity_id" size="1" class="form-control" tabindex="1" required>
										<option selected="selected" disabled="disabled" value=""> Select </option>
										<?php foreach ($activity as $item) { ?>
											<option value="<?= $item->id; ?>">
												<?= getActivityName($item->id); ?></option>
										<?php  } ?>
									</select>
								</div>

								<div class="col-lg-6 form-group">
									<label><?= $this->lang->line('snd_predecessor_activity') ?></label>
									<a class="btn-sm btn-default" id="al_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select name="predecessor_activity_id" size="1" class="form-control" tabindex="1" required>
										<option selected="selected" disabled="disabled" value=""> Select </option>
										<?php foreach ($activity as $item) { ?>
											<option value="<?= $item->id; ?>">
												<?= getActivityName($item->id); ?></option>
										<?php  } ?>
									</select>
								</div>

								<div class="col-lg-12">
									<h6 style="font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;font-size: 13.5px;" class="page-header"><?= $this->lang->line('snd_dependence_type') ?><a class="btn-sm btn-default" id="al_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a></h6>
								</div>

								<div class="col-lg-3 form-group">
									<div class="form-check">
										<label class="form-check-label" for="flexRadioDefault1">
											<?= $this->lang->line('snd_fs') ?>
										</label>
										<input class="form-check-input" value="Finish-to-Start(FS)" type="radio" name="dependence_type" id="flexRadioDefault1">
									</div>
								</div>

								<div class="col-lg-3 form-group">
									<div class="form-check">
										<label class="form-check-label" for="flexRadioDefault2">
											<?= $this->lang->line('snd_ff') ?>
										</label>
										<input class="form-check-input" value="Finish-to-Finish(FF)" type="radio" name="dependence_type" id="flexRadioDefault2">
									</div>
								</div>

								<div class="col-lg-3 form-group">
									<div class="form-check">
										<label class="form-check-label" for="flexRadioDefault1">
											<?= $this->lang->line('snd_ss') ?>
										</label>
										<input class="form-check-input" value="Start-to-Start(SS)" type="radio" name="dependence_type" id="flexRadioDefault3">
									</div>
								</div>

								<div class="col-lg-3 form-group">
									<div class="form-check">
										<input required class="form-check-input" value="Start-to-Finish(SF)" type="radio" name="dependence_type" id="flexRadioDefault4">
										<label class="form-check-label" for="flexRadioDefault2">
											<?= $this->lang->line('snd_sf') ?>
										</label>
									</div>
								</div>

								<div id="lead_lag" class="col-lg-4 form-group">
									<label id="lead_lag"><?= $this->lang->line('snd_anticipation') . "/" . $this->lang->line('snd_wait') ?></label>
									<a class="btn-sm btn-default" id="snd_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('snd_anticipation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<span class="snd_3">2000</span><?= $this->lang->line('character') ?>
									<div>
										<input disabled id="snd_txt_3" type="number" name="lead_lag" class="form-control input-md" onkeyup="limite_textarea(this.value, 'snd_3')" maxlength="2000">
									</div>
								</div>

								<div class="col-lg-12">
									<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url('schedule/project-schedule-network-diagram/list/'); ?><?php echo $_SESSION['project_id']; ?>">
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
	$("input[type=radio]").on("change", function() {
		if ($(this).val() == "Finish-to-Start(FS)") {
			$("#snd_txt_3").prop('disabled', false);
		} else if ($(this).val() == "Start-to-Start(SS)") {
			$("#snd_txt_3").prop('disabled', false);
		} else {
			$("#snd_txt_3").prop('disabled', true);
		}
	});


	limite_textarea(document.getElementById("snd_txt_3").value, "snd_3");


	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>