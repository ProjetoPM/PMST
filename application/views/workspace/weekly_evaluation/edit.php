<body class="hold-transition skin-gray sidebar-mini">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php $this->load->view('errors/exceptions') ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('we_title')  ?>
							</h1>
							<?php extract($weekly_evaluation) ?>

							<form method="POST" action="<?php echo base_url() ?>weekly-evaluation/update/<?php echo $weekly_evaluation[0]->weekly_evaluation_id ?>">

								<div class=" col-lg-3 form-group">
									<label for="name"><?= $this->lang->line('we_name') ?> </label>
									<div>
										<input type="text" class="form-control" id="name" name="name" maxlength="255" value="<?= $weekly_evaluation[0]->name ?>">
									</div>
								</div>

								<div class="col-lg-3 form-group">
									<label><?= $this->lang->line('we_score_metric') ?></label>
									<span class="form-control" disabled><?= $weekly_evaluation[0]->score_metric_name ?></span>
								</div>
								

								<div class="col-lg-3 form-group">
									<label><?= $this->lang->line('we_start_date') ?></label>
									<div>
										<input autocomplete="off" class="form-control input-md" id="date" placeholder="YYYY/MM/DD" type="date" name="start_date" required="true" value="<?php echo $weekly_evaluation[0]->start_date ?>" />
									</div>
								</div>

								<div class=" col-lg-3 form-group">
									<label><?= $this->lang->line('we_end_date') ?></label>
									<div>
										<input autocomplete="off" class="form-control input-md" id="date" placeholder="YYYY/MM/DD" type="date" name="end_date" required="true" value="<?php echo $weekly_evaluation[0]->end_date ?>" />
									</div>
								</div>

								<div class=" col-lg-3 form-group">
									<label><?= $this->lang->line('we_deadline') ?></label>
									<div>
										<input autocomplete="off" class="form-control input-md" id="date" placeholder="YYYY/MM/DD" type="date" name="deadline" required="true" value="<?php echo $weekly_evaluation[0]->deadline ?>" />
									</div>
								</div>
								
								<div class=" col-lg-5 form-group">
									<label for="type"><?= $this->lang->line('we_type') ?></label>
									<select name="type" class="form-control">
										<?php if($weekly_evaluation[0]->individual_or_group != null) {?>
										"<option value="<?php echo $weekly_evaluation[0]->individual_or_group ?>" ><?= $this->lang->line('selected') ?></option>" 
										<?php } ?>
										<option value="0"><?= $this->lang->line('we_individual') ?></option>
										<option value="1"><?= $this->lang->line('we_group') ?></option>
									</select>
								</div>

								<div class="col-lg-4 form-group">
									<label for="status"><?= $this->lang->line('we_status') ?></label>
									<select name="status" class="form-control">
									<?php if($weekly_evaluation[0]->status != null) {?>
										"<option value="<?php echo $weekly_evaluation[0]->status ?>" ><?= $this->lang->line('selected') ?></option>" 
										<?php } ?>
										<option value="1"><?= $this->lang->line('we_open') ?></option>
										<option value="0"><?= $this->lang->line('we_closed') ?></option>
									</select>
								</div>

								<div class="col-lg-12">
									<button id="stakeholder-submit" style="margin-top: 30px;" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url("weekly-evaluation/list") ?>">
								<button style="margin-top: 30px;" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
                        </div>
                    </div>
                </div>
			</section>
		</div>
	</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<?php $this->load->view('frame/footer_view') ?>