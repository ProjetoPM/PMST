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

                <?= $this->lang->line('benefits-title')  ?>
                <?php $view_name = "benefits management plan"; ?>
                 
				        <?php $this->load->view('construction_services/write_field_evaluation') ?>
                <?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
              </h1>

              <!-- avaliação -->
              <link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
              <?php getViewFields($view_name); ?>


              <?php
              foreach ($benefits_mp as $bmp) {
              ?>

                <form method="POST" action="<?php echo base_url('integration/benefits-mp/update'); ?>">
                  <input type="hidden" name="status" value="1">

                  <div class=" col-lg-12 form-group">
                    <label for="target_benefits"><?= $this->lang->line('bmp_target_benefits') ?> </label>
                    <a class="btn-sm btn-default" id="bmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_target_benefits_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $bmp->benefits_plan_id, "target_benefits") ?> data-field="target_benefits" data-field_name="<?= $this->lang->line('bmp_target_benefits') ?>" data-item_id="<?= $bmp->benefits_plan_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <span id="count-a"></span>
                    <div>
                      <textarea 
                        oninput="limitText(this, 2e3, 'a')" 
                        placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                        rows="3"
                        onkeyup="limite_textarea(this.value, 'bmp_1')" 
                        id="bmp_txt_1" 
                        maxlength="2000"
                        class="form-control" 
                        name="target_benefits"
                      ><?= $bmp->target_benefits; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="strategic_alignment"><?= $this->lang->line('bmp_strategic_alignment') ?> </label>
                    <a class="btn-sm btn-default" id="bmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_strategic_alignment_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $bmp->benefits_plan_id, "strategic_alignment") ?> data-field="strategic_alignment" data-field_name="<?= $this->lang->line('bmp_strategic_alignment') ?>" data-item_id="<?= $bmp->benefits_plan_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <span id="count-b"></span>
                    <div>
                      <textarea 
                        oninput="limitText(this, 2e3, 'b')" 
                        placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                        rows="3"
                        onkeyup="limite_textarea(this.value, 'bmp_2')" 
                        id="bmp_txt_2" 
                        maxlength="2000"
                        class="form-control" 
                        name="strategic_alignment"
                      ><?php echo $bmp->strategic_alignment; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="schedule_benefit"><?= $this->lang->line('bmp_schedule_benefit') ?> </label>
                    <a class="btn-sm btn-default" id="bmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_schedule_benefit_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $bmp->benefits_plan_id, "schedule_benefit") ?> data-field="schedule_benefit" data-field_name="<?= $this->lang->line('bmp_schedule_benefit') ?>" data-item_id="<?= $bmp->benefits_plan_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <span id="count-c"></span>
                    <div>
                      <textarea 
                        oninput="limitText(this, 2e3, 'c')" 
                        placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                        rows="3"
                        onkeyup="limite_textarea(this.value, 'bmp_3')" 
                        id="bmp_txt_3" 
                        maxlength="2000"
                        class="form-control" 
                        name="schedule_benefit"
                      ><?php echo $bmp->schedule_benefit; ?></textarea>
                    </div>
                  </div>


                  <div class=" col-lg-12 form-group">
                    <label for="benefits_owner"><?= $this->lang->line('bmp_benefits_owner') ?> </label>
                    <a class="btn-sm btn-default" id="bmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_benefits_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $bmp->benefits_plan_id, "benefits_owner") ?> data-field="benefits_owner" data-field_name="<?= $this->lang->line('bmp_benefits_owner') ?>" data-item_id="<?= $bmp->benefits_plan_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <span id="count-d"></span>
                    <div>
                      <textarea 
                        oninput="limitText(this, 2e3, 'd')" 
                        placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                        rows="3"
                        onkeyup="limite_textarea(this.value, 'bmp_4')" 
                        id="bmp_txt_4" 
                        maxlength="2000"
                        class="form-control" 
                        name="benefits_owner"
                      ><?php echo $bmp->benefits_owner; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="indicators"><?= $this->lang->line('bmp_indicators') ?> </label>
                    <a class="btn-sm btn-default" id="bmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_indicators_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $bmp->benefits_plan_id, "indicators") ?> data-field="indicators" data-field_name="<?= $this->lang->line('bmp_indicators') ?>" data-item_id="<?= $bmp->benefits_plan_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <span id="count-e"></span>
                    <div>
                      <textarea 
                        oninput="limitText(this, 2e3, 'e')" 
                        placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                        rows="3"
                        onkeyup="limite_textarea(this.value, 'bmp_5')" 
                        id="bmp_txt_5" 
                        maxlength="2000"
                        class="form-control" 
                        name="indicators"
                      ><?php echo $bmp->indicators; ?></textarea>
                    </div>
                  </div>


                  <div class=" col-lg-12 form-group">
                    <label for="premises"><?= $this->lang->line('bmp_premises') ?> </label>
                    <a class="btn-sm btn-default" id="bmp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_premises_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $bmp->benefits_plan_id, "premises") ?> data-field="premises" data-field_name="<?= $this->lang->line('bmp_premises') ?>" data-item_id="<?= $bmp->benefits_plan_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <span id="count-f"></span>
                    <div>
                      <textarea 
                        oninput="limitText(this, 2e3, 'f')" 
                        placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                        rows="3"
                        onkeyup="limite_textarea(this.value, 'bmp_6')" 
                        id="bmp_txt_6" 
                        maxlength="2000"
                        class="form-control" 
                        name="premises"
                      ><?php echo $bmp->premises; ?></textarea>
                    </div>
                  </div>


                  <div class="col-lg-12 form-group">
                    <label for="risks"><?= $this->lang->line('bmp_risks') ?> </label>
                    <a class="btn-sm btn-default" id="bmp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_risks_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a <?= fieldStatus($view_name, $bmp->benefits_plan_id, "risks") ?> data-field="risks" data-field_name="<?= $this->lang->line('bmp_risks') ?>" data-item_id="<?= $bmp->benefits_plan_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <span id="count-g"></span>
                    <div>
                      <textarea 
                        oninput="limitText(this, 2e3, 'g')" 
                        placeholder="<?= $this->lang->line('placeholder_generic') ?>"
                        rows="3"
                        onkeyup="limite_textarea(this.value, 'bmp_7')" 
                        id="bmp_txt_7" 
                        maxlength="2000"
                        class="form-control" 
                        name="risks"
                      ><?php echo $bmp->risks; ?></textarea>
                    </div>
                  </div>

                  <div class="col-lg-12 m-t-10">
                    <button id="new_bp_submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                      <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                    </button>
                </form>

                <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
                  <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                </form>
            </div>
          <?php
              }
          ?>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>



<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>



<script type="text/javascript">
  for (var i = 1; i <= 7; i++) {
    if (document.getElementById("bmp_tp_" + i).title == "") {
      document.getElementById("bmp_tp_" + i).hidden = true;
    }
    limite_textarea(document.getElementById("bmp_txt_" + i).value, "bmp_" + i);
  }

  function limite_textarea(valor, txt) {
    var limite = 2000;
    var caracteresDigitados = valor.length;
    var caracteresRestantes = limite - caracteresDigitados;
    $("." + txt).text(caracteresRestantes);
  }
</script>


<?php $this->load->view('frame/footer_view'); ?>