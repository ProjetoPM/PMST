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
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('pca-title')  ?>

							</h1>

							<div class="row">
								<div class="col-lg-12">

									<button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>schedule/project-calendars/new'"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('btn-new') ?></button>
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#upload"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('btn-upload') ?></button>
								</div>
							</div>

							<br><br>

							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="tableNB">
										<thead>
											<tr>
												<th><?= $this->lang->line('pca-activity_name') ?></th>
												<th><?= $this->lang->line('pca-resource_name') ?></th>
												<th><?= $this->lang->line('pca-function') ?></th>
												<th><?= $this->lang->line('pca-availability_start') ?></th>
												<th><?= $this->lang->line('pca-availability_ends') ?></th>
												<th><?= $this->lang->line('pca-allocation_start') ?></th>
												<th><?= $this->lang->line('pca-allocation_ends') ?></th>

												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($calendars as $a) {
											?>
												<tr dados='<?= json_encode($a); ?>'>
													<td><?php echo getActivityName($a->activity_id) ?></td>
													<td><?php echo getStakeholdername($a->stakeholder_id) ?></td>
													<td><?php echo $a->function; ?></td>
													<td><?php echo $a->availability_start; ?></td>
													<td><?php echo $a->availability_ends; ?></td>
													<td><?php echo $a->allocation_start; ?></td>
													<td><?php echo $a->allocation_ends; ?></td>

													<td style="max-width: 23px">
														<div class="row center">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>schedule/project-calendars/edit/<?php echo $a->project_calendars_id; ?>" method="post">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>
															<div class="col-sm-4">
																<button type="submit" class="btn btn-danger" onclick="deletar(<?= $_SESSION['project_id'] ?>, <?= $a->project_calendars_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
							<!-- /.row -->


							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "resource_calendar",
							); ?>

							<!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
							<?php $this->load->view('upload/index', $view) ?>

							<!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
							<?php $this->load->view('upload/retrieve', $view) ?>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>


<?php $this->load->view('frame/footer_view') ?>


<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
					-->
<script type="text/javascript">
	'use strict'
	let table;

	$(document).ready(function() {
		table = $('#tableNB').DataTable({
			"columns": [{
					"data": "activity_name"
				},
				{
					"data": "resource_name"
				},
				{
					"data": "function"
				},
				{
					"data": "availability_start"
				},
				{
					"data": "availability_ends"
				},
				{
					"data": "allocation_start"
				},
				{
					"data": "allocation_ends"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],
			"order": [
				[1, 'attr']
			]
		});
	});
</script>

<script type="text/javascript">
	function deletar(idProjeto, id) {
		//e.preventDefault();
		alertify.confirm('Do you agree?').setting({
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				console.log(`Passei o ${idProjeto} e ${id}`);

				$.post("<?php echo base_url() ?>schedule/project-calendars/delete/" + id, {
					project_id: idProjeto,
				});

				alertify.success('You agree.');
				location.reload();
				//location.reload();
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();

	}
</script>