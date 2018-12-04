<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?=$this->lang->line('schedule-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->          
	<div class="row">
		<div class="col-lg-12">

			<?php if ($schedule_mp == null) { ?>
				<form action="<?=base_url()?>Schedule/insert/" method="post">
					<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">

					<div class="col-lg-12 form-group">
						<label for="schedule_model"><?=$this->lang->line('schedule-model')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-model-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_model" name="schedule_model" required="true"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="accuracy_level"><?=$this->lang->line('schedule-level')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="accuracy_level" name="accuracy_level" required="true"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="organizational_procedures"><?=$this->lang->line('schedule-procedures')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-procedures-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_procedures" name="organizational_procedures" required="true"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="schedule_maintenance"><?=$this->lang->line('schedule-maintenance')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-maintenance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_maintenance" name="schedule_maintenance" required="true"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="performance_measurement"><?=$this->lang->line('schedule-performance')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-performance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="performance_measurement" name="performance_measurement" required="true"></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="report_format"><?=$this->lang->line('schedule-report')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-report-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="report_format" name="report_format" required="true"></textarea>
						</div>
					</div>

				<input type="hidden" name="status" value="1">

				<div class="col-lg-12">
					<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i>
						<?=$this->lang->line('btn-save')?>
					</button>
				</form>
				<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>

			</div>	
		</form>

	<?php } else {?>                           

		<form action="<?=base_url()?>Schedule/update/<?php echo $schedule_mp[0]->schedule_mp_id; ?>" method="post">


			<input type="hidden" name="project_id" value="<?php echo $project_id;?>">   
			
					<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">

					<div class="col-lg-12 form-group">
						<label for="schedule_model"><?=$this->lang->line('schedule-model')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-model-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_model" name="schedule_model" required="true"><?php echo $schedule_mp[0]->schedule_model; ?></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="accuracy_level"><?=$this->lang->line('schedule-level')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="accuracy_level" name="accuracy_level" required="true"><?php echo $schedule_mp[0]->accuracy_level; ?></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="organizational_procedures"><?=$this->lang->line('schedule-procedures')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-procedures-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_procedures" name="organizational_procedures" required="true"><?php echo $schedule_mp[0]->organizational_procedures; ?></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="schedule_maintenance"><?=$this->lang->line('schedule-maintenance')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-maintenance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_maintenance" name="schedule_maintenance" required="true"><?php echo $schedule_mp[0]->schedule_maintenance; ?></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="performance_measurement"><?=$this->lang->line('schedule-performance')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-performance-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="performance_measurement" name="performance_measurement" required="true"><?php echo $schedule_mp[0]->performance_measurement; ?></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="report_format"><?=$this->lang->line('schedule-report')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('schedule-report-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >                     
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="report_format" name="report_format" required="true"><?php echo $schedule_mp[0]->report_format; ?></textarea>
						</div>
					</div>

				<input type="hidden" name="status" value="1">

				<div class="col-lg-12">
					<button id="tap-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i>
						<?=$this->lang->line('btn-save')?>
					</button>
				</form>
				<form action="<?php echo base_url('project/'); ?><?php echo $project_id; ?>" >
					<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
				</form>

			</div>	
		</form>

	<?php } ?>														

 <?php $this->load->view('frame/footer_view')?>                    	
