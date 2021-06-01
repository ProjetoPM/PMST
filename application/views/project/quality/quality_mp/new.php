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

                <?= $this->lang->line('qmp_title')  ?>

              </h1>

              <form method="POST" action="<?php echo base_url('quality/quality-mp/insert'); ?>">

                <input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">
                <input type="hidden" name="status" value="1">

                <div class=" col-lg-12 form-group">
                    <label for="standards"><?= $this->lang->line('qmp_standards') ?> </label>
                    <span class="qmp_1">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="qmp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('qmp_standards_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'qmp_1')" id="qmp_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="standards" ></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="objectives"><?= $this->lang->line('qmp_objectives') ?> </label>
                    <span class="qmp_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="qmp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('qmp_objectives_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'qmp_2')" id="qmp_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="objectives" ></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="roles_responsibilities"><?= $this->lang->line('qmp_roles') ?> </label>
                    <span class="qmp_3">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="qmp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('qmp_roles_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'qmp_3')" id="qmp_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="roles_responsibilities" ></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="deliverables"><?= $this->lang->line('qmp_deliverables') ?> </label>
                    <span class="qmp_4">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="qmp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('qmp_deliverables_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'qmp_4')" id="qmp_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="deliverables" ></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="activities"><?= $this->lang->line('qmp_activities') ?> </label>
                    <span class="qmp_5">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="qmp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('qmp_deliverables_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'qmp_5')" id="qmp_txt_5" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="deliverables" ></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="tools"><?= $this->lang->line('qmp_tools') ?> </label>
                    <span class="qmp_6">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="qmp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('qmp_tools_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'qmp_6')" id="qmp_txt_6" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="tools" ></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="procedures"><?= $this->lang->line('qmp_procedures') ?> </label>
                    <span class="qmp_7">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="qmp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('qmp_procedures_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'qmp_7')" id="qmp_txt_7" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="procedures" ></textarea>
                    </div>
                  </div>


                <div class="col-lg-12">
                  <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                    <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                  </button>
              </form>

              <form action="<?php echo base_url('project/'); ?><?php echo $_SESSION['project_id']; ?>">
                <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
              </form>

              <!--1º preencher o nome da view-->
              <?php $view = array(
                "name" => "quality_management_plan",
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
	for (var i = 1; i <= 7; i++) {
		if (document.getElementById("qmp_tp_" + i).title == "") {
			document.getElementById("qmp_tp_" + i).hidden = true;
		}
		limite_textarea(document.getElementById("qmp_txt_" + i).value, "qmp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
<?php $this->load->view('frame/footer_view') ?>