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

								<?= $this->lang->line('snd_title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/project-schedule-network-diagram/update/<?php echo $id; ?>" method="post">

								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
								<!-- Textarea -->
								<ul class="abas">
									<!-- Aqui, criação da primeira aba -->

									<div class="col-lg-12 form-group">
										<label for="name"><?= $this->lang->line('activity_name') ?></label>
										
										<div>
											<input id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $activity_name; ?>" disabled>
										</div>
									</div>

									<div class=" col-lg-12 form-group">
										<label for="predecessor_activity"><?= $this->lang->line('snd_predecessor_activity') ?></label>
										<a class="btn-sm btn-default" id="snd_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('snd_predecessor_activity_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="snd_1">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="snd_txt_1" type="text" name="predecessor_activity" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'snd_1')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $predecessor_activity; ?>">
										</div>
									</div>


									<div class=" col-lg-4 form-group">
										<label for="dependence_type"><?= $this->lang->line('snd_dependence_type') ?></label>
										<a class="btn-sm btn-default" id="snd_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('snd_dependence_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="snd_2">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="snd_txt_2" type="text" name="dependence_type" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'snd_2')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $dependence_type; ?>">
										</div>
									</div>

									<div class=" col-lg-4 form-group">
										<label for="anticipation"><?= $this->lang->line('snd_anticipation') ?></label>
										<a class="btn-sm btn-default" id="snd_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('snd_anticipation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="snd_3">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="snd_txt_3" type="text" name="anticipation" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'snd_3')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $anticipation; ?>">
										</div>
									</div>


									<div class=" col-lg-4 form-group">
										<label for="wait"><?= $this->lang->line('snd_wait') ?></label>
										<a class="btn-sm btn-default" id="snd_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('snd_wait_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<span class="snd_4">2000</span><?= $this->lang->line('character') ?>
										<div>
										<input id="snd_txt_4" type="text" name="wait" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'snd_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?php echo $wait; ?>">
										</div>
									</div>


									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('schedule/project-schedule-network-diagram/list/'); ?><?php echo $project_id; ?>">
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
for (var i = 1; i <= 5; i++) {
		if (document.getElementById("snd_tp_"+i).title == "") {
			document.getElementById("snd_tp_"+i).hidden = true;
		}
		limite_textarea(document.getElementById("snd_txt_" + i).value, "snd_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>