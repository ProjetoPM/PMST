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

                <?= $this->lang->line('bc_title')  ?>

              </h1>

              <form method="POST" action="<?php echo base_url('integration/business-case/insert'); ?>">

                <input type="hidden" name="project_id" value="<?php echo $_SESSION['project_id']; ?>">

                <div class=" col-lg-12 form-group">
                    <label for="business_deals"><?= $this->lang->line('bc_business_deals') ?> </label>
                    <span class="bc_1">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_business_deals_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'bc_1')" id="bc_txt_1" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="business_deals"></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="situation_analysis"><?= $this->lang->line('bc_situation_analysis') ?> </label>
                    <span class="bc_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_situation_analysis_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bc_2')" id="bc_txt_2" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="situation_analysis"></textarea>
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="recommendation"><?= $this->lang->line('bc_recommendation') ?> </label>
                    <span class="bc_3">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_recommendation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                    <textarea onkeyup="limite_textarea(this.value, 'bc_3')" id="bc_txt_3" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="recommendation"></textarea>
                    </div>
                  </div>


                  <div class=" col-lg-12 form-group">
                    <label for="evaluation"><?= $this->lang->line('bc_evaluation') ?> </label>
                    <span class="bc_4">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id="bc_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('bc_evaluation_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <textarea onkeyup="limite_textarea(this.value, 'bc_4')" id="bc_txt_4" maxlength="2000" oninput="eylem(this, this.value)" class="form-control elasticteste" name="evaluation"></textarea>
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
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
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