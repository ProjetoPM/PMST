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

								Uploads

							</h1>


							<div class="row">
								

							</div>

							<br><br>
							<div class="row">
								<div class="col-lg-12">

									<table class="table table-bordered table-striped" id="table_report">
										<thead>
											<tr>
												<th>Id</th>
												<th>Descrição</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach ($uploads as $item) {
											?>
												<tr>
													<td><?= $item[0]->report_upload_id ?></td>
													<td>$item->alt</td>
												</tr>
											<?php
											}
											?>

										</tbody>
									</table>

									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>

<?php
$this->load->view('frame/footer_view');
?>

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
		table = $('#table_report').DataTable({
			"columns": [{
					"data": "report_upload_id"
				},
				{
					"data": "alt"
				}
			],
			"order": [
				[0, 'attr']
			]
		});
	});
</script>