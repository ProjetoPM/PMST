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

								<?= $this->lang->line('tap-title')  ?>

							</h1>


							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="tableNB">
										<thead>
											<tr>
												<th><?= $this->lang->line('activity_name') ?></th>
												<th><?= $this->lang->line('estimated_cost') ?></th>
												<th><?= $this->lang->line('cumulative_estimated_cost') ?></th>
												<th><?= $this->lang->line('replanted_cost') ?></th>
												<th><?= $this->lang->line('contingency_reserve') ?></th>
												<th><?= $this->lang->line('sum_of_work_packages') ?></th>
												<th><?= $this->lang->line('contingency_reserve_of_packages') ?></th>
												<th><?= $this->lang->line('baseline') ?></th>
												<th><?= $this->lang->line('budget') ?></th>
												<th><?= $this->lang->line('cumulative_replanted_cost') ?></th>
												<th><?= $this->lang->line('real_cost') ?></th>
												<th><?= $this->lang->line('cumulative_real_cost') ?></th>

												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($activity as $a) {
											?>
												<tr dados='<?= json_encode($a); ?>'>
													<td><?php echo $a->activity_name; ?></td>
													<td><?php echo $a->estimated_cost; ?></td>
													<td><?php echo $a->cumulative_estimated_cost; ?></td>
													<td><?php echo $a->replanted_cost; ?></td>
													<td><?php echo $a->contingency_reserve; ?></td>
													<td><?php echo $a->sum_of_work_packages; ?></td>
													<td><?php echo $a->contingency_reserve_of_packages; ?></td>
													<td><?php echo $a->baseline; ?></td>
													<td><?php echo $a->budget; ?></td>
													<td><?php echo $a->cumulative_replanted_cost; ?></td>
													<td><?php echo $a->real_cost; ?></td>
													<td><?php echo $a->cumulative_real_cost; ?></td>

													<td>
														<div class="row center">
															<div class="col-sm-3">
																<form action="<?php echo base_url() ?>cost/cost-estimates/edit/<?php echo $a->id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $a->project_id; ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
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

							<!-- /.row -->


							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "cost_estimation",
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
					"data": "estimated_cost"
				},
				{
					"data": "cumulative_estimated_cost"
				},
				{
					"data": "replanted_cost"
				},
				{
					"data": "contingency_reserve"
				},
				{
					"data": "sum_of_work_packages"
				},
				{
					"data": "baseline"
				},
				{
					"data": "budget"
				},
				{
					"data": "cumulative_replanted_cost"
				},
				{
					"data": "real_cost"
				},
				{
					"data": "cumulative_real_cost"
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

				$.post("<?php echo base_url() ?>schedule/activity-list/delete" + id, {
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