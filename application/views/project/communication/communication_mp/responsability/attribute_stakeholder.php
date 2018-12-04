<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Stakeholder Responsability</h1>
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

    <!-- -->

    <form method="POST" action="<?php echo base_url()?>Communication_stakeholder/insert/">
      <div class="row">
        <div class="col-lg-6 form-group"> 
          <input type="hidden" name="project_id"  value="<?php echo $project_id; ?>">
          <label>Select Stakeholder</label> 
          <a class="btn-sm b2tn-default" data-toggle="tooltip" data-placement="right" title="stakeholder"><i class="glyphicon glyphicon-comment"></i></a> 

          <select id="stakeId" name="stakeholder_id" class="form-control" onchange="myFunction2()">
            <?php
            foreach ($stakeholders as $stakeholder) {
              ?>
              <option id="stake" value="<?php echo $stakeholder->stakeholder_id;?>"><?php echo $stakeholder->name;?></option>
              <?php 
            } 
            ?>
          </select>
        </div>
      </div>
      <div class="row"> 
        <div class="col-lg-6">
          <table class="table table-bordered table-striped" align="center">
            <caption>Tabela Stakeholder</caption>
            <thead>
              <tr>
                <th id="nameStake"> 

                  <th >Description</th>
                </th>
              </tr>
            </thead>
            <tbody>
             <?php
             foreach ($communication_item as $item) {
              ?>
              <tr>
                <td>
                  <label>Responsability</label>
                  <select id="communication_responsability_id" name="communication_responsability_id_<?php echo $item->communication_item_id?>" class="form-control" style="width:200px;">
                    <option></option>
                    <?php foreach ($communication_responsability as $responsability){
                     ?>
                      <option value="<?php echo $responsability->communication_responsability_id;?>"><?php echo $responsability->name;?> </option>
                      <?php 
                    } 
                    ?>
                  </select>
                </td>
                <td id="communication_item_id"><?php echo $item->description; ?></td>
                <input type="hidden" name="communication_item_id" value="<?php echo $item->communication_item_id; ?>">
              </tr>
            <?php } ?>
          </tbody>
        </table> 
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <button id="new_comunication_stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
          <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
        </button> 
      </form>

      <form action="<?php echo base_url()?>/communication_item/list/<?=$project_id?>">
       <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
     </form>
   </div>
 </div>
 <script type="text/javascript"> 

  function changedd(){ 
   var stake = document.getElementById('stake').value; 
   document.getElementById('nameStake').innerHTML = stake; 
 } 

</script> 

<script>
  function myFunction2() {
            // var x2 = document.getElementById("stakeholder_id").value;
            var x2 = $('#stakeId :selected').text();
            document.getElementById("nameStake").innerHTML = x2;
          }
        </script>


      </div>
    </div>
    <?php $this->load->view('frame/footer_view')?>
