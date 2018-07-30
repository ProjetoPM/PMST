<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Edit User</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Edit Form
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php extract($stakeholder); ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/updateStakeholder/<?php echo $stakelholder_id; ?>">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
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
					<select class="form-control" name="stakeholderStatus" required="">
						<option value="">Select a status</option>
						<option value="0">Active</option>
						<option value="1">Inactive</option>
					</select>
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>