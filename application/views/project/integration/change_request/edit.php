<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="pageheader"> <?= $this->lang->line('change_request-title')  ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>

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
	<!-- /.row -->
	<!-- acessa o objeto do array -->
	<div class="row">
		<div class="col-lg-12">

			<?php extract($change_request); ?>

			<form action="<?= base_url() ?>ChangeRequest/update/<?php echo $id; ?>" method="post">
				<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">

				<div class=" col-lg-3 form-group">
					<label for="requester"><?= $this->lang->line('requester') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('requester-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<input id="requester" name="requester" type="text" class="form-control input-md" required="false" value="<?php echo $requester; ?>">
				</div>

				<div class=" col-lg-5 form-group">
					<label for="number_id"><?= $this->lang->line('number_id') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('number_id-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<input id="number_id" name="number_id" type="number" class="form-control input-md" required="false" value="<?php echo $number_id; ?>">
				</div>

				<div class=" col-lg-3 form-group">
					<label><?= $this->lang->line('request_date') ?></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="request_date" placeholder="YYYY/MM/DD" type="date" name="request_date" value="<?php echo $request_date; ?>" />
					</div>
				</div>



				<div class=" col-lg-6 form-group">
					<label for="description"><?= $this->lang->line('description') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="description" name="description" maxlength="1000"><?php echo $description; ?></textarea>
				</div>

				<div class=" col-lg-6 form-group">
					<label for="type"><?= $this->lang->line('type') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('type-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="type" name="type" maxlength="1000"><?php echo $type; ?></textarea>
				</div>



				<div class=" col-lg-6 form-group">
					<label for="impacted_areas"><?= $this->lang->line('impacted_areas') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('impacted_areas-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="impacted_areas" name="impacted_areas" maxlength="1000"><?php echo $impacted_areas; ?></textarea>
				</div>

				<div class=" col-lg-6 form-group">
					<label for="impacted_docs"><?= $this->lang->line('impacted_docs') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('impacted_docs-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="impacted_docs" name="impacted_docs" maxlength="1000"><?php echo $impacted_docs; ?></textarea>
				</div>



				<div class=" col-lg-6 form-group">
					<label for="justification"><?= $this->lang->line('justification') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('justification-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="justification" name="justification" maxlength="1000"><?php echo $justification; ?></textarea>
				</div>

				<div class=" col-lg-6 form-group">
					<label for="comments"><?= $this->lang->line('comments') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('comments-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="comments" name="comments" maxlength="1000"><?php echo $comments; ?></textarea>
				</div>



				<div class=" col-lg-6 form-group">
					<label for="manager_opinion"><?= $this->lang->line('manager_opinion') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('manager_opinion-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="manager_opinion" name="manager_opinion" maxlength="1000"><?php echo $manager_opinion; ?></textarea>
				</div>

				<div class=" col-lg-6 form-group">
					<label for="committee_opinion"><?= $this->lang->line('committee_opinion') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('committee_opinion-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="committee_opinion" name="committee_opinion" maxlength="1000"><?php echo $committee_opinion; ?></textarea>
				</div>


				<div class=" col-lg-6 form-group">
					<label for="status"><?= $this->lang->line('status') ?> </label>
					<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('status-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
					<input id="status" name="status" type="text" class="form-control input-md" required="false" value="<?php echo $status; ?>">
				</div>

				<div class="col-lg-6">
					<label><?= $this->lang->line('committee_date') ?></label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input class="form-control" id="committee_date" placeholder="YYYY/MM/DD" type="date" name="committee_date" value="<?php echo $committee_date; ?>" />
					</div>
				</div>



				<div class="col-lg-12">
					<button id="change_request-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
						<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
					</button>
			</form>

			<form action="<?php echo base_url() ?>ChangeRequest/listp/<?= $project_id ?>">
				<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('frame/footer_view') ?>