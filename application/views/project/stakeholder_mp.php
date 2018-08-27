<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Gerenciar Partes Interessadas</h1>
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
     <form method="post" action="<?php echo base_url('stakeholder_mp/createStakeholderMP/');?>">



  
  <div>
<label for="stakeholder"> Select Stakeholder</label>
 <select name="stakeholder">
        <?php
          foreach ($stakeholders as $stakeholder) {
            //var_dump($stakeholder);
            //die();
        ?>
          <option name="stakeholder_id" value="<?php echo $stakeholder->stakeholder_id;?>"> <?php echo $stakeholder->name;?></option>
        <?php
          }
        ?>
      </select>
    </div>
            <!-- Text input-->
          <!-- Textarea -->
               <div class="form-group">
          <label for="interest">Interest Level</label>
          <select name="interest">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="form-group">
          <label for="power">Power Level</label>
          <select name="power">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="form-group">
          <label for="influence">Influence Level</label>
          <select name="influence">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="form-group">
          <label for="impact">Impact Level</label>
          <select name="impact">
            <option value="10">10%</option>
            <option value="30">30%</option>
            <option value="50">50%</option>
            <option value="70">70%</option>
            <option value="90">90%</option>
          </select>
      </div>
        <div class="form-group">
          <label for="current_engagement ">Current Engagement</label>
          <select name="current_engagement">
             <option value="unaware">Unaware</option>
            <option value="supportive">Supportive</option>
            <option value="leading">Leading</option>
            <option value="neutral">Neutral</option>
            <option value="resistant">Resistant</option>
          </select>
      </div>
       <div class="form-group">
          <label for="expected_engagement ">Expected Engagement</label>
          <select name="expected_engagement">
            <option value="unaware">Unaware</option>
            <option value="supportive">Supportive</option>
            <option value="leading">Leading</option>
            <option value="neutral">Neutral</option>
            <option value="resistant">Resistant</option>
          </select>
      </div>
          <div class="form-group">
            <label for="description">Estratégia para Engajamento / Gerenciamento</label>
            <div >                     
              <textarea class="form-control" id="description" name="strategy"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Escopo e Impacto das Mudanças para a PI</label>
            <div >                     
              <textarea class="form-control" id="description" name="scope"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Observações / Interrelações com outras PI</label>
            <div >                     
              <textarea class="form-control" id="description" name="observation"></textarea>
            </div>
          </div>

          <input  type="submit" value="Salvar" class="btn btn-lg btn-success btn-block">
        </form>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <?php $this->load->view('frame/footer_view')?>