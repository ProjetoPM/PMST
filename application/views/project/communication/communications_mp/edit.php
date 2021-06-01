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
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('type-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="type" name="type" value="<?php echo $type ?>" maxlength="45" required>
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="description"><?= $this->lang->line('commp_name') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="content"><?= $this->lang->line('commp_content') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('content-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="content" name="content" value="<?php echo $content ?>" maxlength="255">
                    </div>
                  </div>

                  <div class=" col-lg-12 form-group">
                    <label for="distribution_reason"><?= $this->lang->line('commp_distribution_reason') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('distribution_reason-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="distribution_reason" name="distribution_reason" value="<?php echo $distribution_reason ?>" maxlength="255">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="language"><?= $this->lang->line('commp_language') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('language-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="language" name="language" value="<?php echo $language
                                                                                                    ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="channel"><?= $this->lang->line('commp_channel') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('channel-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="channel" name="channel" value="<?php echo $channel ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="document_format"><?= $this->lang->line('commp_document_format') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('document_format-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="document_format" name="document_format" value="<?php echo $document_format ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="method"><?= $this->lang->line('commp_method') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('method-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="method" name="method" value="<?php echo $method ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="frequency"><?= $this->lang->line('commp_frequency') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('frequency-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="frequency" name="frequency" value="<?php echo $frequency ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="allocated_resources"><?= $this->lang->line('commp_allocated_resources') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('allocated_resources-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="allocated_resources" name="allocated_resources" value="<?php echo $allocated_resources ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="format"><?= $this->lang->line('commp_format') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('format-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <div>
                      <input type="text" class="form-control" id="format" name="format" value="<?php echo $format ?>" maxlength="45">
                    </div>
                  </div>

                  <div class=" col-lg-6 form-group">
                    <label for="local"><?= $this->lang->line('commp_local') ?> </label>
                    <span class="eval_2">2000</span><?= $this->lang->line('character') ?>
                    <a class="btn-sm btn-default" id ="commp_tp_1" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('local-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
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
  for (var i = 1; i <= 6; i++) {
		if (document.getElementById("eval_tp_"+i).title == "") {
			document.getElementById("eval_tp_"+i).hidden = true;
		}
		limite_textarea(document.getElementById("eval_txt_" + i).value, "eval_" + i);
	}

	function limite_textarea(valor, txt) {
		var limite = 2000;
		var caracteresDigitados = valor.length;
		var caracteresRestantes = limite - caracteresDigitados;
		$("." + txt).text(caracteresRestantes);
	}
  </script>
  <?php $this->load->view('frame/footer_view') ?>