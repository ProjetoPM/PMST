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

        <!-- /.row -->
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
        
        <!-- avaliação -->
				<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
				<?php $view_name = "assumption log";
				getViewFields($view_name);
				?>
				<?php $this->load->view('construction_services/write_field_evaluation') ?>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel-body">
              <h1 class="page-header">

                <?= $this->lang->line('rd-title')  ?>

              </h1>
              <form method="POST" action="<?php echo base_url() ?>scope/requirement-documentation/update/<?php echo $requirement_registration[0]->requirement_registration_id; ?>">

                <input type="hidden" name="project_id" value="<?= $requirement_registration[0]->project_id ?>">

                <div class=" col-lg-4 form-group">
                  <label for="associated_id"><?= $this->lang->line('rd-associated_id') ?> </label>
                  <span class="rd_1">45</span><?= $this->lang->line('character3') ?>
                  <a class="btn-sm btn-default" id="rd_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-associated_id-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "associated_id") ?> data-field="associated_id" data-field_name="<?= $this->lang->line('rd-associated_id') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>

                  <input id="rd_txt_1" type="text" name="associated_id" class="form-control input-md" onkeyup = "limite_textarea3(this.value, 'rd_1')" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->associated_id ?>">

                </div>

              
                <div class=" col-lg-8 form-group">
                  <label for="business_strategy"><?= $this->lang->line('rd-business_strategy') ?> </label>
                  <span class="rd_2">200</span><?= $this->lang->line('character4') ?>
                  <a class="btn-sm btn-default" id="rd_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-business_strategy-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "business_strategy") ?> data-field="business_strategy" data-field_name="<?= $this->lang->line('rd-business_strategy') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_2" type="text" name="business_strategy" class="form-control input-md" onkeyup = "limite_textarea4(this.value, 'rd_2')" maxlength="200" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->business_strategy ?>">

                </div>

                <div class=" col-lg-12 form-group">
                  <label for="description"><?= $this->lang->line('rd-description') ?> </label>
                  <span class="rd_3">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "description") ?> data-field="description" data-field_name="<?= $this->lang->line('rd-description') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_3')" id="rd_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="description"><?= $requirement_registration[0]->description ?></textarea>
                  </div>
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="version"><?= $this->lang->line('rd-version') ?> </label>
                  <span class="rd_4">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-version-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "version") ?> data-field="version" data-field_name="<?= $this->lang->line('rd-version') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_4" type="text" name="version" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_4')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->version ?>">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="phase"><?= $this->lang->line('rd-phase') ?> </label>
                  <span class="rd_5">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-phase-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "phase") ?> data-field="phase" data-field_name="<?= $this->lang->line('rd-phase') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_5" type="text" name="phase" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_5')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->phase ?>">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="associated_delivery"><?= $this->lang->line('rd-associated_delivery') ?> </label>
                  <span class="rd_6">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-associated_delivery-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "associated_delivery") ?> data-field="associated_delivery" data-field_name="<?= $this->lang->line('rd-associated_delivery') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_6" type="text" name="associated_delivery" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_6')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->associated_delivery ?>">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="type"><?= $this->lang->line('rd-type') ?> </label>
                  <a class="btn-sm btn-default" id="rd_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-type-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "type") ?> data-field="type" data-field_name="<?= $this->lang->line('rd-type') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>

                  <select class="form-control" id="type" name="type">
                  <?php
                    if ($requirement_registration[0]->type == "Legal") {
                    ?>
                      <option value="Legal" selected><?= $this->lang->line('type-legal') ?></option>
                      <option value="Business"><?= $this->lang->line('type-business') ?></option>
                      <option value="Stakeholder"><?= $this->lang->line('type-stakeholder') ?></option>
                      <option value="Product"><?= $this->lang->line('type-product') ?></option>
                      <option value="Project"><?= $this->lang->line('type-project') ?></option>
                    <?php
                    } elseif ($requirement_registration[0]->type == "Business") {
                    ?>
                      <option value="Legal"><?= $this->lang->line('type-legal') ?></option>
                      <option value="Business" selected><?= $this->lang->line('type-business') ?></option>
                      <option value="Stakeholder"><?= $this->lang->line('type-stakeholder') ?></option>
                      <option value="Product"><?= $this->lang->line('type-product') ?></option>
                      <option value="Project"><?= $this->lang->line('type-project') ?></option>
                    <?php
                    } elseif ($requirement_registration[0]->type == "Stakeholder") {
                    ?>
                      <option value="Legal"><?= $this->lang->line('type-legal') ?></option>
                      <option value="Business"><?= $this->lang->line('type-business') ?></option>
                      <option value="Stakeholder" selected><?= $this->lang->line('type-stakeholder') ?></option>
                      <option value="Product"><?= $this->lang->line('type-product') ?></option>
                      <option value="Project"><?= $this->lang->line('type-project') ?></option>
                    <?php
                    } elseif ($requirement_registration[0]->type == "Product") {
                    ?>
                      <option value="Legal"><?= $this->lang->line('type-legal') ?></option>
                      <option value="Business"><?= $this->lang->line('type-business') ?></option>
                      <option value="Stakeholder"><?= $this->lang->line('type-stakeholder') ?></option>
                      <option value="Product" selected><?= $this->lang->line('type-product') ?></option>
                      <option value="Project"><?= $this->lang->line('type-project') ?></option>
                    <?php
                    } else {
                    ?>
                      <option value="Legal"><?= $this->lang->line('type-legal') ?></option>
                      <option value="Business"><?= $this->lang->line('type-business') ?></option>
                      <option value="Stakeholder" selected><?= $this->lang->line('type-stakeholder') ?></option>
                      <option value="Product"><?= $this->lang->line('type-product') ?></option>
                      <option value="Project"><?= $this->lang->line('type-project') ?></option>
                    <?php
                    }
                    ?>
                  </select>

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="requester"><?= $this->lang->line('rd-requester') ?> </label>
                  <span class="rd_8">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-requester-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "requester") ?> data-field="requester" data-field_name="<?= $this->lang->line('rd-requester') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_8" type="text" name="requester" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_8')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->requester ?>">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="complexity"><?= $this->lang->line('rd-complexity') ?> </label>
                  <a class="btn-sm btn-default" id="rd_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-complexity-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "complexity") ?> data-field="complexity" data-field_name="<?= $this->lang->line('rd-complexity') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>

                  <select class="form-control" id="complexity" name="complexity">
                  <?php
                    if ($requirement_registration[0]->complexity == "Minimum") {
                    ?>
                      <option value="minimun" selected><?= $this->lang->line('complexity-minimum') ?></option>
                      <option value="Low"><?= $this->lang->line('complexity-low') ?></option>
                      <option value="Medium"><?= $this->lang->line('complexity-medium') ?></option>
                      <option value="High"><?= $this->lang->line('complexity-high') ?></option>
                      <option value="Highest"><?= $this->lang->line('complexity-highest') ?></option>
                    <?php
                    } elseif ($requirement_registration[0]->complexity == "Low") {
                    ?>
                      <option value="minimun"><?= $this->lang->line('complexity-minimum') ?></option>
                      <option value="Low" selected><?= $this->lang->line('complexity-low') ?></option>
                      <option value="Medium"><?= $this->lang->line('complexity-medium') ?></option>
                      <option value="High"><?= $this->lang->line('complexity-high') ?></option>
                      <option value="Highest"><?= $this->lang->line('complexity-highest') ?></option>
                    <?php
                    } elseif ($requirement_registration[0]->complexity == "Medium") {
                    ?>
                      <option value="minimun"><?= $this->lang->line('complexity-minimum') ?></option>
                      <option value="Low"><?= $this->lang->line('complexity-low') ?></option>
                      <option value="Medium" selected><?= $this->lang->line('complexity-medium') ?></option>
                      <option value="High"><?= $this->lang->line('complexity-high') ?></option>
                      <option value="Highest"><?= $this->lang->line('complexity-highest') ?></option>
                    <?php
                    } elseif ($requirement_registration[0]->complexity == "High") {
                    ?>
                      <option value="minimun"><?= $this->lang->line('complexity-minimum') ?></option>
                      <option value="Low"><?= $this->lang->line('complexity-low') ?></option>
                      <option value="Medium"><?= $this->lang->line('complexity-medium') ?></option>
                      <option value="High" selected><?= $this->lang->line('complexity-high') ?></option>
                      <option value="Highest"><?= $this->lang->line('complexity-highest') ?></option>
                    <?php
                    } elseif ($requirement_registration[0]->complexity == "Highest") {
                    ?>
                      <option value="minimun"><?= $this->lang->line('complexity-minimum') ?></option>
                      <option value="Low"><?= $this->lang->line('complexity-low') ?></option>
                      <option value="Medium"><?= $this->lang->line('complexity-medium') ?></option>
                      <option value="High"><?= $this->lang->line('complexity-high') ?></option>
                      <option value="Highest" selected><?= $this->lang->line('complexity-highest') ?></option>
                    <?php
                    } else {
                    ?>
                      <option value="minimun"><?= $this->lang->line('complexity-minimum') ?></option>
                      <option value="Low"><?= $this->lang->line('complexity-low') ?></option>
                      <option value="Medium"><?= $this->lang->line('complexity-medium') ?></option>
                      <option value="High"><?= $this->lang->line('complexity-high') ?></option>
                      <option value="Highest"><?= $this->lang->line('complexity-highest') ?></option>
                    <?php
                    }
                    ?>
                  </select>

                </div>

                <div class=" col-lg-4 form-group">
                  <label for="responsible"><?= $this->lang->line('rd-responsible') ?> </label>
                  <span class="rd_10">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-responsible-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "responsible") ?> data-field="responsible" data-field_name="<?= $this->lang->line('rd-responsible') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_10" type="text" name="responsible" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_10')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->responsible ?>">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="validity"><?= $this->lang->line('rd-validity') ?> </label>
                  <span class="rd_11">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-validity-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "validity") ?> data-field="validity" data-field_name="<?= $this->lang->line('rd-validity') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_11" type="text" name="validity" class="form-control input-md" onkeyup = "limite_textarea(this.value, 'rd_11')" maxlength="2000" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->validity ?>">
                </div>

                <div class=" col-lg-4 form-group">
                  <label for="priority"><?= $this->lang->line('rd-priority') ?> </label>
                  <span class="rd_12">255</span><?= $this->lang->line('character2') ?>
                  <a class="btn-sm btn-default" id="rd_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-priority-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "priority") ?> data-field="priority" data-field_name="<?= $this->lang->line('rd-priority') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <input id="rd_txt_12" type="text" name="priority" class="form-control input-md" onkeyup = "limite_textarea2(this.value, 'rd_12')" maxlength="255" oninput="eylem(this, this.value)" required="false" value="<?= $requirement_registration[0]->priority ?>">
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="acceptance_criteria"><?= $this->lang->line('rd-acceptance_criteria') ?> </label>
                  <span class="rd_13">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_13" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-acceptance_criteria-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "acceptance_criteria") ?> data-field="acceptance_criteria" data-field_name="<?= $this->lang->line('rd-acceptance_criteria') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_13')" id="rd_txt_13" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="acceptance_criteria"><?= $requirement_registration[0]->acceptance_criteria ?></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">
                  <label for="supporting_documentation"><?= $this->lang->line('rd-supporting_documentation') ?></label>
                  <span class="rd_14">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_14" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-supporting_documentation-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "supporting_documentation") ?> data-field="supporting_documentation" data-field_name="<?= $this->lang->line('rd-supporting_documentation') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_14')" id="rd_txt_14" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="supporting_documentation"><?= $requirement_registration[0]->supporting_documentation ?></textarea>
                  </div>
                </div>

                <div class=" col-lg-12 form-group">             
                  <label for="requirement_situation"><?= $this->lang->line('rd-requirement_situation') ?></label>
                  <span class="rd_15">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id="rd_tp_15" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd-requirement_situation-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $requirement_registration[0]->requirement_registration_id, "requirement_situation") ?> data-field="requirement_situation" data-field_name="<?= $this->lang->line('rd-requirement_situation') ?>" data-item_id="<?= $requirement_registration[0]->requirement_registration_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                      <textarea onkeyup="limite_textarea(this.value, 'rd_15')" id="rd_txt_15" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="requirement_situation"><?= $requirement_registration[0]->requirement_situation ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                  </button>
              </form>

              <button onclick="history.go(-1);" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>

            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
for (var i = 1; i <= 15; i++) {
		if (document.getElementById("rd_tp_"+i).title == "") {
			document.getElementById("rd_tp_"+i).hidden = true;
		}
    
		
    // limite_textarea2(document.getElementById("rd_txt_" + i).value, "rd_" + i);
    // limite_textarea3(document.getElementById("rd_txt_" + i).value, "rd_" + i);
    // limite_textarea4(document.getElementById("rd_txt_" + i).value, "rd_" + i);
	}
  limite_textarea(document.getElementById("rd_txt_" + i).value, "rd_" + i);

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	function limite_textarea2(valor, txt) {
		var limite = 255;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}

	function limite_textarea3(valor, txt) {
		var limite = 45;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  function limite_textarea4(valor, txt) {
		var limite = 200;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
<?php $this->load->view('frame/footer_view') ?>