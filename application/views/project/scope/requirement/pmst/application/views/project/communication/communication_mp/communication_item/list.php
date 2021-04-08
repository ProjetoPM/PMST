<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?= $this->lang->line('communication-management') ?></h1>
			<!-- <?php var_dump($communication_responsability) ?> -->
		</div>
		<!-- /.col-lg-12 -->

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
		<!-- /.row -->

		<div class="row">
			<div class="col-lg-12">
				<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>Communication_item/newp/<?php echo $project_id ?>'"><?= $this->lang->line('btn-new') ?> <?= $this->lang->line('communication-item') ?></button>
				<button type="button" class="btn btn-info btn-lg" data-target=""><em class="fa fa-pencil"></em><span class="hidden-xs"> <?= $this->lang->line('stakeholder') ?></span></button>
			</div>
		</div>
		<br><br>

		<div class="row">
			<div class="col-lg-12">
				<table class="table table-bordered table-striped" id="tableNB">
					<thead>
						<tr>
							<th><?= $this->lang->line('type') ?></th>
							<th><?= $this->lang->line('description') ?></th>
							<th><?= $this->lang->line('content') ?></th>
							<th><?= $this->lang->line('distribution_reason') ?></th>
							<th><?= $this->lang->line('document_format') ?></th>
							<th><?= $this->lang->line('allocated_resources') ?></th>
							<th><?= $this->lang->line('format') ?></th>
							<th><?= $this->lang->line('actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($communication_item as $item) {
						?>
							<tr>
								<td><?php echo $item->type; ?></td>
								<td><?php echo $item->description; ?></td>
								<td><?php echo $item->content; ?></td>
								<td><?php echo $item->distribution_reason; ?></td>
								<td><?php echo $item->document_format; ?></td>
								<td><?php echo $item->allocated_resources; ?></td>
								<td><?php echo $item->format; ?></td>
								<td>
									<div class="row">
										<div class="col-sm-3">
											<form action="<?php echo base_url() ?>Communication_item/edit/<?php echo $item->communication_item_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?= $item->project_id ?>">
												<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
											</form>
										</div>

										<div class="col-sm-3">
											<form action="<?php echo base_url() ?>Communication_item/delete/<?php echo $item->communication_item_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?= $project_id ?>">
												<button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
											</form>
										</div>
									</div>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			
		<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
			<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
		</form>
	</div>
</div>
</div>
<!-- /.row -->


<!--1º preencher o nome da view-->
<?php $view = array(
	"name" => "communication_management",
); ?>

<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
<?php $this->load->view('upload/index', $view) ?>

<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
<?php $this->load->view('upload/retrieve', $view) ?>

<?php $this->load->view('frame/footer_view') ?>

<!--DataTable -->
<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tableNB').DataTable();
	});
</script>