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
          <?php
          extract($communication_item);
          ?>

          <div class="row">
            <div class="col-lg-12">
              <div class="panel-body">
                <h1 class="page-header">
                  <?= $this->lang->line('commp_title') ?>
                </h1>

                <form method="POST" action="<?php echo base_url() ?>communication/communications-mp/update/<?php echo $communication_item_id ?>">

                  <input type="hidden" name="project_id" value="<?php echo $project_id; ?>">

                  <div class=" col-lg-6 form-group">
                    <label for="type"><?= $this->lang->line('commp_type') ?> </label>
                    <span class="commp_1">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_type_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="type" name="type" value="<?php echo $type ?>" maxlength="45" required>
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="description"><?= $this->lang->line('commp_name') ?> </label>
                    <span class="commp_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_description_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="content"><?= $this->lang->line('commp_content') ?> </label>
                    <span class="commp_3">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_3" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_content_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="content" name="content" value="<?php echo $content ?>" maxlength="255">
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="distribution_reason"><?= $this->lang->line('commp_distribution_reason') ?> </label>
                    <span class="commp_4">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_4" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_distribution_reason_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="distribution_reason" name="distribution_reason" value="<?php echo $distribution_reason ?>" maxlength="255">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="language"><?= $this->lang->line('commp_language') ?> </label>
                    <span class="commp_5">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_5" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_language_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="language" name="language" value="<?php echo $language
                                                                                                    ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="channel"><?= $this->lang->line('commp_channel') ?> </label>
                    <span class="commp_6">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_6" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_channel_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="channel" name="channel" value="<?php echo $channel ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="document_format"><?= $this->lang->line('commp_document_format') ?> </label>
                    <span class="commp_7">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_7" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_document_format_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="document_format" name="document_format" value="<?php echo $document_format ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="method"><?= $this->lang->line('commp_method') ?> </label>
                    <span class="commp_8">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_8" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_method_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="method" name="method" value="<?php echo $method ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="frequency"><?= $this->lang->line('commp_frequency') ?> </label>
                    <span class="commp_9">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_9" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_frequency_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="frequency" name="frequency" value="<?php echo $frequency ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="allocated_resources"><?= $this->lang->line('commp_allocated_resources') ?> </label>
                    <span class="commp_10">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_10" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_allocated_resources_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="allocated_resources" name="allocated_resources" value="<?php echo $allocated_resources ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="format"><?= $this->lang->line('commp_format') ?> </label>
                    <span class="commp_11">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_11" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_format_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="format" name="format" value="<?php echo $format ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="local"><?= $this->lang->line('commp_local') ?> </label>
                    <span class="commp_12">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_12" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('commp_local_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="local" name="local" value="<?= $local ?>" maxlength="45">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                      <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                    </button>
                </form>

                <form action="<?php echo base_url() ?>communication/communications-mp/list/<?= $project_id ?>">
                  <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                </form>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </section>
      </div>
    </div>
  </body>
  <script>
  for (var i = 1; i <= 12; i++) {
		if (document.getElementById("commp_tp_"+i).title == "") {
			document.getElementById("commp_tp_"+i).hidden = true;
		}
		limite_textarea(document.getElementById("commp_txt_" + i).value, "commp_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
  <?php $this->load->view('frame/footer_view') ?>