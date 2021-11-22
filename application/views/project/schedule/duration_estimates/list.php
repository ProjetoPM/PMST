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
				<style>
					.toggle {
						padding: 22px 80px;
						height: 16px;
						background-color: none;
					}

					.btn-primary:hover,
					.btn-primary:active,
					.btn-primary.hover {
						background-color:  #00c0ef;
					}

					.btn-primary {
						background-color: #00c0ef;
						/* border-color: #367fa9; */
					}

					.toggle-on.btn {
						top: 5px;
						font-size: 18px;
						background-color: #00c0ef;
					}

					.toggle-off.btn {
						top: 5px;
						font-size: 18px;
					}
				</style> 
				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('ade_title')  ?>

							</h1>
							<div class="row">
								<div class="col-lg-12">
									<button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>schedule/duration-estimates/new/<?php echo $_SESSION['project_id'] ?>'"><i class="fa fa-plus-circle"></i> <?= $this->lang->line('btn-new') ?></button>
									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#upload"><i class="fa fa-plus-circle"></i><?= $this->lang->line('btn-upload') ?></button>
									<?php
									if ($duration_estimates != null) {
									?>
										<input type="checkbox" id="toggle-event" style="width: max-content;" checked data-toggle="toggle" data-on="Recent versions " data-off="All Versions">
									<?php } ?>
								</div>
							</div>

							<br><br>

							<div class="row">
								<div class="col-lg-12" id="table1">
									<?php
									if ($duration_estimates != null) {
										// Obtain a list of columns
										foreach ($duration_estimates as $key => $row) {
											$id[$key]  = $row->activity_id;
											$version[$key] = $row->version;
										}

										// Ordena os dados por volume decrescente, edition crescente.
										// Adiciona $data como último parâmetro, para ordenar por uma chave comum.
										array_multisort($id, SORT_ASC, $version, SORT_DESC, $duration_estimates);
									?>

										<table class="table table-bordered table-striped" id="tableNB">
											<thead>
												<tr>
													<th style="max-width: 60px;width: 50px"><?= $this->lang->line('ade_activity_name') ?></th>
													<th style="max-width: 60px;width: 50px"><?= $this->lang->line('ade_estimated_duration') ?></th>
													<th style="max-width: 60px;width: 50px"><?= $this->lang->line('ade_performed_duration') ?></th>
													<th style="max-width: 50px;width: 40px"><?= $this->lang->line('ade_estimated_start_date') ?></th>
													<th style="max-width: 50px;width: 40px"><?= $this->lang->line('ade_performed_start_date') ?></th>
													<th style="max-width: 50px;width: 40px"><?= $this->lang->line('ade_estimated_end_date') ?></th>
													<th style="max-width: 50px;width: 40px"><?= $this->lang->line('ade_performed_end_date') ?></th>
													<th style="max-width: 35px;width: 30px;min-width: 30px; text-align: center;"><?= $this->lang->line('btn-actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($duration_estimates as $a) {
													if ($a->status == 1) {
												?>
														<tr dados='<?= json_encode($a); ?>'>
															<td><?php echo getActivityName($a->activity_id) ?></td>
															<td><?php echo $a->estimated_duration; ?></td>
															<td><?php echo $a->performed_duration; ?></td>
															<td><?php echo $a->estimated_start_date; ?></td>
															<td><?php echo $a->performed_start_date; ?></td>
															<td><?php echo $a->estimated_end_date; ?></td>
															<td><?php echo $a->performed_end_date; ?></td>


															<td style="max-width: 20px">
																<div class="row" style="margin: auto">
																	<div class="col-sm-3" style="padding-left: 5px">
																		<form action="<?php echo base_url() ?>schedule/duration-estimates/edit/<?php echo $a->duration_estimates_id; ?>" method="post">
																			<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																		</form>
																	</div>
																	
																	<div class="col-sm-3" style="margin-left: 13px;">
																	<button type="submit" class="btn btn-danger" onclick="deletar(<?= $a->activity_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
																		
																	</div>
																</div>
															</td>
														</tr>
												<?php
													}
												}
											} else {
												?>
												<p style="text-align: center;">No records found!</p>
											<?php }
											?>

											</tbody>
										</table>
								</div>

								<!-- All Versions -->
								<div class="col-lg-12" id="table2" hidden>


									<table class="table table-bordered table-striped" id="tableNB2">
										<thead>
											<tr>
												<th><?= $this->lang->line('ade_activity_name') ?></th>
												<th style="max-width: 60px;"><?= $this->lang->line('ade_estimated_duration') ?></th>
												<th style="max-width: 60px;"><?= $this->lang->line('ade_performed_duration') ?></th>
												<th style="max-width: 50px;"><?= $this->lang->line('ade_estimated_start_date') ?></th>
												<th style="max-width: 50px;"><?= $this->lang->line('ade_performed_start_date') ?></th>
												<th style="max-width: 50px;"><?= $this->lang->line('ade_estimated_end_date') ?></th>
												<th style="max-width: 50px;"><?= $this->lang->line('ade_performed_end_date') ?></th>
												<th style="max-width: 25px;text-align: center;"> Versions</th>

												<th style="max-width: 25px;text-align: center;"><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($duration_estimates as $a) {
											?>
												<tr dados='<?= json_encode($a); ?>'>
													<td><?php echo getActivityName($a->activity_id) ?></td>
													<td><?php echo $a->estimated_duration; ?></td>
													<td><?php echo $a->performed_duration; ?></td>
													<td><?php echo $a->estimated_start_date; ?></td>
													<td><?php echo $a->performed_start_date; ?></td>
													<td><?php echo $a->estimated_end_date; ?></td>
													<td><?php echo $a->performed_end_date; ?></td>
													<td style="text-align: center;"><?php echo $a->version; ?></td>

													<td style="max-width: 20px">
														<div class="row" style="margin:auto">
															<div class="col-sm-3">
																<form action="<?php echo base_url() ?>schedule/duration-estimates/read/<?php echo $a->duration_estimates_id; ?>" method="post">
																	<button type="submit" class="btn btn-default"><em class="fa fa-eye"></em><span class="hidden-xs"></span></button>
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
								</div>





								<div class="col-lg-12">
									<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form>
								</div>
							</div>
							<!-- /.row -->


							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "duration_estimates",
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
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
					-->
<script type="text/javascript">
	$(function() {
		$('#toggle-event').change(function() {
			//   $('#console-event').html('Toggle: ' + $(this).prop('checked'))
			var display = document.getElementById("table1").style.display;
			if (display == "none") {
				document.getElementById("table1").style.display = 'block';
				document.getElementById("table2").style.display = 'none';
			} else {
				document.getElementById("table1").style.display = 'none';
				document.getElementById("table2").style.display = 'block';
			}
		})
	})

	'use strict'
	let table;


	$(document).ready(function() {
		table = $('#tableNB').DataTable({
			"columns": [{
					"data": "activity_name"
				},
				{
					"data": "estimated_duration"
				},
				{
					"data": "performed_duration"
				},
				{
					"data": "estimated_start_date"
				},
				{
					"data": "performed_start_date"
				},
				{
					"data": "estimated_end_date"
				},
				{
					"data": "performed_end_date"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],

		});
	});

	$(document).ready(function() {
		table = $('#tableNB2').DataTable({
			"columns": [{
					"data": "activity_name"
				},
				{
					"data": "estimated_duration"
				},
				{
					"data": "performed_duration"
				},
				{
					"data": "estimated_start_date"
				},
				{
					"data": "performed_start_date"
				},
				{
					"data": "estimated_end_date"
				},
				{
					"data": "performed_end_date"
				},
				{
					"data": "version"
				},
				{
					"data": "btn-actions",
					"orderable": false
				}
			],

		});
	});
</script>

<script type="text/javascript">
	function deletar(id) {
		//e.preventDefault();
		alertify.confirm('If you delete this activity duration estimate, it will also delete all versions for it!').setting({
			title: 'Alert!',
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				$.post("<?php echo base_url() ?>schedule/duration-estimates/delete/" + id);

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