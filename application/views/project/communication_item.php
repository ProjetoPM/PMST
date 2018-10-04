
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
      .modal {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

        -webkit-transition: all 0.5s 0.5s ease-in-out;
        transition: all 0.5s 0.5s ease-in-out;
      }
      div.div-center {
        width: 500px;
        position: relative;
        left: 50%;
        margin-left: -250px;
      }

      .modal-content {
        padding: 10px;
        max-width: 75em;
        min-width: 500px;
        overflow: auto;
        position: absolute;
        top: 5%;
        left: 50%;
        border-radius: 3px;
        background: #fff;
        -webkit-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        -webkit-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
      }



      .table-bordered {
        border: 1px solid #4c4848;
      }
      modal-content{
        width: 100%;
        position: relative;
      }

      @media screen and (max-width: 767px) {
        .modal-content {
          padding: 10px 5%;
          min-width: 88%;
        }
      }

      @media screen and (max-width: 768px) {
        .modal-content {
          padding: 10px;
          min-width: 600px;
          top: 5%;
          left: 35%;
        }
      }



      @media screen and (max-width: 375px) {
        .modal-content {
          padding: 10px 1%;
          min-width: 20%;
          left: 16%;
        }
      }


      input[id*="modal_"] {
        position: fixed;
        left: -9999px;
        top: 50%;
        opacity: 0;
      }

      input[id*="modal_"]:checked + div.modal {
        opacity: 1;
        visibility: visible;
        -webkit-transition-delay: 0s;
        -ms-transition-delay: 0s;
        transition-delay: 0s;
      }

      input[id*="modal_"]:checked + div.modal .modal-content {
        opacity: 1;
        -webkit-transform: translate(-50%, 0);
        -ms-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        -webkit-transition-delay: 0.5s;
        -ms-transition-delay: 0.5s;
        transition-delay: 0.5s;
      }
      .table-bordered {
        border: 1px solid #4c4848;
      }
      modal-content{
        width: 90%;
        position: relative;
      }

      table .header-fixed {
        position: fixed;
        top: 40px;
        z-index: 1020; /* 10 less than .navbar-fixed to prevent any overlap */
        border-bottom: 1px solid #d5d5d5;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        -webkit-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
        -moz-box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 0 #fff, 0 1px 5px rgba(0,0,0,.1);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false); /* IE6-9 */
      }


      table {
        border-spacing: 0;
        word-wrap:break-word;
        box-sizing: border-box;
        border-collapse: separate;
        text-align: center;
        padding: 7px;
        position: relative;
        vertical-align: middle;
        writing-mode: sideways-lr;
        word-break: break-all;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        white-space: nowrap;
        overflow: auto;
        
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
       <a href="<?php echo base_url(); ?>index.php/project/addproject" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Project</a>
       
      <a class="btn btn-info btn-lg" href="<?=base_url()?>new_communication_item/insert/<?php echo $project[0]->project_id;?>"><em class="fa fa-pencil"></em>COMMUNICATION ITEM</a>



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
       <form action="<?= base_url() ?>communication_item/insertResponasibility/" method="post">
        <div class="col-lg-2 form-group div-center">
          <select class="form-control" onchange="stake(this.value, 'Stakeholder')" id="select_stake" name="Stakeholder">
            <?php foreach($stakeholder as $stake){ ?>
              <option value="<?php $teste = $stake->stakeholder_id; echo $teste ?>"><?php echo $stake->name; ?></option>
            <?php } ?>
          </select>
        </div>


        <div class="col-sm-2">
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
  </div>
  <div class="clear"></div>



  <br></br>
  <!-- Segunda Tabela!!-->
  <div class="col-sm-12height400" align="center" >
   <table id="mytable03" class="fancyTable" >
    <caption>Tabela Stakeholder</caption>
    <thead>
     <tr>
      <th >Description</th>

      <?php
      foreach ($stakeholder as $stake) {
       ?>
       <th>
        <label><?php echo $stake->name;?></label>
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
     <select  name="ids" class="form-control" <select style="width:90px;">>
      <option></option>
      <?php foreach ($communication_responsability as $responsability) { ?>


       <option value="<?php echo $item->communication_item_id; ?>,<?php echo $stake->stakeholder_id;?>,<?php echo $responsability->communication_responsability_id; ?>"><?php echo $responsability->initials;?></option>

       <?php 

     } ?>
   </select>
 </td>
<?php } ?> 
</tr>
<?php } ?>
</tbody>
</table> 

<div class="clear"></div>
</div>
</div>

<div class="row">
 <div class="col-lg-6">
  <button type="button" class="btn btn-lg btn-default pull-left" data-dismiss="modal">Close</button>
</div>
<div class="col-lg-6">
  <button id="new_communication_item-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
   <i class="glyphicon glyphicon-ok"></i>Save
 </button> 
</div>

</div>
</form>
</div>
</div>

</div>
</div>
</div>
</div>
</div>


<br></br>

<div class="grid_8 height250 width100">
 <table id="myTable01" class="fancyTable">
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


<!-- /.row --> </div> 
<div class="col-sm-12" position= "absolute">
  <div class="container">
   <?php $this->load->view('frame/footer_view') ?>            
 </div>
</div>
</div> 

<script src="<?=base_url()?>assets/js/jquery.fixedheadertable.min.js" type="text/javascript"></script>

<script type="text/javascript" >
    // $(document).on("ready", function(){
      // // add 30 more rows to the table
      // var row = $('table#mytable > tbody > tr:first');
      // var row2 = $('table#mytable2 > tbody > tr:first');
      // for (i=0; i<30; i++) {
      //   $('table#mytable > tbody').append(row.clone());
      //   $('table#mytable2 > tbody').append(row2.clone());
      // }

      // make the header fixed on scroll
      $('#tableComunication').fixedHeaderTable({ footer: false, cloneHeadToFoot: false, fixedColumn: false });
    // });
  </script>


  <!-- Cod Elastic TextArea -->
  <script src="<?=base_url()?>assets/js/elasticTextarea.js" type="text/javascript"></script>