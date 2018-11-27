<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('change_log-title')?></h1>
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
					
					<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>change_log/new/<?php echo $project_id ?>'"> <?=$this->lang->line('btn-new')?> <?=$this->lang->line('change_log-new')?></button>			
					
				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-lg-12">
					
					<table class="table table-bordered table-striped" id="tableChange">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th><?=$this->lang->line('change_log-requester')?></th>
								<th><?=$this->lang->line('change_log-request_date')?></th>
								<th><?=$this->lang->line('change_log-change_description')?></th>
								<th><?=$this->lang->line('change_log-situation')?></th>
								
								<th><?=$this->lang->line('btn-actions')?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($change_log as $change) {
								?>
								<tr dados='<?= json_encode($change); ?>'>
									<td class="moreInformationTable"></td>
									<td><?php echo $change->requester;?></td>
									<td><?php echo $change->request_date;?></td>
									<td><?php echo $change->change_description;?></td>
									<td><?php echo $change->situation;?></td>
									

									<td style="max-width: 20px">
									<div class="row center">
										<div class="col-sm-4">
											<form action="<?php echo base_url() ?>change_log/edit/<?php echo $change->change_log_id; ?>" method="post">
												<input type="hidden" name="project_id" value="<?=$change->project_id?>">
												<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
											</form>
										</div>


										<div class="col-sm-4">
											<form action="<?php echo base_url() ?>change_log/delete/<?php echo $change->change_log_id; ?>" method="post">
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
					table = $('#tableChange').DataTable({
						"columns": [
						{ "data": "#", "orderable": false},
						{ "data": "requester" },
						{ "data": "request_date" },
						{ "data": "change_description" },
						{ "data": "situation" },
						{ "data": "btn-actions", "orderable": false}
						],
						"order": [[1, 'attr']]
					});
				} );

				$("#tableChange tbody td.moreInformationTable").on("click", function() {
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
					'<td>comments: </td>'+
					'<td>'+dados.comments+'</td>'+
					'</tr>'+
					'<tr>'+
					'<td>Type: </td>'+
					'<td>'+dados.change_type+'</td>'+
					'</tr>'+
					'</table>';
				}

			</script>