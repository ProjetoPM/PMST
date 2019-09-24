<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('project_performance_report-title')?></h1>
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

				<form method="POST" action="<?php echo base_url('ProjectPerformanceReport/insert/'); ?><?php echo $project_id; ?>">
					<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">


					<div class="col-lg-12 form-group">
						<label for="current_performance_analysis"><?=$this->lang->line('current_performance_analysis')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('current_performance_analysis-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="current_performance_analysis" name="current_performance_analysis" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="planned_forecasts"><?=$this->lang->line('planned_forecasts')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('planned_forecasts-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="planned_forecasts" name="planned_forecasts" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="forecasts_considering_current_performance"><?=$this->lang->line('forecasts_considering_current_performance')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('forecasts_considering_current_performance-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="forecasts_considering_current_performance" name="forecasts_considering_current_performance" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="current_risk_situation"><?=$this->lang->line('current_risk_situation')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('current_risk_situation-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="current_risk_situation" name="current_risk_situation" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="current_status_of_issues"><?=$this->lang->line('current_status_of_issues')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('current_status_of_issues-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="current_status_of_issues" name="current_status_of_issues" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="work_completed_during_the_period"><?=$this->lang->line('work_completed_during_the_period')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('work_completed_during_the_period-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="work_completed_during_the_period" name="work_completed_during_the_period" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="work_to_be_completed_in_the_next_period"><?=$this->lang->line('work_to_be_completed_in_the_next_period')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('work_to_be_completed_in_the_next_period-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="work_to_be_completed_in_the_next_period" name="work_to_be_completed_in_the_next_period" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="summary_of_changes"><?=$this->lang->line('summary_of_changes')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('summary_of_changes-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="summary_of_changes" name="summary_of_changes" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="earned_value_management"><?=$this->lang->line('earned_value_management')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('earned_value_management-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="earned_value_management" name="earned_value_management" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="other_relevant_information"><?=$this->lang->line('other_relevant_information')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('other_relevant_information-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="other_relevant_information" name="other_relevant_information" ></textarea>
						</div>
					</div>

					<div class=" col-lg-3 form-group">
						<label for="date"><?=$this->lang->line('date')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('date-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="date" type="date" name="date" class="form-control input-md">
						</div>
					</div>

					</div>

					<div class="col-lg-12">
						<button id="project_performance_report-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
						</button>
					</form>
					<form action="<?php echo base_url('ProjectPerformanceReport/listp/'); ?><?php echo $project_id; ?>" >
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
					</form>
				</div>
			</div>

		</section>
	</div>
</div>


<?php $this->load->view('frame/footer_view')?>
