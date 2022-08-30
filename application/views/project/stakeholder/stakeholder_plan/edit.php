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

                <?= $this->lang->line('shep_title')  ?>

              </h1>
              <!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php $view_name = "stakeholder engagement plan";
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>
              <?php extract($stakeholder); ?>

              <form action="<?= base_url() ?>stakeholder/stakeholder-engagement-plan/update/<?php echo $stakeholder_id; ?>" method="post">

                <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">
                <input type="hidden" name="status" value="1">

                <div class="col-lg-4 form-group">
                  <label for="name"><?= $this->lang->line('stake') ?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('stakeholder_mp-text2_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <input id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $name; ?>" disabled>
                  </div>
                </div>

                <div class="col-lg-4 form-group">
                  <label for="current_engagement "><?= $this->lang->line('shep_6') ?></label>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "current_engagement") ?> data-field="current_engagement" data-field_name="<?= $this->lang->line('shep_6') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <select name="current_engagement" class="form-control" onchange="avg()">
                    <option value="unaware" <?php if ($current_engagement == "unaware") echo 'selected'; ?>><?= $this->lang->line('option-1') ?></option>
                    <option value="supportive" <?php if ($current_engagement == "supportive") echo 'selected'; ?>><?= $this->lang->line('option-2') ?></option>
                    <option value="leading" <?php if ($current_engagement == "leading") echo 'selected'; ?>><?= $this->lang->line('option-3') ?></option>
                    <option value="neutral" <?php if ($current_engagement == "neutral") echo 'selected'; ?>><?= $this->lang->line('option-4') ?></option>
                    <option value="resistant" <?php if ($current_engagement == "resistant") echo 'selected'; ?>><?= $this->lang->line('option-5') ?></option>
                  </select>
                </div>

                <div class="col-lg-4 form-group">
                  <label for="expected_engagement "><?= $this->lang->line('shep_7') ?></label>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "expected_engagement") ?> data-field="expected_engagement" data-field_name="<?= $this->lang->line('shep_7') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <select name="expected_engagement" class="form-control" onchange="avg()">
                    <option value="unaware" <?php if ($expected_engagement == "unaware") echo 'selected'; ?>><?= $this->lang->line('option-1') ?></option>
                    <option value="supportive" <?php if ($expected_engagement == "supportive") echo 'selected'; ?>><?= $this->lang->line('option-2') ?></option>
                    <option value="leading" <?php if ($expected_engagement == "leading") echo 'selected'; ?>><?= $this->lang->line('option-3') ?></option>
                    <option value="neutral" <?php if ($expected_engagement == "neutral") echo 'selected'; ?>><?= $this->lang->line('option-4') ?></option>
                    <option value="resistant" <?php if ($expected_engagement == "resistant") echo 'selected'; ?>><?= $this->lang->line('option-5') ?></option>
                  </select>
                </div>

                <div class="col-lg-4 form-group">
                  <label for="average"><?= $this->lang->line('average') ?></label>
                  <a class="btn-sm btn-default" id="" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <div>
                    <input name="average" class="form-control input-md" id="average" value="<?php echo $average; ?>" readonly=“true”>
                  </div>
                </div>

                <div class="col-lg-2 form-group">
                  <label for="interest"><?= $this->lang->line('shep_2') ?></label>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "interest") ?> data-field="interest" data-field_name="<?= $this->lang->line('shep_2') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <select name="interest" class="form-control" id="interest" onchange="avg()">
                    <option value=10 <?php if ($interest == 10) echo 'selected'; ?>>10%</option>
                    <option value=30 <?php if ($interest == 30) echo 'selected'; ?>>30%</option>
                    <option value=50 <?php if ($interest == 50) echo 'selected'; ?>>50%</option>
                    <option value=70 <?php if ($interest == 70) echo 'selected'; ?>>70%</option>
                    <option value=90 <?php if ($interest == 90) echo 'selected'; ?>>90%</option>
                  </select>
                </div>

                <div class="col-lg-2">
                  <label for="power"><?= $this->lang->line('shep_3') ?></label>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "power") ?> data-field="power" data-field_name="<?= $this->lang->line('shep_3') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <select name="power" class="form-control" id="power" onchange="avg()">
                    <option value=10 <?php if ($power == 10) echo 'selected'; ?>>10%</option>
                    <option value=30 <?php if ($power == 30) echo 'selected'; ?>>30%</option>
                    <option value=50 <?php if ($power == 50) echo 'selected'; ?>>50%</option>
                    <option value=70 <?php if ($power == 70) echo 'selected'; ?>>70%</option>
                    <option value=90 <?php if ($power == 90) echo 'selected'; ?>>90%</option>
                  </select>
                </div>

                <div class="col-lg-2">
                  <label for="influence"><?= $this->lang->line('shep_4') ?></label>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "influence") ?> data-field="influence" data-field_name="<?= $this->lang->line('shep_4') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <select name="influence" class="form-control" id="influence" onchange="avg()">
                    <option value=10 <?php if ($influence == 10) echo 'selected'; ?>>10%</option>
                    <option value=30 <?php if ($influence == 30) echo 'selected'; ?>>30%</option>
                    <option value=50 <?php if ($influence == 50) echo 'selected'; ?>>50%</option>
                    <option value=70 <?php if ($influence == 70) echo 'selected'; ?>>70%</option>
                    <option value=90 <?php if ($influence == 90) echo 'selected'; ?>>90%</option>
                  </select>
                </div>

                <div class="col-lg-2">
                  <label for="impact"><?= $this->lang->line('shep_5') ?></label>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "impact") ?> data-field="impact" data-field_name="<?= $this->lang->line('shep_5') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <select name="impact" class="form-control" id="impact" onchange="avg()">
                    <option value=10 <?php if ($impact == 10) echo 'selected'; ?>>10%</option>
                    <option value=30 <?php if ($impact == 30) echo 'selected'; ?>>30%</option>
                    <option value=50 <?php if ($impact == 50) echo 'selected'; ?>>50%</option>
                    <option value=70 <?php if ($impact == 70) echo 'selected'; ?>>70%</option>
                    <option value=90 <?php if ($impact == 90) echo 'selected'; ?>>90%</option>
                  </select>
                </div>

                <div class="col-lg-4 form-group">
                  <label for="average"><?= $this->lang->line('average') ?></label>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "average") ?> data-field="average" data-field_name="<?= $this->lang->line('average') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input name="average" class="form-control" id="average" value="<?php echo $average; ?>" readonly=“true”>
                </div>
                <div class="col-lg-12 form-group">
                  <label for="strategy"><?= $this->lang->line('text-1') ?></label>
                  <span class="shep_9">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('stakeholder_mp-text1_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "strategy") ?> data-field="strategy" data-field_name="<?= $this->lang->line('text') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                    <textarea onkeyup="limite_textarea(this.value, 'shep_9')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shep_txt_9" name="strategy" required="false"><?php echo $strategy; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="scope"><?= $this->lang->line('text-2') ?></label>
                  <span class="shep_10">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('stakeholder_mp-text2_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "scope") ?> data-field="scope" data-field_name="<?= $this->lang->line('text') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                    <textarea onkeyup="limite_textarea(this.value, 'shep_10')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shep_txt_10" name="scope" required="false"><?= $scope; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="observation"><?= $this->lang->line('text-3') ?></label>
                  <span class="shep_11">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('stakeholder_mp-text3_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $stakeholder_id, "observation") ?> data-field="deobservationscription" data-field_name="<?= $this->lang->line('text') ?>" data-item_id="<?= $stakeholder_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                    <textarea onkeyup="limite_textarea(this.value, 'shep_11')" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" id="shep_txt_11" name="observation" required="false"><?= $observation; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                  </button>
              </form>

              <form action="<?= base_url("stakeholder/stakeholder-engagement-plan/list/" . $project_id); ?>">
                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>


<script type="text/javascript">

  avg();

  function avg() {
    document.getElementById('average').value = 0
    var interest = document.getElementById('interest').value;
    var power = document.getElementById('power').value;
    var influence = document.getElementById('influence').value;
    var impact = document.getElementById('impact').value;
    var aux = (((interest * 10) + (power * 10) + (influence * 10) + (impact * 10)) / 4) / 10;
    document.getElementById('average').value = parseFloat(aux.toFixed(2));
  }


  for (var i = 1; i <= 11; i++) {
    if (document.getElementById("shep_tp_" + i).title == "") {
      document.getElementById("shep_tp_" + i).hidden = true;
    }
    limite_textarea(document.getElementById("shep_txt_" + i).value, "shep_" + i);
  }

  function limite_textarea(valor, txt) {
    var limite = 2000;
    var caracteresDigitados = valor.length;
    var caracteresRestantes = limite - caracteresDigitados;
    $("." + txt).text(caracteresRestantes);
  }
</script>
<?php $this->load->view('frame/footer_view') ?>