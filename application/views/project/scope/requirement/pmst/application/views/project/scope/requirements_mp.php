<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?= $this->lang->line('requirements_mp-title')  ?></h1>
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

			<?php if ($requirements_mp == null) { ?>
				<form method="POST" action="<?php echo base_url('RequirementsManagement/insert/'); ?>">
					<input type="hidden" name="project_id" value="<?php echo $project[0]->project_id; ?>">
					<input type="hidden" name="status" value="1">

					<div class="col-lg-12 form-group">
						<label for="requirements_collection_proc"><?= $this->lang->line('requirements_collection_proc') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('requirements_collection_proc-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_collection_proc" name="requirements_collection_proc" required="false"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="requirements_prioritization"><?= $this->lang->line('requirements_prioritization') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('requirements_prioritization-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_prioritization" name="requirements_prioritization"></textarea>
						</div>
					</div>

					<div class=" col-lg-12 form-group">
						<label for="product_metrics"><?= $this->lang->line('product_metrics') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('product_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="product_metrics" name="product_metrics"></textarea>
						</div>
					</div>

					<input type="hidden" name="status" value="1">

					<div class="col-lg-12">
						<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i>
							<?= $this->lang->line('btn-save') ?>
						</button>
				</form>
				<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>">
					<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
				</form>

		</div>


		<?php } else {
				foreach ($requirements_mp as $rmp) {
		?>

			<form method="POST" action="<?php echo base_url('RequirementsManagement/update/'); ?><?php echo $id; ?>">
				<input type="hidden" name="status" value="1">

				<div class=" col-lg-12 form-group">
					<label for="requirements_collection_proc"><?= $this->lang->line('requirements_collection_proc') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('requirements_collection_proc-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_collection_proc" name="requirements_collection_proc"><?php echo $rmp->requirements_collection_proc; ?></textarea>
					</div>
				</div>

				<div class=" col-lg-12 form-group">
					<label for="requirements_prioritization"><?= $this->lang->line('requirements_prioritization') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('requirements_prioritization-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="requirements_prioritization" name="requirements_prioritization"><?php echo $rmp->requirements_prioritization; ?></textarea>
					</div>
				</div>

				<div class=" col-lg-12 form-group">
					<label for="product_metrics"><?= $this->lang->line('product_metrics') ?></label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('product_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<div>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="product_metrics" name="product_metrics"><?php echo $rmp->product_metrics; ?></textarea>
					</div>
				</div>

				<input type="hidden" name="status" value="1">

				<div class="col-lg-12">
					<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i>
						<?= $this->lang->line('btn-save') ?>
					</button>
			</form>
			<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>

	</div>


<?php }
			} ?>
</div>
</div>

<!--1º preencher o nome da view-->
<?php $view = array(
	"name" => "requirements_management_plan",
); ?>


<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
<?php $this->load->view('upload/index', $view) ?>



<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
<?php $this->load->view('upload/retrieve', $view) ?>

<?php $this->load->view('frame/footer_view') ?>