

<div id="page-wrapper">
  <div class="row" position="absolute">
    <div class="col-lg-12">
      <h1 class="page-header">Communications Management Plan </h1>
      <!-- <?php var_dump($communication_responsability) ?> -->

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



      <style>
      .table-bordered {
        border: 1px solid #4c4848;
      }
      modal-content{
        width: 90%;
        position: relative;
      }

      table {
        border-spacing: 0;
        min-width:50px;/*valor minimo px,cm,% etc.*/;
        max-width:100%;/*valor maximo px,,cm,% etc.*/;
        word-wrap:break-word;
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
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        white-space: nowrap;
        box-sizing: border-box;

      }

      th{      
        font-size: 13px;
        height: auto;
        text-align: center;
        color: white;


      }
      td {
        width:auto;
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



    <div class="row">
      <div class="col-lg-12">
        <div class="container">
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add"> New Communication Item</button>
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#maimodel"><em class="fa fa-pencil"></em><span class="hidden-xs"> Stakeholder</span></button>
          <!-- Modal -->
          <div class="modal fade" id="add" role="dialog">
            <div class="modal-dialog"style="width:75em;" >
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">New Communication Item</h4>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url() ?>communication_item/insert/" method="post">

                    <input type="hidden" name="project_id" value="<?php echo $project_id[0]; ?>">
                    <div class="form-group">
                      <label>Type</label>
                      <a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Here goes the type of the Communication Item">
                        ?
                      </a>
                      <textarea class="form-control" id="type" placeholder="Type" name="type" maxlength="45"></textarea>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" id="description" placeholder="Description" name="description" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Content</label>
                      <textarea class="form-control" id="content" placeholder="Content" name="content" maxlength="255"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Distribution Reason</label>
                      <textarea class="form-control" id="distribution_reason" placeholder="Distribution Reason" name="distribution_reason" maxlength="255"></textarea>
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
                      <label>Channel</label>
                      <textarea class="form-control" id="channel" placeholder="Channel" name="channel" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Document Format</label>
                      <textarea class="form-control" id="documento_format" placeholder="Document Format" name="documento_format" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Method</label>
                      <textarea class="form-control" id="metod" placeholder="Method" name="metod" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="frequency">Frequency</label>
                      <textarea class="form-control" id="frequency" placeholder="Frequency" name="frequency" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="allocated_resources">Allocated Resources</label>
                      <textarea class="form-control" id="allocated_resources" placeholder="Allocated Resources" name="allocated_resources" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="format">Format</label>
                      <div>                     
                        <textarea class="form-control" id="format" placeholder="Format" name="format" maxlength="45"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="local">Local</label>
                      <textarea class="form-control" id="local" placeholder="Local" name="local" maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Status:</label>
                      <input type="radio" name="status" value="1" required>
                      <label>On</label>
                      <input type="radio" name="status" value="0" required>
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
        </div>
      </div>
    </div>



    <!-- Trigger the modal with a button -->
    <div class="row">
      <div class="col-lg-2">

        <!-- Modal -->
        <div class="modal fade" id="maimodel" role="dialog">
          <div class="modal-dialog modal-lg" style="width:75em;">

            <!-- Modal content    FEchar com ESC-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Communication Stakeholder</h4>
              </div>
              <div class="modal-body">

                <table class="table table-bordered table-striped" >
                  <caption>Legenda</caption>
                  <thead>
                    <tr>
                      <th>Initials</th>
                      <th>Name</th>
                    </tr>
                  </thead>
                  <body>
                    <!-- Nessa Tabela as Initials tem q ficar no meio!!-->
                    <tr>
                     <?php
                     foreach ($communication_responsability as $res) {
                      ?>
                      <td style="text-align: center;"><?php echo $res->initials;?></td>
                      <td><?php echo $res->name;?></td>
                    </tr>
                  <?php } ?>
                </body>
              </table>
              <br></br>
              <!-- Segunda Tabela!!-->
              <div style="overflow:scroll;max-height: 500px;"  align = "center">
                <table class="table table-bordered table-striped" align="center">
                  <caption>Tabela Stakeholder</caption>
                  <thead>
                    <tr>
                      <th >Description</th>

                      <?php
                      foreach ($stakeholder as $stake) {
                        ?>
                        <th>
                          <?php echo $stake->name;?>
                        </th>
                      <?php } ?> 
                    </tr>
                  </thead>
                  <tbody>

                    <tr>

                      <?php
                      foreach ($communication_item as $item) {
                        ?>
                        <td><?php echo $item->description; ?></td>

                        <?php
                        foreach ($stakeholder as $stake) {
                          ?>
                          <td>
                            <label>Responsability</label>
                            <select class="form-control" <select style="width:90px;">>
                              <option></option>
                              <?php foreach ($communication_responsability as $responsability) { ?>
                                <option><?php echo $responsability->initials;?> </option>
                              <?php } ?>
                            </select>
                          </td>
                        <?php } ?> 
                      </tr>
                    <?php } ?>
                  </tbody>
                </table> 
              </div>
            </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-lg btn-default btn-block" data-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>














<div class="col-sm-12" align="center">
  <br><br>
  <p> <strong>Table Communication Items</strong> </p>
  <div style="overflow:scroll;max-height: 500px;"  align = "center">
    <table class="table table-bordered table-striped" align="center">
      <thead>
        <tr>
          <th >Type</th>
          <th>Description</th>
          <th>Content</th>
          <th>Distribution Reason </th>
          <th >Language</th>
          <th>Channel</th>
          <th>Document Format</th>
          <th>Method</th>
          <th>Frequency</th>
          <th>Allocated Resources</th>
          <th>Format</th>
          <th>Local</th>
          <th >Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($communication_item as $item) {
          ?>
          <tr>

            <td><?= $item->type; ?></td>
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
              <form action="<?php echo base_url() ?>communication_item/delete/<?php echo $item->communication_item_id; ?>">
                <a> <button type="button" class="btn btn-default" data-id="edit" data-toggle="modal" data-target="#modal"><em class="fa fa-pencil"></em><span class="hidden-xs"> Edit</span></button></a> ||

                <a><button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"> Delete</span></button>
                </a></form>


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