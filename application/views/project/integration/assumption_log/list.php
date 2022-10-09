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
							width: 650px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1199px) {
						.texttd {
							display: block;
							width: 450px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 1160px) {
						.texttd {
							display: block;
							width: 300px;
							overflow: hidden;
							white-space: nowrap;
							text-overflow: ellipsis;
						}
					}

					@media (max-width: 900px) {
						.texttd {
							display: block;
							width: 100px;
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

								<?= $this->lang->line('acl_title')  ?>
								<!-- Avaliação por estrelas -->
								<?php
								$view_name = 'assumption log'; 
								$this->load->view('construction_services/write_field_evaluation') 
								?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
							</h1>

							<div class="row">
								<div class="col-lg-12">
									<button class="btn btn-success btn-lg" onclick="window.location.href='<?php echo base_url() ?>integration/assumption-log/new-assumption/<?php echo $project_id ?>'"><i class="fa fa-plus-circle"></i><?= $this->lang->line('acl_new_assumption')?></button>
									<button class="btn btn-secondary btn-lg" onclick="window.location.href='<?php echo base_url() ?>integration/assumption-log/new-constraint/<?php echo $project_id ?>'"><i class="fa fa-plus-circle"></i><?= $this->lang->line('acl_new_constraint')?></button>
								</div>
							</div>

							<br><br>
							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="table_assumption">
										<thead>
											<tr>
												<th><?= $this->lang->line('acl_type') ?></th>
												<th><?= $this->lang->line('acl_description') ?></th>
												<th><?= $this->lang->line('actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($assumption_log as $item) {
											?>
												<tr>
													<td><?= $item->type == "A" ? $this->lang->line('acl_assumption') : $this->lang->line('acl_constraint'); ?></td>
													<td> <span class="texttd"><?php echo $item->description_log; ?></span></td>

													<td <?= getStatusFieldsList("assumption log", $item->assumption_log_id) ?>>
														<div class="row center">
															<div class="col-sm-4">
																<form action="<?php echo base_url() ?>integration/assumption-log/edit/<?php echo $item->assumption_log_id; ?>" method="post">
																	<input type="hidden" name="project_id" value="<?= $item->project_id ?>">
																	<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																</form>
															</div>

															<div class="col-sm-4">
																<button type="submit" class="btn btn-danger" onclick="remove(<?= $item->assumption_log_id; ?>)"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
										<button class="btn btn-lg btn-info pull-left m-t-10"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
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
		table = $('#table_assumption').DataTable({
			"columns": [{
					"data": "type"
				},
				{
					"data": "description_log"
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
	function deletar(idProjeto, assumption_log_id) {
		//e.preventDefault();
		alertify.confirm('Do you agree?').setting({
			'labels': {
				ok: 'Agree',
				cancel: 'Cancel'
			},
			'reverseButtons': false,
			'onok': function() {

				console.log(`Passei o ${idProjeto} e ${assumption_log_id}`);

				$.post("<?php echo base_url() ?>integration/assumption-log/delete/" + assumption_log_id, {
					project_id: idProjeto,
				});
				// location.reload();
				window.location.reload();
				alertify.success('You agree.');
			},
			'oncancel': function() {
				alertify.error('You did not agree.');
			}
		}).show();

	}

	function remove(id) {
			alertify.set('notifier', 'delay', 1.5);
			alertify.confirm('<?= $this->lang->line('delete_item_confirm') ?>',
				'<?= $this->lang->line('ws_delete_workspace') ?>',
				function() {
					window.location.href = `<?= base_url("integration/assumption-log/delete/") ?>${id}`;
					alertify.success('<?= $this->lang->line('Item deleted') ?>')
				},
				function() {
					alertify.warning('<?= $this->lang->line('btn-cancel') ?>')
				}
			);
		}
</script>