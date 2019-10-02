<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('agregate_value-title')?></h1>
		</div>
		<!-- /.col-lg-12 -->

		<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('success'); ?></strong>
			</div>
			<?php elseif ($this->session->flashdata('error')): ?>
				<div class="alert alert-warning">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<strong><?php echo $this->session->flashdata('error'); ?></strong>
				</div>
			<?php endif; ?>
			<!-- /.row -->


			<div class="row">
				<div class="col-lg-12">

					<table class="table table-bordered table-striped" id="tableNB">
						<thead>
							<tr>
								<th><?=$this->lang->line('activity_name')?></th>
								<th><?=$this->lang->line('duration_probable')?></th>
								<th><?=$this->lang->line('duration_beta')?></th>
								<th><?=$this->lang->line('cost_probable')?></th>
								<th><?=$this->lang->line('cost_beta')?></th>

								<th><?=$this->lang->line('btn-actions')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($activity as $a) {
								?>
								<tr dados='<?= json_encode($a); ?>'>
									<td><?php echo $a->activity_name;?></td>
									<td><?php echo $a->duration_probable;?></td>
									<td><?php echo $a->duration_beta;?></td>
									<td><?php echo $a->cost_probable;?></td>
									<td><?php echo $a->cost_beta;?></td>

									<td style="max-width: 20px">
										<div class="row center">
											<div class="col-sm-3">
												<form action="<?php echo base_url() ?>Activity/editQuantitative/<?php echo $a->id; ?>" method="post">
													<input type="hidden" name="project_id" value="<?=$a->project_id; ?>">
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


					<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
				   <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				 </form>
					<!-- /.row -->
					<div class="col-sm-12" position= "absolute">
						<div class="container">


						<?php $this->load->view('frame/footer_view')?>
						</div>
					</div>
				</div>

				<script src="<?=base_url()?>assets/js/jquery-2.1.3.min.js"></script>
				<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
				<script src="<?=base_url()?>assets/js/dataTables.bootstrap.js"></script>
				<script src="<?=base_url()?>assets/js/dataTables.responsive.js"></script>
				<!-- JavaScript -->
				<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
				<!-- CSS -->
				<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

					<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
					-->
					<script type="text/javascript">
						'use strict'
						let table;


						$(document).ready( function () {
							table = $('#tableNB').DataTable({
								"columns": [
								{ "data": "activity_name" },
								{ "data": "duration_probable" },
								{ "data": "duration_beta" },
								{ "data": "cost_probable" },
								{ "data": "cost_beta" },

								{ "data": "btn-actions", "orderable": false}
								],
								"order": [[1, 'attr']]
							});
						} );


					</script>

					<script type="text/javascript">

						function deletar(idProjeto, id){
							//e.preventDefault();
							alertify.confirm('Do you agree?').setting({
								'labels':{
									ok: 'Agree',
									cancel: 'Cancel'
								},
								'reverseButtons': false,
								'onok': function(){

									console.log(`Passei o ${idProjeto} e ${id}`);

							$.post("<?php echo base_url() ?>Activity/deleteActivity/" + id,
							{
								project_id: idProjeto,
							});

											alertify.success('You agree.');
											location.reload();
							//location.reload();
										},
										'oncancel': function(){
											alertify.error('You did not agree.');
										}
									}).show();
						}

					</script>
