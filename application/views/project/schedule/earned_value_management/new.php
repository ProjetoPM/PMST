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
						<strong><?= $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?= $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>

				<script type="text/javascript">
					function variation() {
						document.getElementById('variation_at_the_end').value = 0
						var agregate_value = document.getElementById('agregate_value').value;
						var real_agregate_cost = document.getElementById('real_agregate_cost').value;
						var aux = ((agregate_value) - (real_agregate_cost));
						document.getElementById('variation_at_the_end').value = aux;
					}
				</script>

				<script type="text/javascript">
					function estimate() {
						document.getElementById('estimate_for_completion').value = 0
						var estimated_of_completation = document.getElementById('estimated_of_completation').value;
						var budget_at_cumulative_end = document.getElementById('budget_at_cumulative_end').value;
						var aux = ((estimated_of_completation) - (budget_at_cumulative_end));
						document.getElementById('estimate_for_completion').value = aux;
					}
				</script>



				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('av_title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/earned-value-management/update/<?= $id; ?>" method="post">

								
							<div class="col-lg-12 form-group">
										<label>Activity</label>
										<select name="activity_id" size="1" class="form-control" tabindex="1">
											<?php foreach ($activities as $t) { ?>
												<option value="<?= $t->id; ?>">
													<?= $t->activity_name; ?></option>
											<?php  } ?>
										</select>
									</div>

								<h3 >
								Earned Value Analysis
								</h3>
								
								<div class=" col-lg-4 form-group">
									<label for="agregate_value"><?= $this->lang->line('agregate_value') ?></label>
									<a class="btn-sm btn-default" id="av_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_agregate_value_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="agregate_value" name="agregate_value" type="number" min="0.00" max="100000.00" step="0.01" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-4 form-group">
									<label for="planned_value"><?= $this->lang->line('planned_value') ?></label>
									<a class="btn-sm btn-default" id="av_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_planned_value_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="planned_value" name="planned_value" type="number" min="0.00" max="100000.00" step="0.01" class="form-control input-md">
									</div>
								</div>

								<div class=" col-lg-4 form-group">
									<label for="real_agregate_cost"><?= $this->lang->line('real_agregate_cost') ?></label>
									<a class="btn-sm btn-default" id="av_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_real_agregate_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<input id="real_agregate_cost" name="real_agregate_cost" type="number" min="0.00" max="100000.00" step="0.01" class="form-control input-md">
									</div>
								</div>

								<div class="col-lg-12">
									<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?= base_url('schedule/earned-value-management/list/'); ?><?= $_SESSION['project_id']; ?>">
								<button onclick="estimate()" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script>
	for (var i = 1; i <= 11; i++) {
		if (document.getElementById("av_tp_" + i).title == "") {
			document.getElementById("av_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("av_txt_" + i).value, "av_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>

<?php $this->load->view('frame/footer_view') ?>