<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PMBOK Manager - Add New Stakeholder</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Add New Stakeholder</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Insert Stakeholder Details
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/createStakeholder">
				<div class="form-group">
					<label>Stakeholder Name:</label>
					<input type="text" class="form-control" value="" name="teste" required="">
				</div>
				<div class="form-group">
					<label>Roles:</label>
					<select class="form-control" name="stakeRoles" required="">
						<option value="">Select a status</option>
						<option value="Project manager">Project Manager</option>
						<option value="Finance Manager">Finance Manager</option>
					</select>
				</div>
				<div class="form-group">
					<label>Status:</label>
					<select class="form-control" name="stakeStatus" required="">
						<option value="">Select a status</option>
						<option value="0">Active</option>
						<option value="1">Inactive</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Submit</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>