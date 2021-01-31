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

                <?= $this->lang->line('business_case-title')  ?>

              </h1>
              <?php
              foreach ($business_case as $bc) {
              ?>

                <form method="POST" action="<?php echo base_url('integration/business-case/update'); ?>">
                  <input type="hidden" name="status" value="1">


                  <div class=" col-lg-12 form-group">
                    <label for="business_deals"><?= $this->lang->line('business_case-business_deals') ?> </label>
                    <a class="btn-sm btn-default" id="bc_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('business_case-business_deals-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="business_deals" name="business_deals"><?php echo $bc->business_deals; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="situation_analysis"><?= $this->lang->line('business_case-situation_analysis') ?> </label>
                    <a class="btn-sm btn-default" id="bc_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('business_case-situation_analysis-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="situation_analysis" name="situation_analysis"><?php echo $bc->situation_analysis; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="recommendation"><?= $this->lang->line('business_case-recommendation') ?> </label>
                    <a class="btn-sm btn-default" id="bc_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('business_case-recommendation-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="recommendation" name="recommendation"><?php echo $bc->recommendation; ?></textarea>
                    </div>
                  </div>


                  <div class=" col-lg-12 form-group">
                    <label for="evaluation"><?= $this->lang->line('business_case-evaluation') ?> </label>
                    <a class="btn-sm btn-default" id="bc_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('business_case-evaluation-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="evaluation" name="evaluation"><?php echo $bc->evaluation; ?></textarea>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <button id="new_business_case-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
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
    if (document.getElementById("bc_tp_" + i).title == "") {
      document.getElementById("bc_tp_" + i).hidden = true;
    }
  }
</script>
<?php $this->load->view('frame/footer_view') ?>