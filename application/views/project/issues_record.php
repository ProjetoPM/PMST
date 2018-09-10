<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="pageheader"> <?=$this->lang->line('issues_record-title')  ?></h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong><?php echo $this->session->flashdata('success'); ?></strong>
    </div>
    <?php elseif ($this->session->flashdata('error')): ?>
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $this->session->flashdata('error'); ?></strong>
      </div>
    <?php endif; ?>
    <!-- /.row -->          
    <div class="row">
      <div class="col-lg-12">
        <div class="container">
          <!-- Trigger the modal with a button -->
          <button type="button" class="open-AddBookDialog btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add"> Register Issues Record</button>
          <!-- Modal -->
          <div class="modal fade" id="add" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Register Issues Record</h4>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url() ?>issues_record/insert/" method="post">

                    <input type="hidden" name="project_id" value="<?php echo $project_id[0]; ?>">
                    <input type="hidden" name="status" value="1">

                    <div class="form-group">
                      <label for="responsable"><?=$this->lang->line('ir-identification')?></label>
                      <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-identification-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                      <textarea class="form-control" id="identification"  name="identification" maxlength="45"></textarea>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                     <label for="identification_date"><?=$this->lang->line('ir-identification_date')?></label>
                     <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-identification_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                     <textarea class="form-control" id="identification_date"  name="identification_date" maxlength="45"></textarea>
                   </div>

                   <div class="form-group">
                     <label for="question_description"><?=$this->lang->line('ir-question_description')?></label>
                     <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-question_description-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                     <textarea class="form-control" id="question_description"  name="question_description" maxlength="255"></textarea>
                   </div>

                   <div class="form-group">
                    <label for="type"><?=$this->lang->line('ir-type')?></label>                      
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-type-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>

                    <textarea class="form-control" id="type"  name="type" maxlength="255"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="responsable"><?=$this->lang->line('ir-responsable')?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-responsable-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <textarea class="form-control" id="responsable"  name="responsable" maxlength="45"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="situation"><?=$this->lang->line('ir-situation')?></label>
                    <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-situation-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                    <textarea class="form-control" id="situation"  name="situation" maxlength="45"></textarea>
                  </div>

                  <div class="form-group">
                   <label for="action"><?=$this->lang->line('ir-action')?></label>
                   <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-action-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                   <textarea class="form-control" id="action"  name="action" maxlength="45"></textarea>
                 </div>

                 <div class="form-group">
                   <label for="resolution_date"><?=$this->lang->line('ir-resolution_date')?></label>
                   <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-resolution_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                   <textarea class="form-control" id="resolution_date" name="resolution_date" maxlength="45"></textarea>
                 </div>

                 <div class="form-group">
                   <label for="replan_date"><?=$this->lang->line('ir-replan_date')?></label>
                   <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-replan_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                   <textarea class="form-control" id="replan_date"  name="replan_date" maxlength="45"></textarea>
                 </div>
                 <div class="form-group">
                  <label for="observations"><?=$this->lang->line('ir-observations')?></label>
                  <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?=$this->lang->line('ir-replan_date-tooltip')?>"><i class="glyphicon glyphicon-comment"></i></a>
                  <textarea class="form-control" id="observations"  name="observations" maxlength="45"></textarea>
                </div>

                <button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-lg btn-default btn-block" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






<style>
table {
  border-spacing: 0;
  border-collapse: collapse;
  min-width:50px;/*valor minimo px,cm,% etc.*/;
  max-width:100px;/*valor maximo px,,cm,% etc.*/;
  word-wrap:break-word;
  white-space: nowrap;
}

.table { 
  width: 100%;
  margin-bottom: 20px;
}

.table th,
.table td {
  font-weight: normal;
  font-size: 13px;
  padding: 8px 15px;
  line-height: 20px;
  text-align: left;
  vertical-align: middle;
  border-top: 1px solid #dddddd;
}
.table thead th {
  background: #eeeeee;
  vertical-align: bottom;
}   
.table tbody > tr:nth-child(odd) > td,
.table tbody > tr:nth-child(odd) > th {
  background-color: #fafafa;
}    
.table .t-small {
  width: 8%;
}
.table .t-medium {
  width: 13%;
}

</style>







