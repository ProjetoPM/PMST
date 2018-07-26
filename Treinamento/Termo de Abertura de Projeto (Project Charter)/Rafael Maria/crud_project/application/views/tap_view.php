<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Termo de Abertura do Projeto</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center"> Project Charter </h1>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			
				<span class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
				<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/stakeholder/addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Stakeholder</a></span> 
				<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/stakeholder/viewstakeholderlist" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Stakeholder List</a></span>
				<br></br>
			<h3> TAP </h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/insertproject">
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
				<div class="form-group">
					<label>Stackholder List:</label>
					<!-- <?php foreach ($stakelholder as $stakeholder) {
						 ?>
					
						<div class="checkbox">
 						 <label><input type="checkbox" value="" class="checkbox" name="stakeholder"> <?php echo $stakeholder->name; ?></label>
 						-->
 						  <input type="text" class="form-control" name="stakeholder">
						</div>
				 	 
				<!-- </div>	
			 <?php 
			}
			 ?> -->			
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>