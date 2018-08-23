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
        <form action="<?=base_url()?>project/add_project/" method="post">

        <div class="col-lg-3"> 
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Selecionar Stakeholder
        </div>


        <div class="col-lg-12">  
        	<!--Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Selecionar Stakeholder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <select name="stakeholder">
        <?php
          foreach ($stakeholders as $stakeholder) {
            //var_dump($stakeholder);
            //die();
        ?>
          <option value="<?php echo $stakeholder->stakeholder_id;?>"> <?php echo $stakeholder->name;?></option>
        <?php
          }
        ?>
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Selecionar</button>
      </div>
    </div>
  </div>
</div>
            <!-- Text input-->
          <!-- Textarea -->
          <div class="form-group">
            <label for="description">Estratégia para Engajamento / Gerenciamento</label>
            <div >                     
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Escopo e Impacto das Mudanças para a PI</label>
            <div >                     
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="description">Observações / Interrelações com outras PI</label>
            <div >                     
              <textarea class="form-control" id="description" name="description"></textarea>
            </div>
          </div>

          <input id="new_project-submit" type="submit" value="Salvar" class="btn btn-lg btn-success btn-block">
        </form>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <?php $this->load->view('frame/footer_view')?>