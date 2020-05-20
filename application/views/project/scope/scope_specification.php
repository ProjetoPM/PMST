<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?= $this->lang->line('scope_spec-title') ?></h1>
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
      <?php
      $valida = false;
      foreach ($scope_specification as $scope) {
        if ($scope->project_id == $id) {
          $valida = true;
      ?>


          <form method="POST" action="<?php echo base_url('Scope_specification/insert/'); ?><?php echo $id[0]; ?>">

            <div class=" col-lg-12 form-group">
              <label for="scope_description"><?= $this->lang->line('scope_spec-desc') ?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-desc-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="scope_description" name="scope_description" required="true"><?= $scope_specification[0]->scope_description; ?></textarea>
              </div>
            </div>


            <div class="col-lg-12 form-group">
              <label for="acceptance_criteria"><?= $this->lang->line('scope_spec-accept') ?>
              </label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-accept-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="acceptance_criteria" name="acceptance_criteria"><?= $scope_specification[0]->acceptance_criteria; ?></textarea>
              </div>
            </div>


            <div class="col-lg-12 form-group">
              <label for="deliveries"><?= $this->lang->line('scope_spec-deli') ?>
              </label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-deli-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="deliveries" name="deliveries"><?= $scope_specification[0]->deliveries; ?></textarea>
              </div>
            </div>


            <div class=" col-lg-12 form-group">
              <label for="exclusions"><?= $this->lang->line('scope_spec-exclu') ?></label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-exclu-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="exclusions" name="exclusions"><?= $scope_specification[0]->exclusions; ?></textarea>
              </div>
            </div>


            <div class="col-lg-12 form-group">
              <label for="restrictions"><?= $this->lang->line('scope_spec-rest') ?>
              </label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-rest-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="restrictions" name="restrictions"><?= $scope_specification[0]->restrictions; ?></textarea>
              </div>
            </div>

            <div class="col-lg-12 form-group">
              <label for="assumptions"><?= $this->lang->line('scope_spec-assumpt') ?>
              </label>
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-assumpt-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
              <div>
                <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="restrictions" name="assumptions"><?= $scope_specification[0]->restrictions; ?></textarea>
              </div>
            </div>


            <div class="col-lg-12">
              <button id="new_scope_specification-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
              </button>
          </form>

          <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>">
            <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
          </form>

    </div>
  <?php
        }
      }
      if ($valida == false) {
  ?>
  <form method="POST" action="<?php echo base_url('Scope_specification/insert/'); ?><?php echo $id[0]; ?>">

    <div class=" col-lg-12 form-group">
      <label for="scope_description"><?= $this->lang->line('scope_spec-desc') ?></label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-scope_desc-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>

      <div>
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="scope_description" name="scope_description" required="true"></textarea>
      </div>
    </div>


    <div class="col-lg-12 form-group">
      <label for="acceptance_criteria"><?= $this->lang->line('scope_spec-accept') ?>
      </label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-accept-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
      <div>
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="acceptance_criteria" name="acceptance_criteria"></textarea>
      </div>
    </div>


    <div class="col-lg-12 form-group">
      <label for="deliveries"><?= $this->lang->line('scope_spec-deli') ?>
      </label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-deli-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
      <div>
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="deliveries" name="deliveries"></textarea>
      </div>
    </div>


    <div class=" col-lg-12 form-group">
      <label for="exclusions"><?= $this->lang->line('scope_spec-exclu') ?></label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-exclu-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
      <div>
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="exclusions" name="exclusions"></textarea>
      </div>
    </div>


    <div class="col-lg-12 form-group">
      <label for="restrictions"><?= $this->lang->line('scope_spec-rest') ?>
      </label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-rest-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
      <div>
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="restrictions" name="restrictions"></textarea>
      </div>
    </div>

    <div class="col-lg-12 form-group">
      <label for="assumptions"><?= $this->lang->line('scope_spec-assumpt') ?>
      </label>
      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('scope_spec-assumpt-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
      <div>
        <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="restrictions" name="assumptions"></textarea>
      </div>
    </div>

    <div class="col-lg-12">
      <button id="new_scope_specification-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
        <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
      </button>
  </form>

  <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>">
    <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
  </form>

  </div>
<?php
      }
?>
</div>
</div>


<?php $this->load->view('frame/footer_view') ?>