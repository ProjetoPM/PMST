<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('schedule-title')?></h1>
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
		<div class="row">
		<div class="col-lg-12">

		<?php if($schedule_mp==null)
		{
			?>
			<form method="post" action="<?php echo base_url('schedule/insert/');?>">

				<input type="hidden" name="project_id" value="<?php echo $project[0]->project_id; ?>">

				<div class="col-lg-12">
					<div class="form-group">
						<label for="schedule_model"><?=$this->lang->line('schedule_model')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-model-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_model"></textarea>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="accuary_level"><?=$this->lang->line('accuary_level')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('accuary-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="accuracy_level"></textarea>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="organizational_procedures"><?=$this->lang->line('organizational_procedures')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('organization-procedures-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="organizational_procedures"></textarea>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="form-group">
						<label for="schedule_maintenance"><?=$this->lang->line('schedule_maintenance')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-maintenance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="schedule_maintenance"></textarea>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="performance_measurement"><?=$this->lang->line('performance_measurement')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('performance_measurement-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="performance_measurement"></textarea>
					</div>
				</div>

				<!-- Textarea-->
				<div class="col-lg-6">
					<div class="form-group">
							<label for="report_format"><?=$this->lang->line('report_format')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('report_format-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="report_format"></textarea>
					</div>
				</div>



			<div class="col-lg-12">
				<button id="schedule-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
					<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
				</button>
				</form>
				<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>
			</div>

		<?php }else{?>

			<form action="<?=base_url()?>schedule/update/<?php echo $schedule_mp[0]->schedule_mp_id; ?>" method="post">


				<input type="hidden" name="project_id" value="<?php echo $project[0]->project_id; ?>">

				<div class="col-lg-12">
					<div class="form-group">
							<label for="schedule_model"><?=$this->lang->line('schedule_model')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-model-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_model"><?php echo $schedule_mp[0]->schedule_model; ?></textarea>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="accuary_level"><?=$this->lang->line('accuary_level')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('accuary-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="accuracy_level"><?php echo $schedule_mp[0]->accuracy_level; ?></textarea>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
							<label for="organizational_procedures"><?=$this->lang->line('organizational_procedures')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('organization-procedures-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="organizational_procedures"><?php echo $schedule_mp[0]->organizational_procedures; ?></textarea>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="form-group">
						<label for="schedule_maintenance"><?=$this->lang->line('schedule_maintenance')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-maintenance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste"  name="schedule_maintenance"><?php echo $schedule_mp[0]->schedule_maintenance; ?></textarea>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="form-group">
						<label for="performance_measurement"><?=$this->lang->line('performance_measurement')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('performance_measurement-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="performance_measurement"><?php echo $schedule_mp[0]->performance_measurement; ?></textarea>
					</div>
				</div>

				<!-- Textarea-->
				<div class="col-lg-6">
					<div class="form-group">
						<label for="report_format"><?=$this->lang->line('report_format')?></label><a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('report_format-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" name="report_format"><?php echo $schedule_mp[0]->report_format; ?></textarea>
					</div>
				</div>



			<div class="col-lg-12">
				<button id="schedule-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
					<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
				</button>
				</form>
				<form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>
			</div>

				<?php	}	?>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php $this->load->view('frame/footer_view')?>
