<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?= $this->lang->line('benefits_plan-title') ?></h1>
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
      if ($benefits_plan == null) {
      ?>
        <form method="POST" action="<?php echo base_url('Benefits_plan/insert/'); ?>">

          <input type="hidden" name="project_id" value="<?php echo $project[0]->project_id; ?>">
          <input type="hidden" name="status" value="1">

          <div class=" col-lg-12 form-group">
            <label for="target_benefits"><?= $this->lang->line('benefits_plan-target_benefits') ?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-target_benefits-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
            <div>
              <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="target_benefits" name="target_benefits"></textarea>
            </div>
          </div>

          <div class=" col-lg-12 form-group">
            <label for="strategic_alignment"><?= $this->lang->line('benefits_plan-strategic_alignment') ?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-strategic_alignment-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
            <div>
              <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="strategic_alignment" name="strategic_alignment"></textarea>
            </div>
          </div>

          <div class=" col-lg-12 form-group">
            <label for="schedule_benefit"><?= $this->lang->line('benefits_plan-schedule_benefit') ?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-schedule_benefit-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
            <div>
              <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_benefit" name="schedule_benefit"></textarea>
            </div>
          </div>


          <div class=" col-lg-12 form-group">
            <label for="benefits_owner"><?= $this->lang->line('benefits_plan-benefits_owner') ?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-benefits_owner-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
            <div>
              <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="benefits_owner" name="benefits_owner"></textarea>
            </div>
          </div>

          <div class=" col-lg-12 form-group">
            <label for="indicators"><?= $this->lang->line('benefits_plan-indicators') ?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-indicators-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
            <div>
              <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="indicators" name="indicators"></textarea>
            </div>
          </div>

          <div class=" col-lg-12 form-group">
            <label for="premises"><?= $this->lang->line('benefits_plan-premises') ?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-premises-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
            <div>
              <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="premises" name="premises"></textarea>
            </div>
          </div>

          <div class=" col-lg-12 form-group">
            <label for="risks"><?= $this->lang->line('benefits_plan-risks') ?> </label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-risks-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
            <div>
              <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks" name="risks"></textarea>
            </div>
          </div>


          <div class="col-lg-12">
            <button id="new_benefits_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
              <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
            </button>
        </form>

        <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>">
          <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
        </form>

    </div>


    <?php
      } else {
        foreach ($benefits_plan as $bc) {
    ?>

      <form method="POST" action="<?php echo base_url('Benefits_plan/update/'); ?><?php echo $id; ?>">
        <input type="hidden" name="status" value="1">


        <div class=" col-lg-12 form-group">
          <label for="target_benefits"><?= $this->lang->line('benefits_plan-target_benefits') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-target_benefits-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div>
            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="target_benefits" name="target_benefits"><?php echo $bc->target_benefits; ?></textarea>
          </div>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="strategic_alignment"><?= $this->lang->line('benefits_plan-strategic_alignment') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-strategic_alignment-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div>
            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="strategic_alignment" name="strategic_alignment"><?php echo $bc->strategic_alignment; ?></textarea>
          </div>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="schedule_benefit"><?= $this->lang->line('benefits_plan-schedule_benefit') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-schedule_benefit-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div>
            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="schedule_benefit" name="schedule_benefit"><?php echo $bc->schedule_benefit; ?></textarea>
          </div>
        </div>


        <div class=" col-lg-12 form-group">
          <label for="benefits_owner"><?= $this->lang->line('benefits_plan-benefits_owner') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-benefits_owner-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div>
            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="benefits_owner" name="benefits_owner"><?php echo $bc->benefits_owner; ?></textarea>
          </div>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="indicators"><?= $this->lang->line('benefits_plan-indicators') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-indicators-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div>
            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="indicators" name="indicators"><?php echo $bc->indicators; ?></textarea>
          </div>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="premises"><?= $this->lang->line('benefits_plan-premises') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-premises-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div>
            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="premises" name="premises"><?php echo $bc->premises; ?></textarea>
          </div>
        </div>

        <div class=" col-lg-12 form-group">
          <label for="risks"><?= $this->lang->line('benefits_plan-risks') ?> </label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('benefits_plan-risks-tooltip') ?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div>
            <textarea oninput="eylem(this, this.value)" class="form-control elasticteste" id="risks" name="risks"><?php echo $bc->risks; ?></textarea>
          </div>
        </div>


        <div class="col-lg-12">
          <button id="new_benefits_plan-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
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
?>
</div>
</div>
<?php $this->load->view('frame/footer_view') ?>