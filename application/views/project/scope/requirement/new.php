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
                  <label for="associated_id"><?= $this->lang->line('associated_id') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('associated_id-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" type="text" id="associated_id" name="associated_id" >

                </div>

                <div class=" col-lg-8 form-group">
                  <label for="business_strategy"><?= $this->lang->line('rd_business_strategy') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('business_strategy-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" type="text" id="business_strategy" name="business_strategy" maxlength="200">

                </div>

                <div class=" col-lg-12 form-group">
                  <label for="description"><?= $this->lang->line('rd_description') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="description" name="description" maxlength="2000"></textarea>

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="version"><?= $this->lang->line('rd_version') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('version-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" type="text" id="version" name="version" >

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="phase"><?= $this->lang->line('rd_phase') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('phase-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" type="text" id="phase" name="phase" >

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="associated_delivery"><?= $this->lang->line('rd_associated_delivery') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('associated_delivery-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" type="text" id="associated_delivery" name="associated_delivery" >

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="type"><?= $this->lang->line('rd_type') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('type-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

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
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('requester-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input type="text" class="form-control" id="requester" name="requester" >

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="complexity"><?= $this->lang->line('rd_complexity') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('complexity-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

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
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" id="responsible" name="responsible" >

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="validity"><?= $this->lang->line('rd_validity') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('validity-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" id="validity" name="validity" >

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="priority"><?= $this->lang->line('rd_priority') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('priority-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" type="text" id="priority" name="priority" maxlength="255">

                </div>

                <div class=" col-lg-12 form-group">
                  <label for="acceptance_criteria"><?= $this->lang->line('rd_acceptance_criteria') ?> </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('acceptance_criteria-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="acceptance_criteria" name="acceptance_criteria" maxlength="2000"></textarea>

                </div>

                <div class=" col-lg-12 form-group">
                  <label for="supporting_documentation"><?= $this->lang->line('rd_supporting_documentation') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('supporting_documentation-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" id="supporting_documentation" name="supporting_documentation" >

                </div>

                <div class=" col-lg-12 form-group">
                  <label for="supporting_documentation"><?= $this->lang->line('rd_supporting_documentation') ?></label>
                  <label for="situation"><?= $this->lang->line('situation') ?>Situation</label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('situation-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <input class="form-control" id="requirement_situation" name="requirement_situation" >

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
for (var i = 1; i <= 7; i++) {
		if (document.getElementById("cl_tp_" + i).title == "") {
			document.getElementById("cl_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("cl_txt_" + i).value, "cl_" + i);
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
  </script>
<!-- /.row -->

<?php $this->load->view('frame/footer_view') ?>