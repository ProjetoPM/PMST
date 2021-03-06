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

                <?= $this->lang->line('ssp_title')  ?>

              </h1>
              <?php
              foreach ($scope_specification as $scope) {
              ?>
                <form method="POST" action="<?php echo base_url('scope/project-scope-statement/update'); ?>">

                  <div class=" col-lg-12 form-group">
                    <label for="scope_description"><?= $this->lang->line('scope_spec-desc') ?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-desc-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="scope_description" name="scope_description" required="true"><?= $scope->scope_description; ?></textarea>
                    </div>
                  </div>


                  <div class="col-lg-12 form-group">
                    <label for="acceptance_criteria"><?= $this->lang->line('scope_spec-accept') ?>
                    </label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-accept-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="acceptance_criteria" name="acceptance_criteria"><?= $scope->acceptance_criteria; ?></textarea>
                    </div>
                  </div>


                  <div class="col-lg-12 form-group">
                    <label for="deliveries"><?= $this->lang->line('scope_spec-deli') ?>
                    </label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-deli-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="deliveries" name="deliveries"><?= $scope->deliveries; ?></textarea>
                    </div>
                  </div>


                  <div class=" col-lg-12 form-group">
                    <label for="exclusions"><?= $this->lang->line('scope_spec-exclu') ?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-exclu-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                    <div>
                      <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="exclusions" name="exclusions"><?= $scope->exclusions; ?></textarea>
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


<?php $this->load->view('frame/footer_view') ?>