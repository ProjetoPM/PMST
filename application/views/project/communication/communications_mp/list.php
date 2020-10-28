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
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('commp_title') ?>
							</h1>
							<div class="row">
								<div class="col-lg-12">
									<button type="button" class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>communication/communications-mp/new/<?php echo $project_id ?>'"><?= $this->lang->line('btn-new') ?> <?= $this->lang->line('communication-item') ?></button>
								</div>
							</div>
							<br><br>
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item active">
									<a class="nav-link show active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" aria-expanded="true">Communication Itens</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Stakeholders Responsibilities</a>
								</li>
							</ul>
							<div class="tab-content">

								<div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-lg-12">
											<table class="table table-bordered table-striped" id="tableNB">
												<thead>
													<tr>
														<th><?= $this->lang->line('commp_type') ?></th>
														<th><?= $this->lang->line('commp_name') ?></th>
														<th><?= $this->lang->line('commp_content') ?></th>
														<th><?= $this->lang->line('commp_distribution_reason') ?></th>
														<th><?= $this->lang->line('commp_document_format') ?></th>
														<th><?= $this->lang->line('commp_allocated_resources') ?></th>
														<th><?= $this->lang->line('commp_format') ?></th>
														<th><?= $this->lang->line('commp_actions') ?></th>
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
																		<form action="<?php echo base_url() ?>communication/communications-mp/edit/<?php echo $item->communication_item_id; ?>" method="post">
																			<input type="hidden" name="project_id" value="<?= $item->project_id ?>">
																			<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
																		</form>
																	</div>

																	<div class="col-sm-3">
																		<form action="<?php echo base_url() ?>communication/communications-mp/delete/<?php echo $item->communication_item_id; ?>" method="post">
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

										</div>
									</div>
								</div>
								<div   class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
									<div class="row">
										<div class="col-lg-12">
											<table class="table table-bordered table-striped" id="tableNB">
												<thead>
													<tr>
														<th><?= $this->lang->line('commp_type') ?></th>
														<th><?= $this->lang->line('commp_name') ?></th>
														<th><?= $this->lang->line('commp_A') ?></th>
														<th><?= $this->lang->line('commp_D') ?></th>
														<th><?= $this->lang->line('commp_G') ?></th>
														<th><?= $this->lang->line('commp_L') ?></th>
														<th><?= $this->lang->line('commp_M') ?></th>
														<th><?= $this->lang->line('commp_R') ?></th>
													</tr>
												</thead>
												<tbody>
													<?php
													foreach ($communication_item as $item) {
													?>
														<tr>
															<td><?php echo $item->type; ?></td>
															<td><?php echo $item->description; ?></td>
															<td>
																<div class="col-md-6 my-3" style="max-width: 20px;">
																	<select id="table-comm2" multiple>
																		<!-- <option value="" disabled selected> <?= $this->lang->line('commp_choose') ?></option> -->
																		<?php
																		foreach ($stakeholder as $stake) {
																		?>
																			<option value=<?php echo $stake->stakeholder_id ?>><?php echo $stake->name; ?></option>
																		<?php
																		}
																		?>
																	</select>

																	<button class="btn-save btn btn-primary btn-sm"><?= $this->lang->line('btn-save') ?></button>
																</div>
															</td>

															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td>

															</td>
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

							<div class="row">
								<div class="col-lg-12">


									<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>">
										<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
									</form>
								</div>
							</div>


							<!--1º preencher o nome da view-->
							<?php $view = array(
								"name" => "communications_management_plan",
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


<script src="<?= base_url() ?>assets/js/multiselect.min.js"></script>
<?php $this->load->view('frame/footer_view') ?>

<!--DataTable -->
<script src="<?= base_url() ?>assets/js/jquery-2.1.3.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.fixedheadertable.min.js"></script>



<script type="text/javascript">
	document.multiselect('#table-comm2');
</script>