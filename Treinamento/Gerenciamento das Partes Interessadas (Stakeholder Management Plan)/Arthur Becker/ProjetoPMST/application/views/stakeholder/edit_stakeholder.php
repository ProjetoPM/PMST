<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Update Stakeholder</h1>
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
  <?php endif;?>
  <div class="row">
    <div class="col-lg-12">      

      <form action="<?=base_url()?>stakeholder/saveUpdate/" method="post">

        
            <input id="stakeholder_id" name="stakeholder_id" type="hidden" placeholder="Title" class="form-control input-md" value="<?= $stakeholder[0]->stakeholder_id;?>" required="true" readonly>

          

        <!-- Text input-->
        <div class="form-group">
          <label for="name">Name</label>  
          <div >
            <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" value="<?= $stakeholder[0]->name;?>" required="true">

          </div>
        </div>

        <!-- Select's -->
        <div class="form-group">
          <div class="col-sm-1" align="center">
            <label for="interest">Interest</label><br />
            <select name="interest">
              <option value="10%">10%</option>
              <option value="30%">30%</option>
              <option value="50%">50%</option>
              <option value="70%">70%</option>
              <option value="90%">90%</option>
            </select>
          </div>
          <div class="col-sm-2" align="center">
            <label for="power">Power</label><br />
            <select style="width: 60px;" name="power">
              <option value="10%">10%</option>
              <option value="30%">30%</option>
              <option value="50%">50%</option>
              <option value="70%">70%</option>
              <option value="90%">90%</option>
            </select>
          </div>
          <div class="col-sm-1" align="center">
            <label for="influence">Influence</label><br />
            <select style="width: 61px;" name="influence">
              <option value="10%">10%</option>
              <option value="30%">30%</option>
              <option value="50%">50%</option>
              <option value="70%">70%</option>
              <option value="90%">90%</option>
            </select>
          </div>
          <div class="col-sm-2" align="center">
            <label for="impact">Impact</label><br />
            <select name="impact">
              <option value="10%">10%</option>
              <option value="30%">30%</option>
              <option value="50%">50%</option>
              <option value="70%">70%</option>
              <option value="90%">90%</option>
            </select>
          </div>
          <div class="col-sm-1" align="center">
            <label for="average">Average</label><br/>
            <input type="text" alt="" style="width: 55px; text-align:center;  height:19px; background-color: #D9D9F3" readonly="readonly" tabindex="1"  maxlength="7" size="9" value="" id="resultado1"name="average"/><br>
          </div>  
          <div class="col-sm-3" align="center">
            <label for="engagement">Engagement</label><br />
            <select name="engagement">
              <option value="Alheio">Alheio</option>
              <option value="Apoiador">Apoiador</option>
              <option value="Engajado">Engajado</option>
              <option value="Neutro">Neutro</option>
              <option value="Resistente">Resistente</option>
            </select>
          </div>
          <div class="col-sm-0" align="center">
            <label for="status">Status</label><br />
            <select name="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select> 
          </div>    
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label for="roles_responsabilies">Roles Responsibilities</label>
          <div >                     
            <input id="roles_responsabilies" name="roles_responsabilies" type="text" placeholder="Roles_responsabilies" class="form-control input-md" value="<?= $stakeholder[0]->roles_responsabilies;?>" required="true">
          </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
          <label for="strategy">Strategy for management</label>
          <div >                     
            <input id="strategy" name="strategy" type="text" placeholder="Strategy" class="form-control input-md" value="<?= $stakeholder[0]->strategy;?>" required="true">
          </div>
        </div>

        <div class="form-group">
          <label for="scopeImpact">Scope and impact of changes</label>
          <div >                     
            <input id="scopeImpact" name="scopeImpact" type="text" placeholder="ScopeImpact" class="form-control input-md" value="<?= $stakeholder[0]->scopeImpact;?>" required="true">
          </div>
        </div>

        <div class="form-group">
          <label for="comments">Comments</label>
          <div >                     
            <input id="comments" name="comments" type="text" placeholder="Comments" class="form-control input-md" value="<?= $stakeholder[0]->comments;?>" required="true">
          </div>
        </div>

        <input id="new_stakeholder-submit" type="submit" value="Update" class="btn btn-lg btn-success btn-block">


      </form>


    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>