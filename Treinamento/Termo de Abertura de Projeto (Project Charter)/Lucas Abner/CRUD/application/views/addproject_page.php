<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>PMBOK Manager - Add New Project</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center"> Add New Project</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Insert Project Details
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			
			<form method="POST" action="<?php echo base_url(); ?>index.php/project/createProject">
				<div class="form-group">
					<label>Project Title:</label>
					<input type="text" class="form-control" value="" name="projectTitle" required="">
				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" class="form-control" value="" name="projectDesc" required="">
				</div>
				<div class="form-group">
					<label>Status:</label>
					<select class="form-control" name="projectStatus" required="">
						<option value="">Select a status</option>
						<option value="0">In progress</option>
						<option value="1">Disabled</option>
					</select>
				</div>
				<h2 class="page-header text-center">TAP</h2>
				<div class="form-group">
					<label>Scope:</label>
					<input type="text" class="form-control" value="" name="scope" required="">
				</div>
				<div class="form-group">
					<label>Objective:</label>
					<input type="text" class="form-control" value="" name="objective" required="">
				</div>
				<div class="form-group">
					<label>Sucess Criteria:</label>
					<input type="text" class="form-control" value="" name="sucess" required="">
				</div>
				<div class="form-group">
					<label>Requirements:</label>
					<input type="text" class="form-control" value="" name="require" required="">
				</div>
				<div class="form-group">
					<label>Assumptions:</label>
					<input type="text" class="form-control" value="" name="assumptions" required="">
				</div>
				<div class="form-group">
					<label>Risks:</label>
					<input type="text" class="form-control" value="" name="risks" required="">
				</div>
				<div class="form-group">
					<label>Milestone:</label>
					<input type="text" class="form-control" value="" name="milestone" required="">
				</div>
				<div class="form-group">
					<label>Start Date:</label>
					<input type="text" class="form-control" value="" name="startDate" required="">
				</div>
				<div class="form-group">
					<label>End Date:</label>
					<input type="text" class="form-control" value="" name="endDate" required="">
				</div>
				<div class="form-group">
					<label>Budge:</label>
					<input type="text" class="form-control" value="" name="budge" required="">
				</div>
				<div class="form-group">
					<label>Responsible Stakeholder:</label>
					<input type="text" class="form-control" value="" name="stakeCharter" required="">
				</div>
				<div class="form-group">
					<label>Approval Requirements:</label>
					<input type="text" class="form-control" value="" name="approval" required="">
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Submit</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>