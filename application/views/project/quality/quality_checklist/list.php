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
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>
				<!-- /.row -->
				<style>
					@media (min-width: 1200px) {
						.texttd {
							display: block;
							width: 300px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1199px) {
						.texttd {
							display: block;
							width: 150px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1160px) {
						.texttd {
							display: block;
							width: 80px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 900px) {
						.texttd {
							display: block;
							width: 50px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}
				</style>
				<div class="row">
					<div class="col-lg-12">

						<div class="panel-body">
							<h1 class="page-header">

							<?= $this->lang->line('qc_title')?>

							</h1>

							<div class="row">
								<div class="col-lg-3">
									<button class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url() ?>quality/quality-checklist/new/<?php echo $project_id ?>'"><i class="fa fa-plus-circle"></i><?= $this->lang->line('qc_new_item')?></button>
								</div>
							</div>

							<br><br>
							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="table_quality_check">
										<thead>
											<tr>
												<th><?= $this->lang->line('qc_product')?></th>
												<th><?= $this->lang->line('qc_guidelines')?></th>
												<th><?= $this->lang->line('qc_responsible')?></th>
												<th style="text-align:center"><?= $this->lang->line('qc_verification_date')?></th>
												<th><?= $this->lang->line('btn-actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($quality_check as $item) {
											?>
												<tr>
													<td><span class="texttd"><?= $item->verified ?></span></td>
													<td><span class="texttd"><?php echo $item->guidelines; ?></span></td>
													<td><span class="texttd"><?php echo $item->responsible; ?></span></td>
													<td style="display: fixed;min-width: 15px;text-align:center"><?php echo $item->date; ?></td>
													
													
													<td <?= getStatusFieldsList("quality checklist", $item->quality_checklist_id) ?> style="display: fixed;min-width: 100px;">
														<div class="row center">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>quality/quality-checklist/edit/<?php echo $item->quality_checklist_id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $item->project_id ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>

															<div class="col-sm-4">
																<button type="submit" class="btn btn-danger" onclick="deletar(<?= $item->project_id ?>, <?= $item->quality_checklist_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
		table = $('#table_quality_check').DataTable({
			"columns": [{
					"data": "verified "
				},
				{
					"data": "guidelines"
				},
				{
					"data": "responsible"
				},
				{
					"data": "date"
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

				$.post("<?php echo base_url() ?>quality/quality-checklist/delete/" + id );
				// location.reload();
				window.location.reload();
				alertify.success('You agree.');
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();

	}
</script>