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
                    <span class="pcmp_1">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_products_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_1')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_1" name="products_services_obtained" required ="true" ><?php echo $pmp->products_services_obtained; ?></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="procurement_management"><?= $this->lang->line('pcmp_procurement') ?></label>
                    <span class="pcmp_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_procurement_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_2')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_2" name="procurement_management"><?php echo $pmp->procurement_management; ?></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="schedule_procurement_activities"><?= $this->lang->line('pcmp_timetable') ?></label>
                    <span class="pcmp_3">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_3')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_3" name="schedule_procurement_activities"></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="performance_metrics"><?= $this->lang->line('pcmp_metrics') ?></label>
                    <span class="pcmp_4">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('performance_metrics-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_4')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_4" name="performance_metrics"></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="constraint_assumption"><?= $this->lang->line('pcmp_constraints') ?></label>
                    <span class="pcmp_5">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_constraints_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_5')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_5" name="constraint_assumption"></textarea>	
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="roles"><?= $this->lang->line('pcmp_roles') ?></label>
                    <span class="pcmp_6">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_6')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_6" name="roles"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="legal_jurisdiction"><?= $this->lang->line('pcmp_jurisdiction') ?></label>
                    <span class="pcmp_7">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_jurisdiction_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_7')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_7" name="roles"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="estimates"><?= $this->lang->line('pcmp_estimates') ?></label>
                    <span class="pcmp_8">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_estimates_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_8')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_8" name="estimates"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="issues"><?= $this->lang->line('pcmp_issues') ?></label>
                    <span class="pcmp_9">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_risk_issues_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_9')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_9" name="issues"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="sellers"><?= $this->lang->line('pcmp_sellers') ?></label>
                    <span class="pcmp_10">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_sellers_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_10')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_10" name="sellers"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="strategy"><?= $this->lang->line('pcmp_strategy') ?></label>
                    <span class="pcmp_11">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="pcmp_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('pcmp_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'pcmp_11')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="pcmp_txt_11" name="strategy"></textarea>
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>


<script type="text/javascript">
	for (var i = 1; i <= 19; i++) {
		if (document.getElementById("pcmp_tp_" + i).title == "") {
			document.getElementById("pcmp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("pcmp_txt_" + i).value, "pcmp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>

<?php $this->load->view('frame/footer_view') ?>