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

                <?= $this->lang->line('remp_title')  ?>

              </h1>
              <form method="POST" action="<?php echo base_url('resources/resource-mp/insert'); ?>">

                <input type="hidden" name="id" value="<?php echo $_SESSION['project_id'][0]; ?>">

                <!-- Textarea -->
                <div class=" col-lg-12 form-group">
                  <label for="roles_responsibilities"><?= $this->lang->line('remp_roles') ?> *</label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('human_resource-roles-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="roles_responsibilities" name="roles_responsibilities" required="true"></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="col-lg-6 form-group">
                  <label for="organizational_chart"><?= $this->lang->line('remp_chart') ?>
                  </label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('human_resource-chart-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="organizational_chart" name="organizational_chart"></textarea>
                  </div>
                </div>
                <!-- </nav> -->

                <!-- Textarea -->
                <div class=" col-lg-6 form-group">
                  <label for="staff_mp"><?= $this->lang->line('remp_staff') ?></label>
                  <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('human_resource-staff-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="staff_mp" name="staff_mp"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="identification_resources"><?= $this->lang->line('remp_identification_resources') ?></label>
                  <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="" name="identification_resources"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="acquiring_resources"><?= $this->lang->line('remp_acquiring_resources') ?></label>
                  <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="acquiring_resources" name="acquiring_resources"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="team_development"><?= $this->lang->line('remp_team') ?></label>
                  <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="team_development" name="team_development"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="training"><?= $this->lang->line('remp_training') ?></label>
                  <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="training" name="training"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="control"><?= $this->lang->line('remp_control') ?></label>
                  <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="control" name="control"></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="recognition_plan"><?= $this->lang->line('remp_plan') ?></label>
                  <a class=" btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="recognition_plan" name="recognition_plan"></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                  </button>
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
              </form>


              <!--1º preencher o nome da view-->
              <?php $view = array(
                "name" => "resource_management_plan",
              ); ?>

              <!--Carrega o form de envio e envia para ele o nome da view que tu setou -->
              <?php $this->load->view('upload/index', $view) ?>

              <!--Carrega as imagens do projeto de acordo com a view, utiliza id ou project_id pra pegar o id do projeto e criar a query-->
              <?php $this->load->view('upload/retrieve', $view) ?>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

<?php $this->load->view('frame/footer_view') ?>