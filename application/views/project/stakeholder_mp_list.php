<div id="page-wrapper">
  <div class="row" position="absolute">
    <div class="col-lg-12">
      <h1 class="page-header"><?=$this->lang->line('stakeholder_mp-title')?></h1>
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

      <div class="row">
        <div class="col-lg-10">
          <div class="container">
            <button type="button" class="btn btn-info btn-lg glyphicon-plus"><a href="<?php echo base_url() ?>communication_item/insert/"></a> <?=$this->lang->line('select-1')?></button>
            <button type="button" class="btn btn-info btn-lg" data-target=""><em class="fa fa-pencil"></em><span class="hidden-xs"> <?=$this->lang->line('stakeholder')?></span></button>
          </div>
        </div>
      </div>

      <br><br>
      <div class="row">
        <div class="col-lg-12">
          <table id="tableC">
            <thead>
              <tr>
                <th><?=$this->lang->line('stake')?></th>
                <th><?=$this->lang->line('interest')?></th>
                <th><?=$this->lang->line('power')?></th>
                <th><?=$this->lang->line('influence')?></th>
                <th><?=$this->lang->line('impact')?></th>
                <th><?=$this->lang->line('average')?></th>
                <th><?=$this->lang->line('current_engagement')?></th>
                <th><?=$this->lang->line('expected_engagement')?></th>
                <th><?=$this->lang->line('strategy')?></th>
                <th><?=$this->lang->line('scope')?></th>
                <th><?=$this->lang->line('observation')?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($data as $item) {
                ?>
                <tr>
                  <td><?php echo $item->stakeholder_id;?></td>
                  <td><?php echo $item->interest;?></td>
                  <td><?php echo $item->content;?></td>
                  <td><?php echo $item->power;?></td>
                  <td><?php echo $item->influence;?></td>
                  <td><?php echo $item->impact;?></td>
                  <td><?php echo $item->average;?></td>
                  <td><?php echo $item->current_engagement;?></td>
                  <td><?php echo $item->expected_engagement;?></td>
                  <td><?php echo $item->strategy;?></td>
                  <td><?php echo $item->scope;?></td>
                  <td><?php echo $item->observation;?></td>
        
                  <td>
                    <form action="<?php echo base_url() ?>communication_item/delete/<?php echo $item->communication_item_id; ?>">
                      <a> <button type="button" class="btn btn-default" data-id="edit" data-toggle="modal" data-target="#modal"><em class="fa fa-pencil"></em><span class="hidden-xs"> <?=$this->lang->line('edit')?></span></button></a> ||

                      <a><button type="submit" class="btn btn-danger"><em class="fa fa-trash"></em><span class="hidden-xs"> <?=$this->lang->line('delete')?></span></button>
                   
                  
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

      <!--DataTable -->
      <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
      <!--<script src='https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js'></script> -->
      <!--<script src='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js'></script>-->
      <!--<script src='https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js'></script>-->
      <script src="<?=base_url()?>assets/js/jquery-2.1.3.min.js"></script>
      <script src="<?=base_url()?>assets/js/jquery.dataTables.min.js"></script>
      <script src="<?=base_url()?>assets/js/dataTables.bootstrap.js"></script>
      <script src="<?=base_url()?>assets/js/dataTables.responsive.js"></script>
      <script src="<?=base_url()?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

      <script type="text/javascript">
        $(document).ready( function () {
          $('#tableC').DataTable();
        } );
      </script>