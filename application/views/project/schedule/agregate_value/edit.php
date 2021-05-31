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


				<?php extract($activity); ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('av_title')  ?>

							</h1>
							<form action="<?= base_url() ?>schedule/earned-value-management/update/<?php echo $id; ?>" method="post">

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


									<div class=" col-lg-3 form-group">
										<label for="agregate_value"><?= $this->lang->line('agregate_value') ?></label>
										<a class="btn-sm btn-default" id="av_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_agregate_value_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="agregate_value" name="agregate_value" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $agregate_value; ?>" onchange="variation()">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="planned_value"><?= $this->lang->line('planned_value') ?></label>
										<a class="btn-sm btn-default" id="av_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_planned_value_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="planned_value" name="planned_value" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $planned_value; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="real_agregate_cost"><?= $this->lang->line('real_agregate_cost') ?></label>
										<a class="btn-sm btn-default" id="av_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_real_agregate_cost_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="real_agregate_cost" name="real_agregate_cost" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="variation()" value="<?php echo $real_agregate_cost; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="budget_at_cumulative_end"><?= $this->lang->line('budget_at_cumulative_end') ?></label>
										<a class="btn-sm btn-default" id="av_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_budget_at_cumulative_end_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="budget_at_cumulative_end" name="budget_at_cumulative_end" onchange="estimate()" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $budget_at_cumulative_end; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="variation_of_terms"><?= $this->lang->line('variation_of_terms') ?></label>
										<a class="btn-sm btn-default" id="av_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_variation_of_terms_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="variation_of_terms" name="variation_of_terms" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $variation_of_terms; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="variation_of_costs"><?= $this->lang->line('variation_of_costs') ?></label>
										<a class="btn-sm btn-default" id="av_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_variation_of_costs_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="variation_of_costs" name="variation_of_costs" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $variation_of_costs; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="variation_at_the_end"><?= $this->lang->line('variation_at_the_end') ?></label>
										<a class="btn-sm btn-default" id="av_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_variation_at_the_end_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="variation_at_the_end" name="variation_at_the_end" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" readonly=“true” value="<?php echo $variation_at_the_end; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="deadline_performance_index"><?= $this->lang->line('deadline_performance_index') ?></label>
										<a class="btn-sm btn-default" id="av_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_deadline_performance_index_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="deadline_performance_index" name="deadline_performance_index" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $deadline_performance_index; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="costs_performance_index"><?= $this->lang->line('costs_performance_index') ?></label>
										<a class="btn-sm btn-default" id="av_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_costs_performance_index_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="costs_performance_index" name="costs_performance_index" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $costs_performance_index; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="estimated_of_completation"><?= $this->lang->line('estimated_of_completation') ?></label>
										<a class="btn-sm btn-default" id="av_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_estimated_of_completation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="estimated_of_completation" name="estimated_of_completation" onchange="estimate()" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $estimated_of_completation; ?>">
										</div>
									</div>

									<div class=" col-lg-3 form-group">
										<label for="estimate_for_completion"><?= $this->lang->line('estimate_for_completion') ?></label>
										<a class="btn-sm btn-default" id="av_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('av_estimate_for_completion_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<div>
											<input id="estimate_for_completion" name="estimate_for_completion" readonly=“true” type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $estimate_for_completion; ?>">
										</div>
									</div>



									<div class="col-lg-12">
										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
							</form>

							<form action="<?php echo base_url('schedule/earned-value-management/list/'); ?><?php echo $project_id; ?>">
								<button onclick="estimate()"  class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
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
		if (document.getElementById("av_tp_"+i).title == "") {
			document.getElementById("av_tp_"+i).hidden = true;
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