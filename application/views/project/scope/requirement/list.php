<div id="page-wrapper">
	<div class="row" position="absolute">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('requirements-registration')?></h1>
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
					<div class="container">
						<button class="btn btn-info btn-lg glyphicon-plus" onclick="window.location.href='<?php echo base_url() ?>Requirements_registration/new/<?php echo $project_id ?>'"> <?=$this->lang->line('btn-new')?> <?=$this->lang->line('requirements-registration')?></button>			
					</div>
				</div>
			</div>

			<br><br>
			<div class="row">
				<div class="col-sm-12">
					<div class="container">
						<table id="tableNB">
							<thead>
								<tr>
									<th><?=$this->lang->line('associated_id')?></th>
									<th><?=$this->lang->line('business_strategy')?></th>
									<th><?=$this->lang->line('priority')?></th>
									<th><?=$this->lang->line('description')?></th>
									<th><?=$this->lang->line('version')?></th>
									<th><?=$this->lang->line('phase')?></th>
									<th><?=$this->lang->line('associeted_delivery')?></th>
									<th><?=$this->lang->line('type')?></th>
									<th><?=$this->lang->line('requester')?></th>
									<th><?=$this->lang->line('complexity')?></th>
									<th><?=$this->lang->line('acceptance_criteria')?></th>
									<th><?=$this->lang->line('responsible')?></th>
									<th><?=$this->lang->line('validity')?></th>
									<th><?=$this->lang->line('btn-actions')?></th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($requirements_registration as $requirement_registration) {
									?>
									<tr>
										<td><?php echo $requirement_registration->associated_id;?></td>
										<td><?php echo $requirement_registration->business_strategy;?></td>
										<td><?php echo $requirement_registration->priority;?></td>
										<td><?php echo $requirement_registration->description;?></td>
										<td><?php echo $requirement_registration->version;?></td>
										<td><?php echo $requirement_registration->phase;?></td>
										<td><?php echo $requirement_registration->associated_delivery;?></td>
										<td><?php echo $requirement_registration->type;?></td>
										<td><?php echo $requirement_registration->requester;?></td>
										<td><?php echo $requirement_registration->complexity;?></td>
										<td><?php echo $requirement_registration->acceptance_criteria;?></td>
										<td><?php echo $requirement_registration->responsible;?></td>
										<td><?php echo $requirement_registration->validity;?></td>
										<td>
											
											<form action="<?php echo base_url() ?>requirements_registration/edit/<?php echo $requirement_registration->requirements_registration_id; ?>">
												<button type="submit" class="btn btn-default"><em class="fa fa-pencil"></em><span class="hidden-xs"></span></button>
											</form> ||
											<form action="<?php echo base_url() ?>requirements_registration/delete/<?php echo $requirement_registration->requirements_registration_id; ?>"><button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button>
											</form>
											
										</td>
									</tr> 
									<?php
								}
								?>

							</tbody>
						</table> 

						<!-- /.row --> </div> 
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
					<script src="<?=base_url()?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

					<script type="text/javascript">
						$(document).ready( function () {
							$('#tableNB').DataTable();
						} );
					</script>