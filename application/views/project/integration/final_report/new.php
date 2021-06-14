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

                <?= $this->lang->line('fr_title')  ?>

              </h1>
            
              <form method="POST" action="<?php echo base_url('integration/final-report/insert'); ?>">

                <input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">

                <div class=" col-lg-06 form-group">
                  <label for="description"><?= $this->lang->line('fr-description') ?> </label>
                  <span class="fr_1">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_1')" id="fr_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="description"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="scope_objectives"><?= $this->lang->line('fr-scope_objectives') ?> </label>
                  <span class="fr_2">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-scope_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_2')" id="fr_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="scope_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="quality_objectives"><?= $this->lang->line('fr-quality_objectives') ?> </label>
                  <span class="fr_3">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-quality_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_3')" id="fr_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="quality_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="cost_objectives"><?= $this->lang->line('fr-cost_objectives') ?> </label>
                  <span class="fr_4">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-cost_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_4')" id="fr_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="cost_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="schedule_objectives"><?= $this->lang->line('fr-schedule_objectives') ?> </label>
                  <span class="fr_5">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-schedule_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_5')" id="fr_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="summary_validation"><?= $this->lang->line('fr-summary_validation') ?> </label>
                  <span class="fr_6">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-summary_validation-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_6')" id="fr_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="summary_validation"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="summary_results"><?= $this->lang->line('fr-summary_results') ?> </label>
                  <span class="fr_7">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-summary_results-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_7')" id="fr_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="summary_results"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="summary_risks"><?= $this->lang->line('fr-summary_risks') ?> </label>
                  <span class="fr_8">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-summary_risks-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'fr_8')" id="fr_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="summary_risks"></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <button id="new_final_report-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                  </button>
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
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
<script>
  for (var i = 1; i <= 8; i++) {
    if (document.getElementById("fr_tp_" + i).title == "") {
      document.getElementById("fr_tp_" + i).hidden = true;
      
    }
    limite_textarea(document.getElementById("fr_txt_" + i).value, "fr_" + i);
  }

  function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
</script>
<?php $this->load->view('frame/footer_view') ?>