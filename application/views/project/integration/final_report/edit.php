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
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
          </div>
        <?php elseif ($this->session->flashdata('error')) : ?>
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong><?php echo $this->session->flashdata('error'); ?></strong>
          </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="panel-body">
              <h1 class="page-header">

                <?= $this->lang->line('fr-title')  ?>

              </h1>
              <?php
              foreach ($final_report as $fr) {
              ?>

                <form method="POST" action="<?php echo base_url('integration/final-report/update'); ?>">
                  <input type="hidden" name="status" value="1">


                  <div class=" col-lg-06 form-group">
                  <label for="description"><?= $this->lang->line('fr-description') ?> </label>
                  <span class="frh_1">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="description" name="description"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="scope_objectives"><?= $this->lang->line('fr-scope_objectives') ?> </label>
                  <span class="frh_2">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-scope_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="scope_objectives" name="scope_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="quality_objectives"><?= $this->lang->line('fr-quality_objectives') ?> </label>
                  <span class="frh_3">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-quality_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="quality_objectives" name="quality_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="cost_objectives"><?= $this->lang->line('fr-cost_objectives') ?> </label>
                  <span class="frh_4">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-cost_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="cost_objectives" name="cost_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="schedule_objectives"><?= $this->lang->line('fr-schedule_objectives') ?> </label>
                  <span class="frh_5">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-schedule_objectives-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_objectives" name="schedule_objectives"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="summary_validation"><?= $this->lang->line('fr-summary_validation') ?> </label>
                  <span class="frh_6">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-summary_validation-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="summary_validation" name="summary_validation"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="summary_results"><?= $this->lang->line('fr-summary_results') ?> </label>
                  <span class="frh_7">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-summary_results-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="summary_results" name="summary_results"></textarea>
                  </div>
                </div>

                <div class=" col-lg-06 form-group">
                  <label for="summary_risks"><?= $this->lang->line('fr-summary_risks') ?> </label>
                  <span class="frh_8">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="fr_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('fr-summary_risks-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="summary_risks" name="summary_risks"></textarea>
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
  for (var i = 1; i <=8; i++) {
    if (document.getElementById("fr_tp_" + i).title == "") {
      document.getElementById("fr_tp_" + i).hidden = true;
    }
  }
</script>
<?php $this->load->view('frame/footer_view') ?>