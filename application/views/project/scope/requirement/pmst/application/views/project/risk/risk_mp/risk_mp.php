<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?= $this->lang->line('risk_mp') ?></h1>
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
			if ($risk_mp == null) {
			?>

				<form method="POST" action="<?php echo base_url('RiskManagement/insert/'); ?>">

					<input type="hidden" name="project_id" value="<?php echo $project[0]->project_id; ?>">
					<input type="hidden" name="status" value="1">

					<div class="form-group">
						<label for="methodology"><?= $this->lang->line('methodology') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('methodology-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="methodology" name="methodology"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="roles_responsibilities"><?= $this->lang->line('roles_responsabilities') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('roles_responsabilities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="roles_responsibilities" name="roles_responsibilities"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="probability_impact_matrix"><?= $this->lang->line('probability_impact_matrix') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('probability_impact_matrix-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="probability_impact_matrix" name="probability_impact_matrix"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="risk_management_processes"><?= $this->lang->line('risk_management_processes') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk_management_processes-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risk_management_processes" name="risk_management_processes"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="risks_categories"><?= $this->lang->line('risks_categories') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks_categories-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks_categories" name="risks_categories"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="risks_probability_impact"><?= $this->lang->line('risks_probability_impact') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks_probability_impact-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks_probability_impact" name="risks_probability_impact"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="reviewed_tolerances"><?= $this->lang->line('reviewed_tolerances') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('reviewed_tolerances-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="reviewed_tolerances" name="reviewed_tolerances"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="traceability"><?= $this->lang->line('traceability') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="traceability" name="traceability"></textarea>
						</div>
					</div>
					<div class="col-lg-12">
						<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
				</form>

				<form action="<?php echo base_url('project/'); ?><?php echo  $id; ?>">
					<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
				</form>
		</div>

		<?php
			} else {
				foreach ($risk_mp as $rmp) {
		?>

			<form method="POST" action="<?php echo base_url('RiskManagement/update/'); ?><?php echo $id; ?>">
				<input type="hidden" name="status" value="1">

				<div class="form-group">
					<label for="methodology"><?= $this->lang->line('methodology') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('methodology-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="methodology" name="methodology"><?php echo $rmp->methodology; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="roles_responsibilities"><?= $this->lang->line('roles_responsabilities') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('roles_responsabilities-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="roles_responsibilities" name="roles_responsibilities"><?php echo $rmp->roles_responsibilities; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="probability_impact_matrix"><?= $this->lang->line('probability_impact_matrix') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('probability_impact_matrix-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="probability_impact_matrix" name="probability_impact_matrix"><?php echo $rmp->probability_impact_matrix; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="risk_management_processes"><?= $this->lang->line('risk_management_processes') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risk_management_processes-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risk_management_processes" name="risk_management_processes"><?php echo $rmp->risk_management_processes; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="risks_categories"><?= $this->lang->line('risks_categories') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks_categories-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks_categories" name="risks_categories"><?php echo $rmp->risks_categories; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="risks_probability_impact"><?= $this->lang->line('risks_probability_impact') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('risks_probability_impact-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks_probability_impact" name="risks_probability_impact"><?php echo $rmp->risks_probability_impact; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="reviewed_tolerances"><?= $this->lang->line('reviewed_tolerances') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('reviewed_tolerances-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="reviewed_tolerances" name="reviewed_tolerances"><?php echo $rmp->reviewed_tolerances; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="traceability"><?= $this->lang->line('traceability') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('traceability-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="traceability" name="traceability"><?php echo $rmp->traceability; ?></textarea>
					</div>
				</div>
				<div class="col-lg-12">
					<button id="stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
					</button>
			</form>

			<form action="<?php echo base_url('project/'); ?><?php echo  $id[0]; ?>">
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
	"name" => "risk_management_plan",
); ?>


<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
<?php $this->load->view('upload/index', $view) ?>

<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
<?php $this->load->view('upload/retrieve', $view) ?>

<?php $this->load->view('frame/footer_view') ?>