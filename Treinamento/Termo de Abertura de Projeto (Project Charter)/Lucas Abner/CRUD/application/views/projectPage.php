<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Welcome to TAP</title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
   </head>
   <body>
      <h1 class="page-header text-center"> WEB PMBOOK</h1>
      <div class="container">
         <h1 class="page-header text-center">Project Charter List</h1>
         <div class="row">
           		
               <span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
               
               </h3>
               <br><br>
               <table class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Scope</th>
                        <th>Objective</th>
                        <th>Sucess Criteria</th>
                        <th>Requirements</th>
                        <th>Assumptions</th>
                        <th>Risks</th>
                        <th>Milestone</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Budge</th>
                        <th>Responsible Stakeholder</th>
                        <th>Approval Requirements</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($project as $pro) { ?>
                     <tr>
                        <td><?php echo $pro->scope; ?></td>
                        <td><?php echo $pro->objective; ?></td>
                        <td><?php echo $pro->sucess; ?></td>
                        <td><?php echo $pro->requirements; ?></td>
                        <td><?php echo $pro->assumptions; ?></td>
                        <td><?php echo $pro->risks; ?></td>
                        <td><?php echo $pro->milestone; ?></td>
                        <td><?php echo $pro->start_date; ?></td>
                        <td><?php echo $pro->end_date; ?></td>
                        <td><?php echo $pro->budge; ?></td>
                        <td><?php echo $pro->stakeholder; ?></td>
                        <td><?php echo $pro->aprovalReq; ?></td>
                     </tr>
                     <?php } ?>					
                  </tbody>
               </table>
            </div>
         
      </div>
   </body>
</html>