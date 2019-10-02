<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?=$this->lang->line('work_performance_report-title')?></h1>
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

				<form method="POST" action="<?php echo base_url('WorkPerformanceReport/insert/'); ?><?php echo $project_id; ?>">
					<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">


					<div class=" col-lg-6 form-group">
						<label for="responsible"><?=$this->lang->line('responsible')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('responsible-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="responsible" type="text" name="responsible" class="form-control input-md">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="date"><?=$this->lang->line('date')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('date-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="date" type="date" name="date" class="form-control input-md">
						</div>
					</div>


					<div class="col-lg-12 form-group">
						<label for="main_activities"><?=$this->lang->line('main_activities')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('main_activities-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="main_activities" name="main_activities" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="next_activities"><?=$this->lang->line('next_activities')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('next_activities-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="next_activities" name="next_activities" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="comments"><?=$this->lang->line('comments')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('comments-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="comments" name="comments" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="issues"><?=$this->lang->line('issues')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('issues-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="issues" name="issues" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="changes"><?=$this->lang->line('changes')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('changes-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="changes" name="changes" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="risks"><?=$this->lang->line('risks')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('risks-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks" name="risks" ></textarea>
						</div>
					</div>

					<div class="col-lg-12 form-group">
						<label for="attention_points"><?=$this->lang->line('attention_points')?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('attention_points-tp')?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div >
							<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="attention_points" name="attention_points" ></textarea>
						</div>
					</div>

					</div>

					<div class="col-lg-12">
						<button id="work_performance_report-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
						</button>
					</form>
					<form action="<?php echo base_url('WorkPerformanceReport/listp/'); ?><?php echo $project_id; ?>" >
						<button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
					</form>
				</div>
			</div>

		</section>
	</div>
</div>


<?php $this->load->view('frame/footer_view')?>