<div class="col-sm-12">
  <br><br>
  <div style="overflow:scroll;">
      <?php //var_dump($issues_record) ?>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th><?=$this->lang->line('ir-identification')?></th>
          <th><?=$this->lang->line('ir-identification_date')?></th>
          <th><?=$this->lang->line('ir-question_description')?></th>
          <th><?=$this->lang->line('ir-type')?></th>
          <th><?=$this->lang->line('ir-responsable')?></th>
          <th><?=$this->lang->line('ir-situation')?></th>
          <th><?=$this->lang->line('ir-action')?></th>
          <th><?=$this->lang->line('ir-resolution_date')?></th>
          <th><?=$this->lang->line('ir-replan_date')?></th>
          <th><?=$this->lang->line('ir-observations')?></th>

        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($issues_record as $item) {
          ?>
          <tr>
            <td><?php echo $item->identification;?></td>
            <td><?php echo $item->identification_date;?></td>
            <td><?php echo $item->question_description;?></td>
            <td><?php echo $item->type;?></td>
            <td><?php echo $item->responsable;?></td>
            <td><?php echo $item->situation;?></td>
            <td><?php echo $item->action;?></td>
            <td><?php echo $item->resolution_date;?></td>
            <td><?php echo $item->replan_date;?></td>
            <td><?php echo $item->observations;?></td>

            <td>
              <button type="button" class="open-AddBookDialog btn btn-default btn-lg glyphicon glyphicon-edit" data-id="edit" data-toggle="modal" data-target="#modal">Edit</button>

              <div class="modal fade" id="modal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Edit Issues Record</h4>
                    </div>
                    <div class="modal-body">                     
                      <form action="<?= base_url() ?>issues_record/update/<?php echo $project_id; ?>" method="post">

                        <input type="hidden" name="project_id" value="<?php echo $project_id; ?>"> 
                        <input type="hidden" name="status" value="1">                           
                        <!-- Textarea -->


                        <div class="form-group">
                          <label for="identification"><?=$this->lang->line('ir-identification')?></label>                    
                          <textarea class="form-control" id="identification"  name="identification" maxlength="45"><?php echo $issues_record[0]->identification; ?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="identification_date"><?=$this->lang->line('ir-identification_date')?></label>                    
                          <textarea class="form-control" id="identification_date"  name="identification_date" maxlength="45"><?php echo $issues_record[0]->identification_date; ?></textarea>
                        </div>

                          <div class="form-group">
                          <label for="question_description"><?=$this->lang->line('ir-question_description')?></label>                    
                          <textarea class="form-control" id="question_description"  name="question_description" maxlength="45"><?php echo $issues_record[0]->question_description; ?></textarea>
                        </div>

                          <div class="form-group">
                          <label for="type"><?=$this->lang->line('ir-type')?></label>                    
                          <textarea class="form-control" id="type"  name="type" maxlength="45"><?php echo $issues_record[0]->type; ?></textarea>
                        </div>

                          <div class="form-group">
                          <label for="responsable"><?=$this->lang->line('ir-responsable')?></label>                    
                          <textarea class="form-control" id="responsable"  name="responsable" maxlength="45"><?php echo $issues_record[0]->responsable; ?></textarea>
                        </div>

                          <div class="form-group">
                          <label for="situation"><?=$this->lang->line('ir-situation')?></label>                    
                          <textarea class="form-control" id="situation"  name="situation" maxlength="45"><?php echo $issues_record[0]->situation; ?></textarea>
                        </div>

                          <div class="form-group">
                          <label for="action"><?=$this->lang->line('ir-action')?></label>                    
                          <textarea class="form-control" id="action"  name="action" maxlength="45"><?php echo $issues_record[0]->action; ?></textarea>
                        </div>

                          <div class="form-group">
                          <label for="resolution_date"><?=$this->lang->line('ir-resolution_date')?></label>                    
                          <textarea class="form-control" id="resolution_date"  name="resolution_date" maxlength="45"><?php echo $issues_record[0]->resolution_date; ?></textarea>
                        </div>

                          <div class="form-group">
                          <label for="replan_date"><?=$this->lang->line('ir-replan_date')?></label>                    
                          <textarea class="form-control" id="replan_date" name="replan_date" maxlength="45"><?php echo $issues_record[0]->replan_date; ?></textarea>
                        </div>

                        <div class="form-group">
                          <label for="observations"><?=$this->lang->line('ir-observations')?></label>                    
                          <textarea class="form-control" id="observations" name="observations" maxlength="45"><?php echo $issues_record[0]->observations; ?></textarea>
                        </div>

                          <button type="submit" class="btn btn-lg btn-success btn-block">Save</button>

                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-lg btn-default btn-block" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

                <<form action="<?php echo base_url() ?>issues_record/delete/<?php echo $item->issues_record_id; ?>">
                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                  </form>
              </td>
            </tr> 
            <?php
          }
          ?>

        </tbody>
      </table> 
    </div>  

  </div>



  <!-- /.row -->

  <div>
   <?php $this->load->view('frame/footer_view') ?>            
 </div>