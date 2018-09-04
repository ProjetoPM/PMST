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
     <form method="post" action="<?php echo base_url('stakeholder_mp/createStakeholderMP/');?><?php echo $project_id; ?>">



  
  <div class="col-lg-6 form-group">
<label for="stakeholder"> Select Stakeholder</label>
<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('select-stakholder-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

 <select name="stakeholder_id" class="form-control">

        <?php
          foreach ($stakeholders as $stakeholder) {
            //var_dump($stakeholder);
            //die();
        ?>
          <option name="stakeholder_id" value="<?php echo $stakeholder->stakeholder_id;?>"><?php echo $stakeholder->name;?></option>
        <?php
          }?>
            <input type="hidden" name="project_id" value="<?php echo $project_id;?>" 
           readonly >
      </select>
    </div>

            <!-- Text input-->
          <!-- Textarea -->
      <div class="col-lg-3 form-group">
          <label for="interest">Interest Level</label>
          <select name="interest" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="col-lg-3 form-group">
          <label for="power">Power Level</label>
          <select name="power" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="col-lg-3 form-group">
          <label for="influence">Influence Level</label>
          <select name="influence" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="col-lg-3 form-group">
          <label for="impact">Impact Level</label>
          <select name="impact" class="form-control">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="col-lg-3 form-group">
          <label for="current_engagement ">Current Engagement</label>
          <select name="current_engagement" class="form-control">
             <option value="unaware">Unaware</option>
            <option value="supportive">Supportive</option>
            <option value="leading">Leading</option>
            <option value="neutral">Neutral</option>
            <option value="resistant">Resistant</option>
          </select>
      </div>
       <div class="col-lg-3 form-group">
          <label for="expected_engagement ">Expected Engagement</label>
          <select name="expected_engagement" class="form-control">
            <option value="unaware">Unaware</option>
            <option value="supportive">Supportive</option>
            <option value="leading">Leading</option>
            <option value="neutral">Neutral</option>
            <option value="resistant">Resistant</option>
          </select>
      </div>
          <div class="col-lg-12 form-group">
            <label for="description">Estratégia para Engajamento / Gerenciamento</label>
            <div >                     
              <textarea class=" form-control elasticteste" oninput="eylem(this, this.value)"  id="description" name="strategy"></textarea>
            </div>
          </div>

          <div class="col-lg-6 form-group">
            <label for="description">Escopo e Impacto das Mudanças para a PI</label>
            <div >                     
              <textarea class="form-control elasticteste" oninput="eylem(this, this.value)" id="description" name="scope"></textarea>
            </div>
          </div>

          <div class="col-lg-6 form-group">
            <label for="description">Observações / Interrelações com outras PI</label>
            <div >                     
              <textarea class="col-lg-6 form-control elasticteste" oninput="eylem(this, this.value)" id="description" name="observation"></textarea>
            </div>
          </div>
         <div class="col-lg-12">
            <button id="new_human_resource-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
            <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
            </button> 
            </form>

            <form action="<?php echo base_url('project/'); ?><?php echo $id; ?>" >
                <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
            </form>
                
         </div>
      </div>

      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <?php $this->load->view('frame/footer_view')?>