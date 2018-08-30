<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Communications Management data-placement</h1>
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
                    <button type="button" class="open-AddBookDialog btn btn-info btn-lg glyphicon-plus" data-toggle="modal" data-target="#add"> New Communication Item</button>
                    <!-- Modal -->
                    <div class="modal fade" id="add" role="dialog">
                        <div class="modal-dialog">
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
        </div>

        <div class="row">
            <div class="col-sm-12">
                <br><br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Type <a href="#" data-toggle="tooltip" title="Here goes the Type"><span class="glyphicon glyphicon-bell"></span></a></th>
                            <th>Description<a href="#" type="button" id="tooltip" data-toggle="tooltip" data-placement="top" title="Here goes the type of the Description"></th>    
                                <th>Content <a href="#" data-toggle="tooltip" title="Here goes the Content"><span class="glyphicon glyphicon-bell"></span></a></th>
                                <th>Distribution Reason <a href="#" data-toggle="tooltip" title="Here goes the Distribution Reason"><span class="glyphicon glyphicon-bell"></span></a></th>
                                <th>Language <a href="#" data-toggle="tooltip" title="Here goes the Language"><span class="glyphicon glyphicon-bell"></span></a></th>
                                <th>Channel <a href="#" data-toggle="tooltip" title="Here goes the Channel"><span class="glyphicon glyphicon-bell"></span></a></th>
                                <th>Document Format <a href="#" data-toggle="tooltip" title="Here goes the Document Format"><span class="glyphicon glyphicon-bell"></span></a></th>
                                <th>Method <a href="#" data-toggle="tooltip" title="Here goes the Method"><span class="glyphicon glyphicon-bell"></span></a></th>
                                    <th>Frequency <a href="#" data-toggle="tooltip" title="Here goes the Frequency"><span class="glyphicon glyphicon-bell"></span></a></th>
                                    <th>Allocated Resources<a href="#" data-toggle="tooltip" title="Here goes the Allocated Resources"><span class="glyphicon glyphicon-bell"></span></a></th>
                                    <th>Format <a href="#" data-toggle="tooltip" title="Here goes the Format"><span class="glyphicon glyphicon-bell"></span></a></th>
                                    <th>Local <a href="#" data-toggle="tooltip" title="Here goes the Local"><span class="glyphicon glyphicon-bell"></span></a></th>
                                    <th>Actions <a href="#" data-toggle="tooltip" title="You can Delete or Updtade some register"><span class="glyphicon glyphicon-bell"></span></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($communication_item as $item) {
                                    ?>
                                    <tr>
                                        <td><?php echo $item->type; ?></td>
                                        <td><?php echo $item->description; ?></td>
                                        <td><?php echo $item->content; ?></td>
                                        <td><?php echo $item->distribution_reason; ?></td>
                                        <td><?php echo $item->language; ?></td>
                                        <td><?php echo $item->channel; ?></td>
                                        <td><?php echo $item->documento_format; ?></td>
                                        <td><?php echo $item->metod; ?></td>
                                        <td><?php echo $item->frequency; ?></td>
                                        <td><?php echo $item->allocated_resources; ?></td>
                                        <td><?php echo $item->format; ?></td>
                                        <td><?php echo $item->local; ?></td>
                                        <td>
                                            <button type="button" class="open-AddBookDialog btn btn-default btn-lg glyphicon glyphicon-edit" data-id="edit" data-toggle="modal" data-target="#modal">Edit</button>
                                            <form action="<?php base_url() ?>delete/<?php echo $item->communication_item_id; ?>"></form>
                                           <button><span class="fa fa-trash"></span><input type="submit" name="Delete" value="Delete"></button>
                                        </td>
                                    </tr> 
                                    <?php
                                }
                                ?>					
                            </tbody>
                        </table> 
                    </div>
                </div>

            </div>
            <!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->
        </div>

        <!-- /.row -->
    </div>
    <div>
        <script>
            $(document).ready(function(){
                $('[data-to ggle="tooltip"]').tooltip(); 
            });

            $(document).on("click", ".open-AddBookDialog", function () {
               var modalId = $(this).data('id');
               $(".modal-body #bookId").val(modalId);
           });
       </script>
       <?php $this->load->view('frame/footer_view') ?>            
   </div>