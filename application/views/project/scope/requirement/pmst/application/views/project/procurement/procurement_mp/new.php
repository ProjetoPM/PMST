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
        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />

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
        <div class="row">
          <div class="col-lg-12">
            <div class="panel-body">
              <h1 class="page-header">

                <?= $this->lang->line('pcmp_title')  ?>

              </h1>
              <form method="POST" action="<?php echo base_url('procurement/procurement-mp/insert'); ?>">

                <input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">
                <input type="hidden" name="status" value="1">

                <!-- Textarea -->
                <div class="form-group">
                  <label for="products_services_obtained"><?= $this->lang->line('pcmp_products') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('products_services_obtained-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="products_services_obtained" name="products_services_obtained"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="procurement_management"><?= $this->lang->line('pcmp_procurement') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('procurement_management-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="procurement_management" name="procurement_management"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="schedule_procurement_activities"><?= $this->lang->line('pcmp_timetable') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schedule_procurement_activities-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_procurement_activities" name="schedule_procurement_activities"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="performance_metrics"><?= $this->lang->line('pcmp_metrics') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="performance_metrics" name="performance_metrics"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="constraint_assumption"><?= $this->lang->line('pcmp_constraints') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="constraint_assumption" name="constraint_assumption"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="roles"><?= $this->lang->line('pcmp_roles') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="roles" name="roles"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="legal_jurisdiction"><?= $this->lang->line('pcmp_jurisdiction') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="legal_jurisdiction" name="legal_jurisdiction"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="estimates"><?= $this->lang->line('pcmp_estimates') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="estimates" name="estimates"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="issues"><?= $this->lang->line('pcmp_issues') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="issues" name="issues"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="sellers"><?= $this->lang->line('pcmp_sellers') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="sellers" name="sellers"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="strategy"><?= $this->lang->line('pcmp_strategy') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="strategy" name="strategy"></textarea>
                  </div>
                </div>


                <div class="col-lg-12 form-group">
                  <label><?= $this->lang->line('communication') ?></label><br>
                  <a href="<?= base_url() ?>communication/communications-mp/list/<?= $_SESSION['project_id'] ?>"><?= $this->lang->line('communication_link') ?></a>
                </div>

                <div class="col-lg-12 form-group">
                  <label><?= $this->lang->line('change') ?></label><br>
                  <a href="<?= base_url() ?>integration/project-mp/new/<?= $_SESSION['project_id'] ?>"><?= $this->lang->line('change_link') ?></a>
                </div>

                <div class="col-lg-12 form-group">
                  <label><?= $this->lang->line('configuration') ?></label><br>
                  <a href="<?= base_url() ?>integration/project-mp/new/<?= $_SESSION['project_id'] ?>"><?= $this->lang->line('configuration_link') ?></a>
                </div>

                <div class="col-lg-12">
                  <button id="procurement_mp-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                  </button>
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
              </form>


              <!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->


              <!-- /.row -->
              <!-- Envia o nome da view como parametro -->
              <?php $view = array(
                "name" => "procurement_management_plan",
              ); ?>

              <!--aqui-->

              <!--Carrega o form de envio-->
              <?php $this->load->view('upload/index', $view) ?>
              <!--Carrega as imagens do projeto-->
              <?php $this->load->view('upload/retrieve', $view) ?>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>


<?php $this->load->view('frame/footer_view') ?>