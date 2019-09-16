<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('resource_requirement_edit-title')?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	<?php if($this->session->flashdata('success')):?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
		</div>
		<?php elseif($this->session->flashdata('error')):?>
			<div class="alert alert-warning">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong><?php echo $this->session->flashdata('error'); ?></strong>
			</div>
		<?php endif;?>

		<?php extract($activity); ?>

		<div class="row">
			<div class="col-lg-12">
					<form action="<?=base_url()?>Activity/updateResourceRequirement/<?php echo $id; ?>" method="post">

			<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
			<!-- Textarea -->
			<ul class="abas">
			    <!-- Aqui, criação da primeira aba -->

					<div class="col-lg-12 form-group">
					 <label for="name"><?=$this->lang->line('activity_name')?></label>
					 <div >
						 <input  id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $activity_name; ?>" disabled>
					 </div>
				 </div>

				 <div class=" col-lg-12 form-group">
	 				<label for="resource_description"><?=$this->lang->line('resource_description')?></label>
	 				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('resource_description-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
	 				<div>
	 					<input id="resource_description" name="resource_description" class="form-control input-md" value="<?php echo $resource_description; ?>">
	 				</div>
	 			</div>

			<div class=" col-lg-4 form-group">
				<label for="required_amount_of_resource"><?=$this->lang->line('required_amount_of_resource')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('required_amount_of_resource-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="required_amount_of_resource" type="number" name="required_amount_of_resource" class="form-control input-md" value="<?php echo $required_amount_of_resource; ?>">
				</div>
			</div>


			<div class=" col-lg-4 form-group">
				<label for="resource_cost_per_unit"><?=$this->lang->line('resource_cost_per_unit')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('resource_cost_per_unit-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="resource_cost_per_unit" name="resource_cost_per_unit" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" value="<?php echo $resource_cost_per_unit; ?>">
				</div>
			</div>

			<div class=" col-lg-4 form-group">
				<label for="resource_type"><?=$this->lang->line('resource_type')?></label>
				<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('resource_type-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
				<div>
					<input id="resource_type" name="resource_type" class="form-control input-md" value="<?php echo $resource_type; ?>">
				</div>
			</div>



			<div class="col-lg-12">
				<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
					<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
				</button>
			</form>

			<form action="<?php echo base_url('Activity/listResourceRequirement/'); ?><?php echo $project_id; ?>" >
				<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
			</form>
		</div>
	</div>

	</div>

</section>
</div>
</div>

									  <?php $this->load->view('frame/footer_view')?>
