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
                    <span class="pmp_1">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('products_services_obtained-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_1')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_1" name="products_services_obtained" required ="true" ><?php echo $pmp->products_services_obtained; ?></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="procurement_management"><?= $this->lang->line('pcmp_procurement') ?></label>
                    <span class="pmp_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('procurement_management-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_2')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_2" name="procurement_management"><?php echo $pmp->procurement_management; ?></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="schedule_procurement_activities"><?= $this->lang->line('pcmp_timetable') ?></label>
                    <span class="pmp_3">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schedule_procurement_activities-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_3')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_3" name="schedule_procurement_activities"><?php echo $pmp->schedule_procurement_activities; ?></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="performance_metrics"><?= $this->lang->line('pcmp_metrics') ?></label>
                    <span class="pmp_4">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_4')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_4" name="performance_metrics"><?php echo $pmp->performance_metrics; ?></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="constraint_assumption"><?= $this->lang->line('pcmp_constraints') ?></label>
                    <span class="pmp_5">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_5')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_5" name="constraint_assumption"><?php echo $pmp->constraint_assumption; ?></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="roles"><?= $this->lang->line('pcmp_roles') ?></label>
                    <span class="pmp_6">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_6')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_6" name="roles"><?php echo $pmp->roles; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="legal_jurisdiction"><?= $this->lang->line('pcmp_jurisdiction') ?></label>
                    <span class="pmp_7">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_7')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_7" name="roles"><?php echo $pmp->legal_jurisdiction; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="estimates"><?= $this->lang->line('pcmp_estimates') ?></label>
                    <span class="pmp_8">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_8')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_8" name="estimates"><?php echo $pmp->estimates; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="issues"><?= $this->lang->line('pcmp_issues') ?></label>
                    <span class="pmp_9">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_9')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_9" name="issues"><?php echo $pmp->issues; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sellers"><?= $this->lang->line('pcmp_sellers') ?></label>
                    <span class="pmp_10">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_10')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_10" name="sellers"><?php echo $pmp->sellers; ?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="strategy"><?= $this->lang->line('pcmp_strategy') ?></label>
                    <span class="pmp_11">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pmp_11')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pmp_txt_11" name="strategy"><?php echo $pmp->strategy; ?></textarea>
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