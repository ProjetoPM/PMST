<body class="hold-transition skin-gray sidebar-mini">
	<script>
		(function() {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>
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

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								<?= $this->lang->line('cr_title')  ?>

							</h1>

							<?php extract($change_request); ?>

							<form action="<?= base_url() ?>integration/change-request/update/<?php echo $id; ?>" method="post">
								<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">

								<div class="col-lg-6 form-group">
									<label><?= $this->lang->line('cr_requester') ?></label>
									<a class="btn-sm btn-default" id="" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select name="requester" size="1" class="form-control" tabindex="1" required>
										<?php foreach ($stakeholder as $item) { ?>
											<option <?php if ($item->stakeholder_id == $requester) echo "selected"; ?> value="<?= $item->stakeholder_id; ?>">
												<?= getStakeholderName($item->stakeholder_id); ?></option>
										<?php  } ?>
									</select>
								</div>

								<div class="col-lg-6 form-group">
									<label for="number_id"><?= $this->lang->line('cr_number_id') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('number_id-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<input id="number_id" name="number_id" type="number" class="form-control input-md" required="false" value="<?php echo $number_id; ?>">
								</div>
								<div class="col-lg-3 form-group">
									<label for="type"><?= $this->lang->line('cr_type') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('type-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select class="form-control" id="type" name="type">
										<?=
										$opcoes = array("Corrective Action", "Preventive Action", "Defect Repair", "Update");
										foreach ($opcoes as $teste) {
											if ($teste == $type)
												echo "<option value=$teste selected='selected'>$teste</option>";
											else
												echo "<option value=$teste>$teste</option>";
										}
										?>
									</select>
								</div>

								<div class="col-lg-3 form-group">
									<label for="status"><?= $this->lang->line('cr_status') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('status-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<select class="form-control" id="status" name="status">
										<option value="Under Analysis" <?php if ($status == "Under Analysis") echo 'selected'; ?>><?= $this->lang->line('type_situation-analysis') ?></option>
										<!--<?= $this->lang->line('type_situation_analysis')?> -->

										<option value="Approved" <?php if ($status == "Approved") echo 'selected'; ?>><?= $this->lang->line('type_situation-approved') ?></option>

										<option value="Rejected" <?php if ($status == "Rejected") echo 'selected'; ?>><?= $this->lang->line('type_situation-rejected') ?></option>

										<option value="Canceled" <?php if ($status == "Canceled") echo 'selected'; ?>><?= $this->lang->line('type_situation-canceled') ?></option>
										
										<option value="Suspended" <?php if ($status == "Suspended") echo 'selected'; ?>><?= $this->lang->line('type_situation-suspended') ?></option>
									</select>
								</div>

								<div class="col-lg-3 form-group">
									<label><?= $this->lang->line('cr_request_date') ?></label>
									<div class="input-group">
										<input class="form-control input-md" id="request_date" placeholder="YYYY/MM/DD" type="date" name="request_date" value="<?php echo $request_date; ?>" />
									</div>
								</div>

								<div class="col-lg-3 form-group">
									<label><?= $this->lang->line('cr_committee_date') ?></label>
									<div class="input-group">
										<input class="form-control input-md" id="committee_date" placeholder="YYYY/MM/DD" type="date" name="committee_date" value="<?php echo $committee_date; ?>" />
									</div>
								</div>


								<div class=" col-lg-12 form-group">
									<label for="description"><?= $this->lang->line('cr_description') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="description" name="description" maxlength="1000"><?php echo $description; ?></textarea>
								</div>


								<div class=" col-lg-6 form-group">
									<label for="impacted_areas"><?= $this->lang->line('cr_impacted_areas') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('impacted_areas-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="impacted_areas" name="impacted_areas" maxlength="1000"><?php echo $impacted_areas; ?></textarea>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="impacted_docs"><?= $this->lang->line('cr_impacted_docs') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('impacted_docs-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="impacted_docs" name="impacted_docs" maxlength="1000"><?php echo $impacted_docs; ?></textarea>
								</div>



								<div class=" col-lg-6 form-group">
									<label for="justification"><?= $this->lang->line('cr_justification') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('justification-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="justification" name="justification" maxlength="1000"><?php echo $justification; ?></textarea>
								</div>

								<div class=" col-lg-6 form-group">
									<label for="comments"><?= $this->lang->line('cr_comments') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="comments" name="comments" maxlength="1000"><?php echo $comments; ?></textarea>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="committee_opinion"><?= $this->lang->line('cr_committee_opinion') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('committee_opinion-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="committee_opinion" name="committee_opinion" maxlength="1000"><?php echo $committee_opinion; ?></textarea>
								</div>

								<div class=" col-lg-12 form-group">
									<label for="manager_opinion"><?= $this->lang->line('cr_manager_opinion') ?> </label>
									<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manager_opinion-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="manager_opinion" name="manager_opinion" maxlength="1000"><?php echo $manager_opinion; ?></textarea>
								</div>






								<div class="col-lg-12">
									<button id="change_request-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
										<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
									</button>
							</form>

							<form action="<?php echo base_url() ?>integration/change-request/list/<?= $project_id ?>">
								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>

<?php $this->load->view('frame/footer_view') ?>