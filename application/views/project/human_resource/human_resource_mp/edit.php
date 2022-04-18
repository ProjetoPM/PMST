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

                <?php $view_name = "resource management plan"; ?>
								<?php $this->load->view('construction_services/rating', array(
									"view_name" => $view_name,
								)) ?>
              </h1>
              <!-- avaliação -->
							<link href="<?= base_url() ?>assets/css/field_evaluation.css" rel="stylesheet" type="text/css">
							<?php 
							getViewFields($view_name);
							?>
							<?php $this->load->view('construction_services/write_field_evaluation') ?>
              <form action="<?= base_url() ?>resources/resource-mp/update" method="post">

                <input id="project_id" name="project_id" type="hidden" value="<?= $human_resources_mp[0]->project_id; ?>">

                <!-- Textarea -->
                <div class=" col-lg-12 form-group">
                  <label for="roles_responsibilities"><?= $this->lang->line('remp_roles') ?> *</label>
                  <span class="remp_1">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_roles_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "roles_responsibilities") ?> data-field="roles_responsibilities" data-field_name="<?= $this->lang->line('remp_roles') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_1')" id="remp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="roles_responsibilities" required="true" ><?= $human_resources_mp[0]->roles_responsibilities; ?></textarea>
                  </div>
                </div>


                <!-- <nav class="textarea-right"> -->
                <!-- Textarea -->
                <div class="col-lg-6 form-group">
                  <label for="organizational_chart"><?= $this->lang->line('remp_chart') ?></label>
                  <span class="remp_2">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_chart_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "organizational_chart") ?> data-field="organizational_chart" data-field_name="<?= $this->lang->line('remp_chart') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_2')" id="remp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="organizational_chart"><?= $human_resources_mp[0]->organizational_chart; ?></textarea>
                  </div>
                </div>
                <!-- </nav> -->

                <!-- Textarea -->
                <div class="col-lg-6 form-group">
                  <label for="staff_mp"><?= $this->lang->line('remp_staff') ?></label>
                  <span class="remp_3">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_staff_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "staff_mp") ?> data-field="staff_mp" data-field_name="<?= $this->lang->line('remp_staff') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_3')" id="remp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="staff_mp"><?= $human_resources_mp[0]->staff_mp; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="identification_resources"><?= $this->lang->line('remp_identification_resources') ?></label>
                  <span class="remp_4">2000</span><?= $this->lang->line('character') ?>
                  <a class=" btn-sm btn-default" id ="remp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_identification_resources_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "identification_resources") ?> data-field="identification_resources" data-field_name="<?= $this->lang->line('remp_identification_resources') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_4')" id="remp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="identification_resources"><?= $human_resources_mp[0]->Identification_resources; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="acquiring_resources"><?= $this->lang->line('remp_acquiring_resources') ?></label>
                  <span class="remp_5">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_acquiring_resources_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "acquiring_resources") ?> data-field="acquiring_resources" data-field_name="<?= $this->lang->line('remp_acquiring_resources') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_5')" id="remp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="acquiring_resources"><?= $human_resources_mp[0]->acquiring_resources; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="team_development"><?= $this->lang->line('remp_team') ?></label>
                  <span class="remp_6">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_team_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "team_development") ?> data-field="team_development" data-field_name="<?= $this->lang->line('remp_team') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_6')" id="remp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="team_development"><?= $human_resources_mp[0]->team_development; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="training"><?= $this->lang->line('remp_training') ?></label>
                  <span class="remp_7">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_training_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "training") ?> data-field="training" data-field_name="<?= $this->lang->line('remp_training') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_7')" id="remp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="training"><?= $human_resources_mp[0]->training; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="control"><?= $this->lang->line('remp_control') ?></label>
                  <span class="remp_8">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_control_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "control") ?> data-field="control" data-field_name="<?= $this->lang->line('remp_control') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_8')" id="remp_txt_8" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="control"><?= $human_resources_mp[0]->control; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12 form-group">
                  <label for="recognition_plan"><?= $this->lang->line('remp_plan') ?></label>
                  <span class="remp_9">2000</span><?= $this->lang->line('character') ?>
                  <a class="btn-sm btn-default" id ="remp_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('remp_plan_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <a <?= fieldStatus($view_name, $human_resources_mp[0]->human_resources_mp_id, "recognition_plan") ?> data-field="recognition_plan" data-field_name="<?= $this->lang->line('remp_plan') ?>" data-item_id="<?= $human_resources_mp[0]->human_resources_mp_id ?>" data-view="<?= $view_name ?>" data-toggle="modal" data-placement="left" data-target="#write-evaluation" data-tt="tooltip"><i class="glyphicon glyphicon-list-alt"></i></a>
                  <div>
                  <textarea onkeyup="limite_textarea(this.value, 'remp_9')" id="remp_txt_9" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="recognition_plan"><?= $human_resources_mp[0]->recognition_plan; ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <button id="new_remp_submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
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
<script type="text/javascript">
	for (var i = 1; i <= 9; i++) {
		if (document.getElementById("remp_tp_" + i).title == "") {
			document.getElementById("remp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("remp_txt_" + i).value, "remp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
<?php $this->load->view('frame/footer_view') ?>