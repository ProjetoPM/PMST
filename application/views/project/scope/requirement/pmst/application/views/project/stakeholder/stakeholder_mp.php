<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('stakeholder_mp-title')?></h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->

  <?php if($this->session->flashdata('success')):?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong><?php echo $this->session->flashdata('success'); ?></strong>
    </div>
    <?php elseif($this->session->flashdata('error')):?>
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $this->session->flashdata('error'); ?></strong>
      </div>
    <?php endif;
    ?>
    <div class="row">
      <div class="col-lg-12">      
        
        <td align="right">
         <form method="post" action="<?php echo base_url('stakeholder_mp/insert/');?><?php echo $project_id; ?>">



          
          <div class="col-lg-6 form-group">
            <label for="stakeholder"><?=$this->lang->line('select-1')?></label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-stakeholder-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

            <select name="stakeholder_id" class="form-control">

              <?php
              foreach ($stakeholders as $stakeholder) {
            //var_dump($stakeholder);
            //die();
                ?>
                <option name="stakeholder_id" value="<?php echo $stakeholder->stakeholder_id;?>"><?php echo $stakeholder->name;?></option>
                <?php
              }?>
              <input type="hidden" name="project_id"  value="<?php echo $project_id; ?>">
            </select>
          </div>
          <div class="col-lg-3 form-group">
            <label for="current_engagement "><?=$this->lang->line('select-6')?></label>
            <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-current-engagement-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
            <select name="current_engagement" class="form-control">
             <option value="unaware"><?=$this->lang->line('option-1')?></option>
             <option value="supportive"><?=$this->lang->line('option-2')?></option>
             <option value="leading"><?=$this->lang->line('option-3')?></option>
             <option value="neutral"><?=$this->lang->line('option-4')?></option>
             <option value="resistant"><?=$this->lang->line('option-5')?></option>
           </select>
         </div>
         <div class="col-lg-3 form-group">
          <label for="expected_engagement "><?=$this->lang->line('select-7')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-expected-engagement-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <select name="expected_engagement" class="form-control">
            <option value="unaware"><?=$this->lang->line('option-1')?></option>
            <option value="supportive"><?=$this->lang->line('option-2')?></option>
            <option value="leading"><?=$this->lang->line('option-3')?></option>
            <option value="neutral"><?=$this->lang->line('option-4')?></option>
            <option value="resistant"><?=$this->lang->line('option-5')?></option>
          </select>
        </div>
        <!-- Text input-->
        <!-- Textarea -->
        <div class="col-lg-2 form-group">
          <label for="interest"><?=$this->lang->line('select-2')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-interest-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <select name="interest" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
        </div>
        <div class="col-lg-2 form-group">
          <label for="power"><?=$this->lang->line('select-3')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-power-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <select name="power" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
        </div>
        <div class="col-lg-2 form-group">
          <label for="influence"><?=$this->lang->line('select-4')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-influence-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <select name="influence" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
        </div>
        <div class="col-lg-2 form-group">
          <label for="impact"><?=$this->lang->line('select-5')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-impact-level-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <select name="impact" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
        </div>
        <div class="col-lg-12 form-group">
          <label for="description"><?=$this->lang->line('text-1')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder_mp-text1-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div >                     
            <textarea class=" form-control elasticteste" oninput="eylem(this, this.value)"  id="description" name="strategy"></textarea>
          </div>
        </div>

        <div class="col-lg-12 form-group">
          <label for="description"><?=$this->lang->line('text-2')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder_mp-text2-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div >                     
            <textarea class="form-control elasticteste" oninput="eylem(this, this.value)" id="description" name="scope"></textarea>
          </div>
        </div>

        <div class="col-lg-12 form-group">
          <label for="description"><?=$this->lang->line('text-3')?></label>
          <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('stakeholder_mp-text3-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
          <div >                     
            <textarea class="col-lg-6 form-control elasticteste" oninput="eylem(this, this.value)" id="description" name="observation"></textarea>
          </div>
        </div>
        <div class="col-lg-12">
          <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
            <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
          </button> 
        </form>

        <form action="<?php echo base_url("stakeholder_mp/stakeholder_mp_list/".$project_id); ?>" >
          <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
        </form>
        
      </div>
    </div>

    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>

<script type="text/javascript">
  function avg(){
    document.getElementById('average').value = 0
    var interest = document.getElementById('interest').value;
    var power = document.getElementById('power').value;
    var influence = document.getElementById('influence').value;
    var impact = document.getElementById('impact').value;
    var aux  = (((interest * 10) + (power * 10) + (influence * 10) + (impact * 10)) / 4) / 10;
    document.getElementById('average').value = parseFloat(aux.toFixed(2));
  }
</script>

<?php $this->load->view('frame/footer_view')?>