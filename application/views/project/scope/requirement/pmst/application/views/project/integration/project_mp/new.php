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

								<?= $this->lang->line('pmp_title')  ?>

							</h1>
							<form method="POST" action="<?php echo base_url('integration/project-mp/insert'); ?>">

								<input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">
								<input type="hidden" name="status" value="1">

								<h3>Subsidiary Management Plans</h3>

								<div class=" col-lg-12 form-group">
									<label for="project_guidelines"><?= $this->lang->line('pmp_guidelines') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('project_guidelines-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_guidelines" name="project_guidelines"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="requirements_mp"><?= $this->lang->line('pmp_requirements_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="requirements_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="schedule_mp"><?= $this->lang->line('pmp_schedule_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="schedule_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="cost_mp"><?= $this->lang->line('pmp_cost_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="cost_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="quality_mp"><?= $this->lang->line('pmp_quality_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="quality_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="resource_mp"><?= $this->lang->line('pmp_resource_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="resource_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="stakeholders_communication"><?= $this->lang->line('pmp_stakeholders') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('stakeholders_communication-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="stakeholders_communication" name="stakeholders_communication"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="risk_mp"><?= $this->lang->line('pmp_risk_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="risk_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="procurement_mp"><?= $this->lang->line('pmp_procurement_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="procurement_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="stakeholder_mp"><?= $this->lang->line('pmp_stakeholder_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="stakeholder_mp"></textarea>
									</div>
								</div>

								<h3>Baselines</h3>

								<div class=" col-lg-12 form-group">
									<label for="scope_baseline"><?= $this->lang->line('pmp_scope_baseline') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="scope_baseline"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="baseline_maintenance"><?= $this->lang->line('pmp_baseline') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('baseline_maintenance-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="baseline_maintenance" name="baseline_maintenance"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="cost_baseline"><?= $this->lang->line('pmp_cost_baseline') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="cost_baseline"></textarea>
									</div>
								</div>

								<h3>Additional Components</h3>

								<div class=" col-lg-12 form-group">
									<label for="change_mp"><?= $this->lang->line('pmp_change_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('change_mp-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="change_mp" name="change_mp"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="configuration_mp"><?= $this->lang->line('pmp_configuration_mp') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('configuration_mp-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="configuration_mp" name="configuration_mp"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="performance"><?= $this->lang->line('pmp_performance') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="performance"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="project_lifecycle"><?= $this->lang->line('pmp_lifecycle') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('project_lifecycle-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_lifecycle" name="project_lifecycle" required="false"></textarea>
									</div>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="development"><?= $this->lang->line('pmp_development') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="development"></textarea>
									</div>
								</div>

								<div class="col-lg-12 form-group">
									<label for="key_review"><?= $this->lang->line('pmp_key_review') ?></label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('key_review-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<div>
										<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="key_review" name="key_review"></textarea>
									</div>
								</div>

								<input type="hidden" name="status" value="1">

								<div class="col-lg-12">
									<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i>
										<?= $this->lang->line('btn-save') ?>
									</button>
							</form>
							<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>



							<script type="text/javascript">
								//////////////////////////////////
								// Start Date & End Date
								//////////////////////////////////
								var currentDate = new Date();
								var today = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 0, 0, 0, 0);
								var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";

								var startDate = $("#start_date").datepicker({
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

								//Start Date Ends Here
								var endDate = $("#end_date").datepicker({
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

							<!-- Envia o nome da view como parametro -->
							<?php $view = array(
								"name" => "project_management_plan",
							); ?>

							<!--aqui-->

							<!--Carrega o form de envio-->
							<?php $this->load->view('upload/index', $view) ?>
							<!--Carrega as imagens do projeto-->
							<?php $this->load->view('upload/retrieve', $view) ?>

						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>

<?php $this->load->view('frame/footer_view') ?>