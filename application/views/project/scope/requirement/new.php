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

                <?= $this->lang->line('rd_title')  ?>

              </h1>


              <form method="POST" action="<?php echo base_url() ?>scope/requirement-documentation/insert">

                <input type="hidden" name="project_id" value="<?= $project_id ?>">

                <div class=" col-lg-4 form-group">
                  <label for="associated_id"><?= $this->lang->line('rd_associated_id') ?> </label>
                  <span class="rd_1">45</span><?= $this->lang->line('character3') ?>
                  <a class="btn-sm btn-default"  id="rd_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_associated_id_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_1" type="text" name="associated_id" class="form-control input-md" onkeyup = "limite_textarea3(this.value, 'rd_1')" maxlength="45" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-8 form-group">
                  <label for="business_strategy"><?= $this->lang->line('rd_business_strategy') ?> </label>
                  <span class="rd_2">200</span><?= $this->lang->line('character4') ?>
                  <a class="btn-sm btn-default" id="rd_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_business_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input id="rd_txt_2" type="text" name="business_strategy" class="form-control input-md" onkeyup = "limite_textarea4(this.value, 'rd_2')" maxlength="200" oninput="eylem(this, this.value)" required="false">

                </div>

                <div class=" col-lg-12 form-group">
                  <label for="description"><?= $this->lang->line('rd_description') ?> </label>
                  <span class="rd_3">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_3')" id="rd_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="description"></textarea>
                  </div>
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="version"><?= $this->lang->line('rd_version') ?> </label>
                  <span class="rd_4">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_version_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_4" type="text" name="version" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="phase"><?= $this->lang->line('rd_phase') ?> </label>
                  <span class="rd_5">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_phase_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_5" type="text" name="phase" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="associated_delivery"><?= $this->lang->line('rd_associated_delivery') ?> </label>
                  <span class="rd_6">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_associated_delivery_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_6" type="text" name="associated_delivery" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_6')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="type"><?= $this->lang->line('rd_type') ?> </label>
                  <a class="btn-sm btn-default" id="rd_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <select class="form-control" id="type" name="type">
                    <option value="Legal"><?= $this->lang->line('type-legal') ?></option>
                    <option value="Business"><?= $this->lang->line('type-business') ?></option>
                    <option value="Stakeholder"><?= $this->lang->line('type-stakeholder') ?></option>
                    <option value="Product"><?= $this->lang->line('type-product') ?></option>
                    <option value="Project"><?= $this->lang->line('type-project') ?></option>
                  </select>

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="requester"><?= $this->lang->line('rd_requester') ?> </label>
                  <span class="rd_8">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_requester_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_8" type="text" name="requester" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_8')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="complexity"><?= $this->lang->line('rd_complexity') ?> </label>
                  <a class="btn-sm btn-default" id="rd_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_complexity_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <select class="form-control" id="complexity" name="complexity">
                    <option value="minimum"><?= $this->lang->line('complexity-minimum') ?></option>
                    <option value="Low"><?= $this->lang->line('complexity-low') ?></option>
                    <option value="Medium"><?= $this->lang->line('complexity-medium') ?></option>
                    <option value="High"><?= $this->lang->line('complexity-high') ?></option>
                    <option value="Highest"><?= $this->lang->line('complexity-highest') ?></option>
                  </select>

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="responsible"><?= $this->lang->line('rd_responsible') ?> </label>
                  <span class="rd_10">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_responsible_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_10" type="text" name="responsible" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_10')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="validity"><?= $this->lang->line('rd_validity') ?> </label>
                  <span class="rd_11">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_validity_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_11" type="text" name="validity" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_11')" maxlength="2000" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="priority"><?= $this->lang->line('rd_priority') ?> </label>
                  <span class="rd_12">255</span><?= $this->lang->line('character2') ?>
                  <a class="btn-sm btn-default" id="rd_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_priority_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <input id="rd_txt_12" type="text" name="priority" class="form-control input-md" onkeyup = "limite_textarea2(this.value, 'rd_12')" maxlength="255" oninput="eylem(this, this.value)" required="false">
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="acceptance_criteria"><?= $this->lang->line('rd_acceptance_criteria') ?> </label>
                  <span class="rd_13">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_acceptance_criteria_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_13')" id="rd_txt_13" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="acceptance_criteria"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="supporting_documentation"><?= $this->lang->line('rd_supporting_documentation') ?></label>
                  <span class="rd_14">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_14" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_supporting_documentation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_14')" id="rd_txt_14" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="supporting_documentation"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">             
                  <label for="situation"><?= $this->lang->line('situation') ?>Situation</label>
                  <span class="rd_15">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_15" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_situation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_15')" id="rd_txt_15" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="situation"></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                  </button>
              </form>

              <form action="<?php echo base_url() ?>scope/requirement-documentation/list/<?= $project_id ?>">
                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
<script>
for (var i = 1; i <= 15; i++) {
		if (document.getElementById("rd_tp_" + i).title == "") {
			document.getElementById("rd_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("rd_txt_" + i).value, "rd_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	function limite_textarea2(valor, txt) {
		var limite = 255;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	function limite_textarea3(valor, txt) {
		var limite = 45;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  function limite_textarea4(valor, txt) {
		var limite = 200;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
<!-- /.row -->

<?php $this->load->view('frame/footer_view') ?>