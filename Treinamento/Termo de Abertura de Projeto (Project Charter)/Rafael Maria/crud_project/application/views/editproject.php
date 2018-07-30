<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Edit Project</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Edit Project</h1>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-2">
			<span class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span><br></br>
			<h3>Edit Form</h3>
			<hr>
				 <!-- <?php extract($project); ?> -->
			  
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/updateproject/">
				 <div class="form-group">
					<label>Project Scope:</label> <!-- <input type="text" class="form-control" name="scope"> -->
					<textarea  type="text" class="form-control" name="scope">
					
					</textarea>
				</div>
			
				<div class="form-group">
					<label>Project Objectives:</label>
					<!-- <input type="text" class="form-control" name="objective">-->
					<textarea type="text" class="form-control" name="objective"></textarea>
					
				</div>	
				<div class="form-group">
					<label>Sucess Criteria:</label>
					<!--<input type="text" class="form-control" name="sucess">-->
					<textarea type="text" class="form-control" name="sucess"></textarea>
				</div>			
				<div class="form-group">
					<label>Requirements:</label>
					<!--<input type="text" class="form-control" name="requirements">-->
					<textarea type="text" class="form-control" name="requirements"></textarea>
				</div>	
				<div class="form-group">
					<label>Assumptions:</label>
					<!-- <input type="text" class="form-control" name="assumptions">-->
					<textarea type="text" class="form-control" name="assumptions"></textarea>
				</div>	
				<div class="form-group">
					<label>Project Constraints:</label>
					<!-- <input type="text" class="form-control" name="constraints"> -->
					<textarea type="text" class="form-control" name="constraints"></textarea>
				</div>	
				<div class="form-group">
					<label>Project Risks:</label>
					<!-- <input type="text" class="form-control" name="risks">-->
					<textarea type="text" class="form-control" name="risks"></textarea>
				</div>	
				<div class="form-group">
					<label>Sumary Milestone Schedule:</label>
					<!-- <input type="text" class="form-control" name="milestone">-->
					<textarea type="text" class="form-control" name="milestone"></textarea>
				</div>	
				<div class="form-group">
					<label>Sumary Budget:</label>
					<!--<input type="text" class="form-control" name="budget"> -->
					<textarea type="text" class="form-control" name="budget"></textarea>
				</div>	
				<div class="form-group">
					<label>Project Approval Requirements:</label>
				<!-- <input type="text" class="form-control" name="approvalreq"> -->
					<textarea type="text" class="form-control" name="approvalreq"></textarea>
				</div>	
				<?php # BEGIN ERROR !!!!!!!!!!!! ?>
			<!--	<div class="form-group">
					<label>Stackholder List:</label>					
					
					 <?php foreach ($stakelholder as $stakeholder) {
						 ?>
						<div class="checkbox">
 						 <label><input type="checkbox" value="" class="checkbox" name="stakeholder"> <?php echo $stakeholder->name; 
 						 echo " | ID = "; echo $stakeholder->stakelholder_id; ?></label> 		 
						</div>		

				 </div>	
			 <?php 
			}
			 ?> 	-->
			 <?php # END ERROR !!!!!!!!!!!!!!! ?>
				 <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>