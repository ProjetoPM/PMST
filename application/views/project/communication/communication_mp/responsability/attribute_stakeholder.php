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
    <!-- <input type="hidden" name="project_id"  value="<?php echo $project_id; ?>">  -->

           <form method="POST" action="<?php echo base_url()?>communication_item/insertStakeResp/">

            <div class="col-lg-8 form-group"> 
              <label>Select Stakeholder</label> 
              <a class="btn-sm b2tn-default" data-toggle="tooltip" data-placement="right" title="stakeholder"><i class="glyphicon glyphicon-comment"></i></a> 

              <select id="stakeholder_id" name="stakeholder_id" class="form-control" onchange="myFunction2()">

                <?php
                foreach ($stakeholders as $stakeholder) {
                  ?><!-- <?php echo $stakeholder->stakeholder_id;?> -->
                  <option id="stake" name="stakeholder" value="<?php echo $stakeholder->stakeholder_id;?>"><?php echo $stakeholder->name;?></option>
                  <?php } ?>

              </select>

            </div> 

            <div class="col-lg-4 form-group"> 
            <table style="max-width: 600px" class="table table-bordered table-striped" >
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
        </div>
          <!-- Segunda Tabela!!-->
          <div   align = "center">
            <table class="table table-bordered table-striped" align="center">
              <caption>Tabela Stakeholder</caption>
              <thead>
                <tr>
                  <th >Description</th>
                  <th id="nameStake"> 
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  foreach ($communication_item as $item) {
                    ?>
                    <td id="communication_item_id"><?php echo $item->description; ?></td>
                    <td>
                      <label>Responsability</label>
                      <select id="communication_responsability_id" class="form-control" <select style="width:90px;">>
                        <option></option>
                        <?php foreach ($communication_responsability as $responsability) { ?>
                          <option><?php echo $responsability->initials;?> </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table> 

             <div class="col-lg-12">
          <button id="new_comunication_stakeholder-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
            <i class="glyphicon glyphicon-ok"></i> <?=$this->lang->line('btn-save')?>
          </button> 
        </form>

        <form action="<?php echo base_url()?>/communication_item/list/<?=$project_id?>">
         <button class="btn btn-lg btn-info pull-left" >  <i class="glyphicon glyphicon-chevron-left"></i> <?=$this->lang->line('btn-back')?></button>
       </form>
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
            var x2 = $('#stakeholder_id :selected').text()
            document.getElementById("nameStake").innerHTML = x2;
          }
        </script>


      </div>
    </div>
    <?php $this->load->view('frame/footer_view')?>
