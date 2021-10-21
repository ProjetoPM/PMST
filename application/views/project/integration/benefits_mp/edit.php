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

              </h1>

              <?php
              foreach ($benefits_mp as $bmp) {
              ?>

                <form method="POST" action="<?php echo base_url('integration/benefits-mp/update'); ?>">
                  <input type="hidden" name="status" value="1">

                  <div class=" col-lg-12 form-group">
                    <label for="target_benefits"><?= $this->lang->line('bmp_target_benefits') ?> </label>
                    <span class="bmp_1">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_target_benefits_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bmp_1')" id="bmp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="target_benefits"><?php echo $bmp->target_benefits; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="strategic_alignment"><?= $this->lang->line('bmp_strategic_alignment') ?> </label>
                    <span class="bmp_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_strategic_alignment_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bmp_2')" id="bmp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="strategic_alignment"><?php echo $bmp->strategic_alignment; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="schedule_benefit"><?= $this->lang->line('bmp_schedule_benefit') ?> </label>
                    <span class="bmp_3">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_schedule_benefit_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bmp_3')" id="bmp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="schedule_benefit"><?php echo $bmp->schedule_benefit; ?></textarea>
                    </div>
                  </div>


                  <div class=" col-lg-12 form-group">
                    <label for="benefits_owner"><?= $this->lang->line('bmp_benefits_owner') ?> </label>
                    <span class="bmp_4">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_benefits_owner_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bmp_4')" id="bmp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="benefits_owner"><?php echo $bmp->benefits_owner; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="indicators"><?= $this->lang->line('bmp_indicators') ?> </label>
                    <span class="bmp_5">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_indicators_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bmp_5')" id="bmp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="indicators"><?php echo $bmp->indicators; ?></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="premises"><?= $this->lang->line('bmp_premises') ?> </label>
                    <span class="bmp_6">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bmp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_premises_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a style="float: right!important;padding: 0.5px 10px;" href="#myModal2" class="btn-sm btn-default" data-toggle="modal" data-placement="left" data-target="#myModal2" data-tt="tooltip" title="Bernadino 
                    / Ajustar nomenclatura dos dados / 2020-12-12 / 12:19"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bmp_6')" id="bmp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="premises"><?php echo $bmp->premises; ?></textarea>
                    </div>
                  </div>



                  <div class="col-lg-12 form-group">
                    <label for="risks"><?= $this->lang->line('bmp_risks') ?> </label>
                    <span class="bmp_7">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bmp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bmp_risks_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <a style="float: right!important;padding: 0.5px 10px; background-color: #ff080899;" href="#myModal" class="btn-sm btn-default" data-toggle="modal" data-placement="left" data-target="#myModal" data-tt="tooltip" title="Bernadino 
                    / Ajustar nomenclatura dos dados / 2020-12-12 / 12:19"><i class="glyphicon glyphicon-list-alt"></i></a>

                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bmp_7')" id="bmp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="risks"><?php echo $bmp->risks; ?></textarea>
                    </div>
                  </div>




                  <div class="col-lg-12">
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

<style>
  .modal {
  /* padding: 0!important; */
  /* left: 50%;
   top: 50%;  */
   /* width: 300px;
   height: 300px; */
   /* position: absolute; */
   /* margin-left: -150px;
   margin-top: -150px; */
}


.modal:before {
  /* content: '';
  display: inline-block;
  vertical-align: middle; */
  /* margin-right: -4px; */
}

.modal-dialog {
  /* display: inline-block;
  text-align: left;
  vertical-align: middle; */
}
</style>

<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content pad-modal modal-lg ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Professors' observations</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-9 form-group">
              <label for="business_strategy">Description </label>
              <a class="btn-sm btn-default" id="rd_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_business_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
              <input id="rd_txt_2" type="text" name="business_strategy" class="form-control input-md" maxlength="200" required="false">
            </div>
            <div class="col-lg-3">
              <button style="margin-top: 25px;" id="new_bp_submit" type="submit" value="Save" class="btn btn-success ">
                <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
              </button>
            </div>
          </div>

          <table class="col-lg-12">
            <thead>
              <tr>
                <th>Professor</th>
                <th>Description</th>
                <th>Data/Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Bernadino</td>
                <td>Ajustar nomenclatura dos dados</td>
                <td>2020-12-12 / 12:19</td>
                <td><button type="submit" class="btn btn-default"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content modal-lg pad-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Professors' observations</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <table class="col-lg-12">
            <thead>
              <tr>
                <th>Professor</th>
                <th>Description</th>
                <th>Data/Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Bernadino</td>
                <td>Ajustar nomenclatura dos dados</td>
                <td>2020-12-12 / 12:19</td>
                <td><button type="submit" class="btn btn-default"><em class="fa fa-check"></em><span class="hidden-xs"></span></button></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>






<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
  for (var i = 1; i <= 19; i++) {
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


<?php $this->load->view('frame/footer_view') ?>