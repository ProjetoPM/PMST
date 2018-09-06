<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Issues record data-placement</h1>
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
          <button type="button" class="open-AddBookDialog btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add">Register Issues Record</button>
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
                      <label>Responsable for the Identifying</label>
                      <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Here goes the type of the Communication Item">
                        ?
                      </a>
                      <textarea class="form-control" id="identification"  name="identification" maxlength="45"></textarea>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                      <label>Identification Date</label>
                      <textarea class="form-control" id="identification_date"  name="identification_date" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Description of the Issue</label>
                      <textarea class="form-control" id="question_description"  name="question_description" maxlength="255"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Issue Type</label>
                       <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Corrective Action, Preventive Action, Defact Repair and Updates ">
                        ?
                      </a>
                      <textarea class="form-control" id="type"  name="type" maxlength="255"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Language</label>
                      <select class="form-control" name="language" required="">
                        <option></option>
                        <option value="English">English</option>
                        <option value="Portuguese">Portuguese Brazil</option>
                        <option value="Portuguese Portugal">Portuguese Portugal</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Dutch">Dutch</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Issue Responsable</label>
                      <textarea class="form-control" id="responsable"  name="responsable" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Situation</label>
                      <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Registred, In Analysis, Approved, Rejected, Canceled or Suspended ">
                        ?
                      </a>

                      <textarea class="form-control" id="situation"  name="situation" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Required Action</label>
                      <textarea class="form-control" id="action"  name="action" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="frequency">Planned Resolution Date</label>
                      <textarea class="form-control" id="resolution_date" name="resolution_date" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="frequency">Reorganized Resolution Date</label>
                      <textarea class="form-control" id="replan_date"  name="replan_date" maxlength="45"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="allocated_resources">Observations</label>
                      <textarea class="form-control" id="observations" "name="observations" maxlength="45"></textarea>
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
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Type</th>
              <th>Description</th>
              <th>Content</th>
              <th>Distribution Reason </th>
              <th>Language</th>
              <th>Channel</th>
              <th>Document Format</th>
              <th>Method</th>
              <th>Frequency</th>
              <th>Allocated Resources</th>
              <th>Format</th>
              <th>Local</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($communication_item as $item) {
              ?>
              <tr>
                <td><?php echo $item->type;?></td>
                <td><?php echo $item->description;?></td>
                <td><?php echo $item->content;?></td>
                <td><?php echo $item->distribution_reason;?></td>
                <td><?php echo $item->language;?></td>
                <td><?php echo $item->channel;?></td>
                <td><?php echo $item->documento_format;?></td>
                <td><?php echo $item->metod;?></td>
                <td><?php echo $item->frequency;?></td>
                <td><?php echo $item->allocated_resources;?></td>
                <td><?php echo $item->format;?></td>
                <td><?php echo $item->local;?></td>
                <td>
                  <button type="button" class="open-AddBookDialog btn btn-default btn-lg glyphicon glyphicon-edit" data-id="edit" data-toggle="modal" data-target="#modal">Edit</button>

                  <div class="modal fade" id="modal" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Communication Item</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?= base_url() ?>communication_item/update/<?php echo $communication_item[0]->communication_item_id; ?>" method="post">
                            <div class="form-group">
                              <label>Type</label>
                              <textarea class="form-control" id="type" placeholder="Type" name="type" maxlength="45"><?php echo $communication_item[0]->type; ?></textarea>
                            </div>
                            <!-- Textarea -->
                            <div class="form-group">
                              <label>Description</label>
                              <textarea class="form-control" id="description" placeholder="Description" name="description" maxlength="45"><?php echo $communication_item[0]->description; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Content</label>
                              <textarea class="form-control" id="content" placeholder="Content" name="content" maxlength="255"><?php echo $communication_item[0]->content; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Distribution Reason</label>
                              <textarea class="form-control" id="distribution_reason" placeholder="Distribution Reason" name="distribution_reason" maxlength="255"><?php echo $communication_item[0]->distribution_reason; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Language</label>
                              <textarea class="form-control" id="language" placeholder="Language" name="language" maxlength="45"><?php echo $communication_item[0]->language; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Channel</label>
                              <textarea class="form-control" id="channel" placeholder="Channel" name="channel" maxlength="45"><?php echo $communication_item[0]->channel; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Document Format</label>
                              <textarea class="form-control" id="documento_format" placeholder="Document Format" name="documento_format" maxlength="45"><?php echo $communication_item[0]->documento_format; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>Method</label>
                              <textarea class="form-control" id="metod" placeholder="Method" name="metod" maxlength="45"><?php echo $communication_item[0]->metod; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="frequency">Frequency</label>
                              <textarea class="form-control" id="frequency" placeholder="Frequency" name="frequency" maxlength="45"><?php echo $communication_item[0]->frequency; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="allocated_resources">Allocated Resources</label>
                              <textarea class="form-control" id="allocated_resources" placeholder="Allocated Resources" name="allocated_resources" maxlength="45"><?php echo $communication_item[0]->allocated_resources; ?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="format">Format</label>
                              <div>                     
                                <textarea class="form-control" id="format" placeholder="Format" name="format" maxlength="45"><?php echo $communication_item[0]->format; ?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="local">Local</label>
                              <textarea class="form-control" id="local" placeholder="Local" name="local" maxlength="45"><?php echo $communication_item[0]->local; ?></textarea>
                            </div>

                            <div class="form-group">
                              <label>Status:</label>
                              <input type="radio" <?= $communication_item[0]->status != 1?: "checked"; ?> name="status" value="1">
                              <label>On</label>
                              <input type="radio" <?= $communication_item[0]->status != 0?: "checked"; ?> name="status" value="0">
                              <label>Off</label>
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


                  <form action="<?php echo base_url() ?>communication_item/delete/<?php echo $item->communication_item_id; ?>">
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