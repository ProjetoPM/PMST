<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PMST</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="page-header text-center">Management of
		Stakeholders</h1>

		<div class="row">
			<div class="row" style="text-align: center;">
				<a href="<?php echo base_url(); ?>index.php/Stakeholders/addNStakeholders" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Stakeholders</a>

				<a href="<?php echo base_url(); ?>index.php/Stakeholders/addProject" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Project</a>

				<a href="<?php echo base_url(); ?>index.php/Stakeholders/projectList" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Project List</a>
				<br><br>
			</div>
			<div class="col-sm-4 col-sm-offset-4">
				<h3>Add New Stakeholder
					<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/Stakeholders/addProject" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-right"></span> Jump</a></span>
				</h3>
				<hr>
				<form method="POST" action="<?php echo base_url(); ?>index.php/Stakeholders/addStakeholder">
					<div class="form-group">
						<label>Username:</label>
						<input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
						<label>Roles/Responsabilies:</label>
						<textarea class="form-control" name="roles_responsabilies" rows="6"></textarea>
					</div>

					<div class="form-group">

						<div class="form-group">
							<input name="status" value="1" class="form-check-input" type="radio" checked>				Active Stakeholder<br>
							<input name="status" value="0" class="form-check-input" type="radio">				Non-active Stakeholder
						</div>

					</div>
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>