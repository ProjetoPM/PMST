<body class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">

				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>

				<?php extract($activity) ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('al_title')  ?>
								<?php $view_name = "activity list" ?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
							</h1>

							<!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>
							<form method="POST" action='<?= base_url("schedule/activity-list/update/$id") ?>'>
								<input type="hidden" name="project_id" value="<?= $project_id ?>">

								<div class="col-md-12">
									<div class="form-group col-md-4">
										<label for="associated_id"><?= $this->lang->line('al_label') ?></label>
										<a class="btn-sm btn-default" id="al_tp_01" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_associated_id_tp') ?>">
											<i class="glyphicon glyphicon-comment"></i>
										</a>
										<a <?= fieldStatus($view_name, $id, "associated_id") ?> data-field="associated_id" data-field_name="<?= $this->lang->line('al_label') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<span id="count-a"></span>
										<textarea class="form-control" oninput="limitText(this, 50, 'a')" name="associated_id" id="al_txt_1" rows="1" required><?= $associated_id ?></textarea>
									</div>

									<div class="form-group col-md-4">
										<label for="milestone"><?= $this->lang->line('al_milestone') ?></label>
										<a class="btn-sm btn-default" id="al_tp_02" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_milestone_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "milestone") ?> data-field="milestone" data-field_name="<?= $this->lang->line('al_milestone') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<select class="form-control" name="milestone" id="al_txt_2" required>
											<?php foreach ($milestone_list as $m) : ?>
												<?php $isSelected = strcmp($m->milestone, $milestone) == 0 ? 'selected': ''; ?> 
													<option <?php $isSelected ?> value="<?= $m->milestone ?>"><?= $m->milestone ?></option>
											<?php endforeach ?>
										</select>
									</div>

									<div class="form-group col-md-4">
										<label for="activity_name"><?= $this->lang->line('al_activity_name') ?></label>
										<a class="btn-sm btn-default" id="al_tp_03" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_activity_name_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "activity_name") ?> data-field="activity_name" data-field_name="<?= $this->lang->line('al_activity_name') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<span id="count-b"></span>
										<textarea class="form-control" oninput="limitText(this, 50, 'b')" name="activity_name" id="al_txt_3" rows="1" required><?= $activity_name ?></textarea>
									</div>

									<div class="form-group col-md-6">
										<label for="project_phase"><?= $this->lang->line('al_project_phase') ?></label>
										<a class="btn-sm btn-default" id="al_tp_04" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_project_phase_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "project_phase") ?> data-field="project_phase" data-field_name="<?= $this->lang->line('al_project_phase') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<select class="form-control" name="project_phase" id="al_txt_4" required>
											<?php foreach ($phase_list as $p) : ?>
												<?php if (strcmp($p->project_phase, $project_phase) === 0) : ?>
													<option selected value="<?= $p->project_phase ?>"><?= $p->project_phase ?></option>
												<?php else : ?>
													<option value="<?= $p->project_phase ?>"><?= $p->project_phase ?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
									</div>

									<div class="form-group col-md-6">
										<label for="wbs_id"><?= $this->lang->line('wbs_id') ?></label>
										<a class="btn-sm btn-default" id="al_tp_05" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('wbs_id_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "wbs_id") ?> data-field="wbs_id" data-field_name="<?= $this->lang->line('wbs_id') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<span id="count-c"></span>
										<textarea class="form-control" oninput="limitText(this, 50, 'c')" name="wbs_id" id="al_txt_5" rows="1" required><?= $wbs_id ?></textarea>
									</div>

									<div class="form-group col-md-12">
										<label for="description"><?= $this->lang->line('al_description') ?></label>
										<a class="btn-sm btn-default" id="al_tp_06" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('al_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
										<a <?= fieldStatus($view_name, $id, "description") ?> data-field="description" data-field_name="<?= $this->lang->line('al_description') ?>" data-item_id="<?= $id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
										<span id="count-d"></span>
										<textarea class="form-control" oninput="limitText(this, 2000, 'd')" name="description" id="al_txt_6" required><?= $description ?></textarea>
									</div>

									<div class="col-md-12 m-t-15">
										<button onclick='goTo(`<?= base_url("schedule/activity-list/list/$project_id") ?>`)' type="button" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>

										<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
											<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<?php $this->load->view('frame/footer_view') ?>