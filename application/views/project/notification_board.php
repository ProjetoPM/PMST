
<style>
.table-bordered {
  border: 1px solid #4c4848;
}
table {
  border-spacing: 0;
  min-width:50px;/*valor minimo px,cm,% etc.*/;
  max-width:100%;/*valor maximo px,,cm,% etc.*/;
  word-wrap:break-word;
  white-space: nowrap;
  box-sizing: border-box;
  border-collapse: separate;
  max-height: 200px;
  min-height: 3px;
  text-align: center;
  padding: 7px;
  position: relative;
  vertical-align: middle;
  writing-mode: sideways-lr;
  word-break: break-all;
}
th{      
  font-size: 13px;
  height: auto;
  text-align: center;
  color: white;
}
td {
  font-weight: normal;      
  font-size: 13px;
  height: auto;
  text-align: left;        
}
.table thead th {
  background: linear-gradient(-180deg, #a94809, #d68e39);
  vertical-align: middle;
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

<div id="page-wrapper">
  <div class="row" position="absolute">
    <div class="col-lg-12">
      <h1 class="page-header">Notification Board</h1>
    </div>
    <!-- /.col-lg-12 -->


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
            <button type="button" class="open-AddBookDialog btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add"> New Notification Board</button>
            <!-- Modal -->
            <div class="modal fade" id="add" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Notification Board</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url() ?>notification_board/insert/" method="post">

                      <input type="hidden" name="project_id" value="<?php echo $project_id[0]; ?>">
                      <div class="form-group">
                        <label>Running Activities</label>
                        <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="running_activities">?</a>
                        <textarea class="form-control" id="running_activities" placeholder="Running Activities" name="running_activities"></textarea>
                      </div>

                      <!-- Textarea -->
                      <div class="form-group">
                        <label>Important Activities</label>
                        <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="important_activities">?</a>
                        <textarea class="form-control" id="important_activities" placeholder="Important Activities" name="important_activities"></textarea>
                      </div>

                      <div class="form-group">
                        <label>Open Issues</label>
                        <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="open_issues">?</a>
                        <textarea class="form-control" id="open_issues" placeholder="Open Issues" name="open_issues"></textarea>
                      </div>

                      <div class="form-group">
                        <label>Changes Approval</label>
                        <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="changes_approval">?</a>
                        <textarea class="form-control" id="changes_approval" placeholder="Changes Approval" name="changes_approval"></textarea>
                      </div>

                      <div class="form-group">
                        <label>General Warnings</label>
                        <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="general_warnings">?</a>
                        <textarea class="form-control" id="general_warnings" placeholder="General Warnings" name="general_warnings"></textarea>
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

      <div class="col-sm-12" align="center">
        <br><br>
        <p> <strong>Notification Board</strong> </p>
        <div style="overflow:scroll;max-height: 500px;  align = "center">
          <table class="table table-bordered table-striped" align="center">
            <thead>
              <tr>
                <th align="t-small">Running Activities</th>
                <th>Important Activities</th>
                <th>Open Issues</th>
                <th>Changes Approval Reason </th>
                <th>General Warnings</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($notification_board as $notification_board) {
                ?>
                <tr>

                  <td><?= $notification_board->running_activities; ?></td>
                  <td><?php echo $notification_board->important_activities;?></td>
                  <td><?php echo $notification_board->open_issues;?></td>
                  <td><?php echo $notification_board->changes_approval;?></td>
                  <td><?php echo $notification_board->general_warnings;?></td>
                  <td>
                    <form action="<?php echo base_url() ?>notification_board/delete/<?php echo $notification_board->notification_board_id; ?>">
                     <a> <button type="button" class="btn btn-default" data-id="edit" data-toggle="modal" data-target="#modal"><em class="fa fa-pencil"></em><span class="hidden-xs"> Edit</span></button></a> ||
                     <a><button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"> Delete</span></button>
                     </a>
                   </form>

                   <div class="modal fade" id="modal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Notification Board</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url() ?>notification_board/update/<?php echo $notification_board->notification_board_id; ?>" method="post">
                            <input type="hidden" name="project_id" value="<?php echo $notification_board->project_id?>">
                            <div class="form-group">
                              <label>Running Activities</label>
                              <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="running_activities">?</a>
                              <textarea class="form-control" id="running_activities" placeholder="Running Activities" name="running_activities"><?php echo $notification_board->running_activities?></textarea>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                              <label>Important Activities</label>
                              <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="important_activities">?</a>
                              <textarea class="form-control" id="important_activities" placeholder="Important Activities" name="important_activities"><?php echo $notification_board->important_activities?></textarea>
                            </div>

                            <div class="form-group">
                              <label>Open Issues</label>
                              <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="open_issues">?</a>
                              <textarea class="form-control" id="open_issues" placeholder="Open Issues" name="open_issues"><?php echo $notification_board->open_issues?></textarea>
                            </div>

                            <div class="form-group">
                              <label>Changes Approval</label>
                              <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="changes_approval">?</a>
                              <textarea class="form-control" id="changes_approval" placeholder="Changes Approval" name="changes_approval"><?php echo $notification_board->changes_approval?></textarea>
                            </div>

                            <div class="form-group">
                              <label>General Warnings</label>
                              <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="general_warnings">?</a>
                              <textarea class="form-control" id="general_warnings" placeholder="General Warnings" name="general_warnings"><?php echo $notification_board->general_warnings?></textarea>
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
                </td>
              </tr> 
              <?php
            }
            ?>

          </tbody>
        </table> 
      </div>  
    </div> 


    <!-- /.row --> </div> 
    <div class="col-sm-12" position= "absolute">
      <div class="container">
       <?php $this->load->view('frame/footer_view') ?>            
     </div>
   </div>
 </div> 