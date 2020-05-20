<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?= $this->lang->line('procurement-registration') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>

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

  <div class="row">
    <div class="col-lg-12">
      <form method="POST" action="<?php echo base_url('ProcurementStatementOfWork/insert/'); ?><?php echo $project_id; ?>">

        <div class=" col-lg-4 form-group">
          <label for="description"><?= $this->lang->line('description') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('description-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="description" name="description" maxlength="1000"></textarea>

        </div>

        <div class=" col-lg-4 form-group">
          <label for="types"><?= $this->lang->line('types') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('types-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="types" name="types" maxlength="1000"></textarea>

        </div>

        <div class=" col-lg-4 form-group">
          <label for="selection_criterias"><?= $this->lang->line('selection_criterias') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('selection_criterias-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="selection_criterias" name="selection_criterias" maxlength="1000"></textarea>

        </div>

        <div class=" col-lg-12 form-group">
          <label for="restrictions"><?= $this->lang->line('restrictions') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('restrictions-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="restrictions" name="restrictions" maxlength="1000"></textarea>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="premises"><?= $this->lang->line('premises') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('premises-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="premises" name="premises" maxlength="1000"></textarea>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="schedule"><?= $this->lang->line('schedule') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('schedule-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="schedule" name="schedule" maxlength="1000"></textarea>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="informations"><?= $this->lang->line('informations') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('informations-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="informations" name="informations" maxlength="1000"></textarea>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="procurement_management"><?= $this->lang->line('procurement_management') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('procurement_management-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>

          <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" type="text" id="procurement_management" name="procurement_management" maxlength="1000"></textarea>
        </div>

        <div class="col-lg-12">
          <button id="new_quality_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
            <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
          </button>
      </form>

      <form action="<?php echo base_url() ?>/ProcurementStatementOfWork/listp/<?= $project_id ?>">
        <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
      </form>
    </div>
  </div>
</div>
<!-- /.row -->


<?php $this->load->view('frame/footer_view') ?>