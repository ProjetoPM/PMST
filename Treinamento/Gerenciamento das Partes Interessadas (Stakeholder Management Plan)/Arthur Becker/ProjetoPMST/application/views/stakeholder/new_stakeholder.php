<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Stakeholder Management Plan - New Stakeholder</h1>
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
            
            <form action="<?=base_url()?>stakeholder/add_stakeholder/" method="post">
                

                <!-- Text input-->
                <div class="form-group">
                  <label for="title">Name</label>  
                  <div >
                    <input id="title" name="name" type="text" placeholder="Name" class="form-control input-md" required="true">
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
                  <label for="roles_responsabilies"><br>Roles Responsibilities</label>
                  <div >                     
                    <textarea class="form-control" id="roles_responsabilies" name="roles_responsabilies"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="strategy"><br>Strategy for management</label>
                  <div >                     
                    <textarea class="form-control" id="strategy" name="strategy"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="scopeImpact">Scope and impact of changes</label>
                  <div >                     
                    <textarea class="form-control" id="scopeImpact" name="scopeImpact"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="comments">Comments</label>
                  <div >                     
                    <textarea class="form-control" id="comments" name="comments"></textarea>
                  </div>
                </div>

                <input id="new_stakeholder-submit" type="submit" value="Create" class="btn btn-lg btn-success btn-block">

            </form>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php $this->load->view('frame/footer_view')?>