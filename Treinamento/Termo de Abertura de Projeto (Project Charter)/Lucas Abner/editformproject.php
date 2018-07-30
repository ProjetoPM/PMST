<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Edit Projetc</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Edit Project</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Edit Form
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php extract($project); ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/project/updateProject/<?php echo $project_id; ?>">
				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" value="<?php echo $title; ?>" name="title">
				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" class="form-control" value="<?php echo $description; ?>" name="description">
				</div>
				<div class="form-group">
					<label>Status:</label>
					<select class="form-control" name="projectStatus">
						<option value="">Select a status</option>
						<option value="0">In progress</option>
						<option value="1">Disabled</option>
					</select>
				</div>
				<h2 class="page-header text-center">TAP</h2>
				<div class="form-group">
					<label>Scope:</label>
					<input type="text" class="form-control" value="<?php echo $scope; ?>" name="scope">
				</div>
				<div class="form-group">
					<label>Objective:</label>
					<input type="text" class="form-control" value="<?php echo $objective; ?>" name="objective">
				</div>
				<div class="form-group">
					<label>Sucess Criteria:</label>
					<input type="text" class="form-control" value="<?php echo $sucess; ?>" name="sucess">
				</div>
				<div class="form-group">
					<label>Requirements:</label>
					<input type="text" class="form-control" value="<?php echo $requirements; ?>" name="require">
				</div>
				<div class="form-group">
					<label>Assumptions:</label>
					<input type="text" class="form-control" value="<?php echo $assumptions; ?>" name="assumptions">
				</div>
				<div class="form-group">
					<label>Risks:</label>
					<input type="text" class="form-control" value="<?php echo $risks; ?>" name="risks">
				</div>
				<div class="form-group">
					<label>Milestone:</label>
					<input type="text" class="form-control" value="<?php echo $milestone; ?>" name="milestone">
				</div>
				<div class="form-group">
					<label>Start Date:</label>
					<input type="text" class="form-control" value="<?php echo $start_date; ?>" name="startDate">
				</div>
				<div class="form-group">
					<label>End Date:</label>
					<input type="text" class="form-control" value="<?php echo $end_date; ?>" name="endDate">
				</div>
				<div class="form-group">
					<label>Budge:</label>
					<input type="text" class="form-control" value="<?php echo $budge; ?>" name="budge">
				</div>
				<div class="form-group">
					<label>Responsible Stakeholder:</label>
					<input type="text" class="form-control" value="<?php echo $stakeholder; ?>" name="stakeCharter">
				</div>
				<div class="form-group">
					<label>Approval Requirements:</label>
					<input type="text" class="form-control" value="<?php echo $aprovalReq; ?>" name="approval">
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>