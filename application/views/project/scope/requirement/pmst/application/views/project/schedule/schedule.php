<div>
<span id="project_id" hidden="true"><?= $project_id; ?></span>
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

<div id="export">
	<button type="button" class="btn btn-primary" onclick="export_word()">Export Word</button>
</div>
<div class="row">
	<div class="col-md-10">
		<!-- ADD CAQUITA HERE -->
		<div id="exTab2" class="container">
			<ul class="nav nav-tabs" id="protocolTabs">
				<li class="active">
					<a href="#tab_overall" data-toggle="tab">Activity Information</a>
				</li>
				<li><a href="#tab_research_questions" data-toggle="tab">Research Questions</a>
				</li>
				<li><a href="#tab_databases" data-toggle="tab">Data Bases</a>
				</li>
				<li><a href="#tab_search_string" data-toggle="tab">Search Strings</a>
				</li>
				<li><a href="#tab_search_strategy" data-toggle="tab">Search Strategy</a>
				</li>
				<li><a href="#tab_criteria" data-toggle="tab">Criteria</a>
				</li>
				<li><a href="#tab_quality_assessment" data-toggle="tab">Quality Assessment</a>
				</li>
				</li>
				<li><a href="#tab_data_extraction" data-toggle="tab">Data Extraction</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_overall">
					<?php $this->load->view('project/schedule/activity_list/edit') ?>
				</div>
				<div class="tab-pane" id="tab_research_questions">
				</div>
				<div class="tab-pane" id="tab_databases">

				</div>
				<div class="tab-pane" id="tab_search_string">

				</div>
				<div class="tab-pane" id="tab_search_strategy">

				</div>
				<div class="tab-pane" id="tab_criteria">

				</div>
				<div class="tab-pane" id="tab_quality_assessment">
				</div>

				<div class="tab-pane" id="tab_data_extraction">
				</div>
			</div>
		</div>

		<hr></hr>

	</div><!-- /.col-md-12 -->
</div><!-- /.row -->
</div><!-- /.page-wrapper -->
<?php $this->load->view('frame/footer_view'); ?>
