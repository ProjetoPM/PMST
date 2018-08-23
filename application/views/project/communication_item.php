<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projects</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

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
            <!-- /.row -->          
        <div class="row">
        <div class="col-lg-12">

<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Communication Item</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Communication Item</h4>
        </div>
        <div class="modal-body">
        <form action="<?=base_url()?>communication_item/insert/" method="post">
        <input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
        <div class="form-group">
                  <label>Type</label>
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
                    <textarea class="form-control" id="language" placeholder="Language" name="language" maxlength="45"></textarea>
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
                  <label>Metod</label>
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
                <label>Status:</label>&nbsp;&nbsp;
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

<div class="row">
		<div class="col-sm-12">
<br><br>



	<table class="table table-bordered table-striped">
				<thead>
					<tr>
            <th>Type</th>
            <th>Description</th>
            <th>Content</th>
            <th>Distribution Reason</th>
            <th>Language</th>
            <th>Channel</th>
            <th>Document Format</th>
            <th>Metod</th>
            <th>Frequency</th>
            <th>Allocated Resources</th>
            <th>Format</th>
            <th>Local</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($communication_item as $item) { ?>
						<tr>
							<td><?php echo $item->type; ?></td>
							<td><?php echo $item->description; ?></td>
							<td><?php echo $item->content;?></td>
              <td><?php echo $item->distribution_reason; ?></td>
							<td><?php echo $item->language;?></td>
							<td><?php echo $item->channel;?></td>
              <td><?php echo $item->documento_format; ?></td>
							<td><?php echo $item->metod;?></td>
              <td><?php echo $item->frequency; ?></td>
							<td><?php echo $item->allocated_resources;?></td>
							<td><?php echo $item->format;?></td>
              <td><?php echo $item->local?></td>
              <a href="<?php base_url(); ?>communication_item/#myModal?a=<?php echo $item->communication_item_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span>Edit</a>
						</tr> <?php } ?>					
				</tbody>
			</table> 
      </div>
</div>


              <?php
                if($communication_item == -1){
                  //var_dump($project_id);
                  //die();
            ?>
            <form action="<?=base_url()?>communication_item/update/<?php echo $communication_item[0]->communication_item_id;?>" method="post">
            	<input type="hidden" name="project_id" value="<?php echo $project_id[0];?>">
                <!-- Textarea -->
                <div class="form-group">
                  <label for="type">Typeeeee</label>
                  <div >                     
                    <textarea class="form-control" id="type" name="type" maxlength="45"><?php echo $communication_item[0]->type?></textarea>
                  </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                  <label for="description">Description</label>
                  <div >                     
                    <textarea class="form-control" id="description" name="description" maxlength="45"><?php echo $communication_item[0]->description?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <div>                     
                    <textarea class="form-control" id="content" name="content" maxlength="255"><?php echo $communication_item[0]->content?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="distribution_reason">Distribution Reason</label>
                  <div>                     
                    <textarea class="form-control" id="distribution_reason" name="distribution_reason" maxlength="255"><?php echo $communication_item[0]->distribution_reason?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="language">Language</label>
                  <div>                     
                    <textarea class="form-control" id="language" name="language" maxlength="45"><?php echo $communication_item[0]->language?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="channel">Channel</label>
                  <div>                     
                    <textarea class="form-control" id="channel" name="channel" maxlength="45"><?php echo $communication_item[0]->channel?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="documento_format">Documento Format</label>
                  <div>                     
                    <textarea class="form-control" id="documento_format" name="documento_format" maxlength="45"><?php echo $communication_item[0]->documento_format?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="metod">Metod</label>
                  <div>                     
                    <textarea class="form-control" id="metod" name="metod" maxlength="45"><?php echo $communication_item[0]->metod?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="frequency">Frequency</label>
                  <div>                     
                    <textarea class="form-control" id="frequency" name="frequency" maxlength="45"><?php echo $communication_item[0]->frequency?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="allocated_resources">Allocated Resources</label>
                  <div>                     
                    <textarea class="form-control" id="allocated_resources" name="allocated_resources" maxlength="45"><?php echo $communication_item[0]->allocated_resources?></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="format">Format</label>
                  <div>                     
                    <textarea class="form-control" id="format" name="format" maxlength="45"><?php echo $communication_item[0]->format?></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="local">local</label>
                  <div>                     
                    <textarea class="form-control" id="local" name="local" maxlength="45"><?php echo $communication_item[0]->local?></textarea>
                  </div>
                </div>
                <div class="form-group">
                   <label>Status:</label> <br></br>
                    <?php if($communication_item[0]->status == 1){?>
                      <input type="radio" checked name="status" value="1">
                      <label>On</label><br>
                      <input type="radio" name="status" value="0">
                      <label>Off</label>
                   <?php
                    }else{
                  ?>
                      <input type="radio" checked name="status" value="1">
                      <label>On</label><br>
                      <input type="radio" name="status" value="0">
                      <label>Off</label>
                    <?php
                      }
                  ?>
              </div>
               	<input id="risk-submit" type="submit" value="Save" class="btn btn-lg btn-success btn-block">
              </form>
              <?php
                }
              ?>
                
<!-- AQUI VAI FINALIZAR A VIEW DO GERENCIAMENTO DE RISCOS!!!! -->

<!-- /.row -->
</div>
<div>
<br><br>
<?php $this->load->view('frame/footer_view')?>            
</div>