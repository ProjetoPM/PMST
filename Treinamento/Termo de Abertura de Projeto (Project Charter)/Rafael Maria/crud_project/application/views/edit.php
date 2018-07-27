<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Edit Stakeholder</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Edit Stakeholder</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<span class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span><br></br>
			<h3>Edit Form</h3>
			<hr>
				 <?php extract($stakeholder); ?>
			  
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/update/<?php echo $id ?>">
				<div class="form-group">
          			<label>Name:</label>
          			<input type="text" class="form-control" name="name">
        		</div>
        		<div class="form-group">
          			<label>Roles Responsabilities:</label>
          			<input type="text" class="form-control" name="roles_responsabilities">
        		</div>
       			<div class="form-group">
     				<label>Status:</label>
          			<input type="text" class="form-control" name="status">
        		</div>   
				 <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>