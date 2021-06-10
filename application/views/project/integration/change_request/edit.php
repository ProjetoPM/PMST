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

								<div class=" col-lg-3 form-group">
                  <label for="requester"><?= $this->lang->line('cr_requester') ?> </label>
                  <span class="cr_1">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_requester_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
									<input onkeyup="limite_textarea(this.value, 'cr_1')" id="cr_txt_1" maxlength="2000" oninput="eylem(this, this.value)"  class="form-control input-md" name="requester" type="text" required="false" value="<?php echo $requester; ?>">
                </div>

                <div class=" col-lg-5 form-group">
                  <label for="number_id"><?= $this->lang->line('cr_number_id') ?> </label>
                  <a class="btn-sm btn-default" id="cr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_number_id_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="number_id" name="number_id" type="number" class="form-control input-md" required="false" style="width:1" value="<?php echo $number_id; ?>">
                </div>

                <div class=" col-lg-3 form-group">
                  <label><?= $this->lang->line('cr_request_date') ?></label>
                  <a class="btn-sm btn-default" id="cr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_request_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control" id="request_date" placeholder="YYYY/MM/DD" type="date" name="request_date" value="<?php echo $request_date; ?>" />
                  </div>
                </div>


                <div class=" col-lg-6 form-group">
                  <label for="description"><?= $this->lang->line('cr_description') ?> </label>
                  <span class="cr_4">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_4')" id="cr_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="description"><?php echo $description; ?></textarea>
									</div>
                </div>

                <div class=" col-lg-6 form-group">
                  <label for="type"><?= $this->lang->line('cr_type') ?> </label>
                  <span class="cr_5">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_5')" id="cr_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="type"><?php echo $type; ?></textarea>
									</div>
                </div>

                <div class=" col-lg-6 form-group">
                  <label for="impacted_areas"><?= $this->lang->line('cr_impacted_areas') ?> </label>
                  <span class="cr_6">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_impacted_areas_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_6')" id="cr_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="impacted_areas"><?php echo $impacted_areas; ?></textarea>
									</div>
                </div>

                <div class=" col-lg-6 form-group">
                  <label for="impacted_docs"><?= $this->lang->line('cr_impacted_docs') ?> </label>
                  <span class="cr_7">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_impacted_docs_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_7')" id="cr_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="impacted_docs"><?php echo $impacted_docs; ?></textarea>
									</div>
                </div>

                <div class=" col-lg-6 form-group">
                  <label for="justification"><?= $this->lang->line('cr_justification') ?> </label>
                  <span class="cr_8">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_justification_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_8')" id="cr_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="justification"><?php echo $justification; ?></textarea>
									</div>
                </div>

                <div class=" col-lg-6 form-group">
                  <label for="comments"><?= $this->lang->line('cr_comments') ?> </label>
                  <span class="cr_9">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_comments_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_9')" id="cr_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="comments"><?php echo $comments; ?></textarea>
									</div>
                </div>

                <div class=" col-lg-6 form-group">
                  <label for="manager_opinion"><?= $this->lang->line('cr_manager_opinion') ?> </label>
                  <span class="cr_10">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_manager_opinion_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_10')" id="cr_txt_10" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="manager_opinion"><?php echo $manager_opinion; ?></textarea>
									</div>
                </div>

                <div class=" col-lg-6 form-group">
                  <label for="committee_opinion"><?= $this->lang->line('cr_committee_opinion') ?> </label>
                  <span class="cr_11">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_committee_opinion_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
										<textarea onkeyup="limite_textarea(this.value, 'cr_11')" id="cr_txt_11" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="committee_opinion"><?php echo $committee_opinion; ?></textarea>
									</div>
                </div>


                <div class=" col-lg-6 form-group">
                  <label for="status"><?= $this->lang->line('cr_status') ?> </label>
                  <span class="cr_12">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="cr_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_status_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input onkeyup="limite_textarea(this.value, 'cr_12')" id="cr_txt_12" maxlength="2000" oninput="eylem(this, this.value)"  class="form-control input-md" name="status" type="text" required="false" value="<?php echo $status; ?>">
                </div>

                <div class="col-lg-3">
                  <label><?= $this->lang->line('cr_committee_date') ?></label>
                  <a class="btn-sm btn-default" id="cr_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cr_committee_date_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
	for (var i = 1; i <= 13; i++) {
		if (document.getElementById("cr_tp_" + i).title == "") {
			document.getElementById("cr_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("cr_txt_" + i).value, "cr_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>

  
<?php $this->load->view('frame/footer_view') ?>