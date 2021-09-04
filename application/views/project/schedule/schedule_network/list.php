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

								<?= $this->lang->line('snd_title')  ?>

							</h1>

							<div class="row">
								<div class="col-lg-12">
									<button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>schedule/project-schedule-network-diagram/new'"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('btn-new') ?></button>
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#upload"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('btn-upload') ?></button>
								</div>
							</div>

							<br><br>

							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="tableNB">
										<thead>
											<tr>
												<th><?= $this->lang->line('activity_name') ?></th>
												<th><?= $this->lang->line('snd_predecessor_activity') ?></th>
												<th><?= $this->lang->line('snd_dependence_type') ?></th>
												<th><?= $this->lang->line('snd_anticipation') . "/" . $this->lang->line('snd_wait') ?></th>
												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($schedule_network as $snd) {
											?>
												<tr dados='<?= json_encode($snd); ?>'>
													<td><?php echo getActivityName($snd->activity_id) ?></td>
													<td><?php echo getActivityName($snd->predecessor_activity_id) ?></td>
													<td><?php echo $snd->dependence_type; ?></td>
													<td><?php echo $snd->lead_lag; ?></td>

													<td style="max-width: 20px">
														<div class="row center">
															<div class="col-sm-3">
																<form action="<?php echo base_url() ?>schedule/project-schedule-network-diagram/edit/<?php echo $snd->schedule_network_id; ?>" method="post">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>
															<div class="col-sm-3">
																<button type="submit" class="btn btn-danger" onclick="deletar(<?= $_SESSION['project_id'] ?>, <?= $snd->schedule_network_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
															</div>

														</div>
													</td>
												</tr>
											<?php
											}
											?>

										</tbody>
									</table>


									<form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id'] ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form>
								</div>
							</div>
							<!-- /.row -->


							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "schedule_network",
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

<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
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
					"data": "predecessor_activity"
				},
				{
					"data": "dependence_type"
				},
				{
					"data": "Lead/Lag"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],
			"order": [
				[0, 'attr']
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

				$.post("<?php echo base_url() ?>schedule/activity-list/delete/" + id, {
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