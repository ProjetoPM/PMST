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
          </div>f
        <?php endif; ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel-body">
              <h1 class="page-header">

                <?= $this->lang->line('pss-title')  ?>

              </h1>

              <!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php $view_name = "project scope statement";
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>


              <?php
              foreach ($scope_specification as $scope) {
              ?>
                <form method="POST" action="<?php echo base_url('scope/project-scope-statement/update'); ?>">

                <div class="col-lg-12 form-group">
									<label for="scope_description"><?= $this->lang->line('pss-desc') ?></label>
									<span class="pss_1">2000</span><?= $this->lang->line('character') ?>
									<a class="btn-sm btn-default" id="pss_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pss-desc-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $scope->scope_specification_id, "scope_description") ?> data-field="scope_description" data-field_name="<?= $this->lang->line('pss-desc') ?>" data-item_id="<?= $scope->scope_specification_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
									<div>
										<textarea onkeyup="limite_textarea(this.value, 'pss_1')" id="pss_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="scope_description"><?= $scope->scope_description; ?></textarea>
									</div>
								</div>

                <div class="col-lg-12 form-group">
                  <label for="acceptance_criteria"><?= $this->lang->line('pss-accept') ?></label>
                  <span class="pss_2">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="pss_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pss-accept-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $scope->scope_specification_id, "acceptance_criteria") ?> data-field="acceptance_criteria" data-field_name="<?= $this->lang->line('pss-accept') ?>" data-item_id="<?= $scope->scope_specification_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'pss_2')" id="pss_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="acceptance_criteria"><?= $scope->acceptance_criteria; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="deliveries"><?= $this->lang->line('pss-deli') ?></label>
                  <span class="pss_3">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="pss_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pss-deli-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $scope->scope_specification_id, "deliveries") ?> data-field="deliveries" data-field_name="<?= $this->lang->line('pss-deli') ?>" data-item_id="<?= $scope->scope_specification_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'pss_3')" id="pss_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="deliveries"><?= $scope->deliveries; ?></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="exclusions"><?= $this->lang->line('pss-exclu') ?></label>
                  <span class="pss_4">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="pss_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pss-exclu-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $scope->scope_specification_id, "exclusions") ?> data-field="exclusions" data-field_name="<?= $this->lang->line('pss-exclu') ?>" data-item_id="<?= $scope->scope_specification_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'pss_4')" id="pss_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="exclusions"><?= $scope->exclusions; ?></textarea>
                  </div>
                </div>

                  <div class="col-lg-12">
                    <button id="new_scope_specification-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                      <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                    </button>
                </form>

                <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
                  <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                </form>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
<script>
for (var i = 1; i <= 4; i++) {
		if (document.getElementById("pss_tp_" + i).title == "") {
			document.getElementById("pss_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("pss_txt_" + i).value, "pss_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>

<?php $this->load->view('frame/footer_view') ?>