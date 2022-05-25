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
              <div class="page-header">
                <h1>
                  <?= $this->lang->line('bc_title') ?>

                  <?php $view_name = "business case" ?>
                  <?php $this->load->view('construction_services/rating', array(
                    "view_name" => $view_name,
                  )) ?>
                </h1>
              </div>

              <!-- <input type="text" class="rating rating-loading" value="3.75" data-size="xl" data-theme="krajee-fa" title=""> -->

              <!-- avaliação -->
              <link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
              <?php
              getViewFields($view_name);
              ?>
              <?php $this->load->view('construction_services/write_field_evaluation') ?>

              <?php
              extract($business_case);
              ?>

                <form method="POST" action="<?php echo base_url('integration/business-case/update'); ?>">
                  <input type="hidden" name="status" value="1">


                  <div class=" col-lg-12 form-group">
                    <label for="business_deals"><?= $this->lang->line('bc_business_deals') ?> </label>
                    <span class="bc_1">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_business_deals_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $business_case[0]->business_case_id, "business_deals") ?> data-field="business_deals" data-field_name="<?= $this->lang->line('bc_business_deals') ?>" data-item_id="<?= $business_case[0]->business_case_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bc_1')" id="bc_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="business_deals"><?=  $business_case[0]->business_deals; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="situation_analysis"><?= $this->lang->line('bc_situation_analysis') ?> </label>
                    <span class="bc_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_situation_analysis_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $business_case[0]->business_case_id, "situation_analysis") ?> data-field="situation_analysis" data-field_name="<?= $this->lang->line('bc_situation_analysis') ?>" data-item_id="<?= $business_case[0]->business_case_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bc_2')" id="bc_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="situation_analysis"><?= $business_case[0]->situation_analysis; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="recommendation"><?= $this->lang->line('bc_recommendation') ?> </label>
                    <span class="bc_3">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_recommendation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $business_case[0]->business_case_id, "recommendation") ?> data-field="recommendation" data-field_name="<?= $this->lang->line('bc_recommendation') ?>" data-item_id="<?= $business_case[0]->business_case_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bc_3')" id="bc_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendation"><?= $business_case[0]->recommendation; ?></textarea>
                    </div>
                  </div>


                  <div class=" col-lg-12 form-group">
                    <label for="evaluation"><?= $this->lang->line('bc_evaluation') ?> </label>
                    <span class="bc_4">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_evaluation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $business_case[0]->business_case_id, "evaluation") ?> data-field="evaluation" data-field_name="<?= $this->lang->line('bc_evaluation') ?>" data-item_id="<?= $business_case[0]->business_case_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bc_4')" id="bc_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="evaluation"><?= $business_case[0]->evaluation; ?></textarea>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <button id="new_bc_submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
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
<script type="text/javascript">
  for (var i = 1; i <= 4; i++) {
    if (document.getElementById("bc_tp_" + i).title == "") {
      document.getElementById("bc_tp_" + i).hidden = true;
    }
    limite_textarea(document.getElementById("bc_txt_" + i).value, "bc_" + i);
  }

  function limite_textarea(valor, txt) {
    var limite = 2000;
    var caracteresDigitados = valor.length;
    var caracteresRestantes = limite - caracteresDigitados;
    $("." + txt).text(caracteresRestantes);
  }
</script>


<?php $this->load->view('frame/footer_view') ?>