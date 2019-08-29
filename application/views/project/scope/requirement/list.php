<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('requirement-registration')?></h1>
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
				<div class="col-lg-10">

					<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>Requirement_registration/newp/<?php echo $project_id ?>'"> <?=$this->lang->line('btn-new')?> <?=$this->lang->line('requirement-registration')?></button>

				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-lg-12">

					<table class="table table-bordered table-striped" id="tableNB">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th><?=$this->lang->line('associated_id')?></th>
								<th><?=$this->lang->line('description')?></th>
								<th><?=$this->lang->line('priority')?></th>
								<th><?=$this->lang->line('business_strategy')?></th>

								<th><?=$this->lang->line('btn-actions')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($requirement_registration as $requirement_registration) {
								?>
								<tr dados='<?= json_encode($requirement_registration); ?>'>
									<td class="moreInformationTable"></td>
									<td><?php echo $requirement_registration->associated_id;?></td>
									<td><?php echo $requirement_registration->description;?></td>
									<td><?php echo $requirement_registration->priority;?></td>
									<td><?php echo $requirement_registration->business_strategy;?></td>


									<td style="max-width: 20px">
									<div class="row center">
										<div class="col-sm-4">
											<form action="<?php echo base_url() ?>Requirement_registration/edit/<?php echo $requirement_registration->requirement_registration_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?=$requirement_registration->project_id?>">
												<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
											</form>
										</div>


										<div class="col-sm-4">
											<form action="<?php echo base_url() ?>Requirement_registration/delete/<?php echo $requirement_registration->requirement_registration_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?=$project_id?>">
												<button type="submit" class="btn btn-danger" ><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
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
						<?php $this->load->view('frame/footer_view') ?>
					</div>
				</div>
			</div>

			<script src="<?=base_url()?>assets/js/jquery-2.1.3.min.js"></script>
			<script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
			<script src="<?=base_url()?>assets/js/dataTables.bootstrap.js"></script>
			<script src="<?=base_url()?>assets/js/dataTables.responsive.js"></script>

			<script type="text/javascript">
				'use strict'
				let table;

				$(document).ready( function () {
					table = $('#tableNB').DataTable({
						"columns": [
						{ "data": "#", "orderable": false},
						{ "data": "associated_id" },
						{ "data": "description" },
						{ "data": "priority" },
						{ "data": "business_strategy" },
						{ "data": "btn-actions", "orderable": false}
						],
						"order": [[1, 'attr']]
					});
				} );

				$("#tableNB tbody td.moreInformationTable").on("click", function() {
					let element = jQuery($(this)[0].parentNode);
					let tr = element.closest('tr');
					let row = table.row(tr);
					console.log(element)
					let dados = JSON.parse(element.attr("dados"));

					if ( row.child.isShown() ) {
						row.child.hide();
						tr.removeClass('shown');
					}
					else {
						row.child( format(dados) ).show();
						tr.addClass('shown');
					}
				});

				function format (dados) {
					return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
					'<tr>'+
					'<td>Supporting Documentation: </td>'+
					'<td>'+dados.supporting_documentation+'</td>'+
					'</tr>'+
					'<tr>'+
					'<td>Type: </td>'+
					'<td>'+dados.type+'</td>'+
					'</tr>'+
					'</table>';
				}

			</script>
