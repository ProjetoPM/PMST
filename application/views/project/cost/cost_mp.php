<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?= $this->lang->line('manage_cost-title') ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
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

			<?php
			if ($cost_mp == null) {
			?>
				<form method="POST" action="<?php echo base_url('ManagementCost/insert/'); ?>">

					<input type="hidden" name="project_id" value="<?php echo $project[0]->project_id; ?>">
					<input type="hidden" name="status" value="1">

					<div class=" col-lg-12 form-group">
						<label for="project_costs_m"><?= $this->lang->line('manage_cost-project_costs_m') ?> *</label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-project_costs_m-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_costs_m" name="project_costs_m" required="true"></textarea>
						</div>
					</div>


					<div class="col-lg-12 form-group">
						<label for="accuracy_level"><?= $this->lang->line('manage_cost-accuracy_level') ?>
						</label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-accuracy_level-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="accuracy_level" name="accuracy_level"></textarea>
						</div>
					</div>


					<div class="col-lg-12 form-group">
						<label for="organizational_procedures"><?= $this->lang->line('manage_cost-organizational_procedures') ?>
						</label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-organizational_procedures-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_procedures" name="organizational_procedures"></textarea>
						</div>
					</div>


					<div class=" col-lg-12 form-group">
						<label for="measurement_rules"><?= $this->lang->line('manage_cost-measurement_rules') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-measurement_rules-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="measurement_rules" name="measurement_rules"></textarea>
						</div>
					</div>


					<div class="col-lg-12 form-group">
						<label for="format_report"><?= $this->lang->line('manage_cost-format_report') ?>
						</label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-format_report-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="format_report" name="format_report"></textarea>
						</div>
					</div>

					<div class="col-lg-12">
						<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
				</form>

				<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>">
					<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
				</form>

		</div>

		<?php
			} else {
				foreach ($cost_mp as $cmp) {
		?>

			<form method="POST" action="<?php echo base_url('ManagementCost/update/'); ?><?php echo $id; ?>">
				<input type="hidden" name="status" value="1">

				<div class=" col-lg-12 form-group">
					<label for="project_costs_m"><?= $this->lang->line('manage_cost-project_costs_m') ?> *</label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-project_costs_m-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="project_costs_m" name="project_costs_m" required="true"><?php echo $cmp->project_costs_m; ?></textarea>
					</div>
				</div>


				<div class="col-lg-12 form-group">
					<label for="accuracy_level"><?= $this->lang->line('manage_cost-accuracy_level') ?>
					</label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-accuracy_level-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="accuracy_level" name="accuracy_level"><?php echo $cmp->accuracy_level; ?></textarea>
					</div>
				</div>


				<div class="col-lg-12 form-group">
					<label for="organizational_procedures"><?= $this->lang->line('manage_cost-organizational_procedures') ?>
					</label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-organizational_procedures-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_procedures" name="organizational_procedures"><?php echo $cmp->organizational_procedures; ?></textarea>
					</div>
				</div>


				<div class=" col-lg-12 form-group">
					<label for="measurement_rules"><?= $this->lang->line('manage_cost-measurement_rules') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-measurement_rules-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="measurement_rules" name="measurement_rules"><?php echo $cmp->measurement_rules; ?></textarea>
					</div>
				</div>


				<div class="col-lg-12 form-group">
					<label for="format_report"><?= $this->lang->line('manage_cost-format_report') ?>
					</label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manage_cost-format_report-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="format_report" name="format_report"><?php echo $cmp->format_report; ?></textarea>
					</div>
				</div>

				<div class="col-lg-12">
					<button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
					</button>
			</form>

			<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
	</div>
<?php
				}
			}
?>
</div>
</div>

<!--1º preencher o nome da view-->
<?php $view = array(
	"name" => "cost_management_plan",
); ?>


<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
<?php $this->load->view('upload/index', $view) ?>

<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
<?php $this->load->view('upload/retrieve', $view) ?>

<?php $this->load->view('frame/footer_view') ?>