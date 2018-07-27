<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Project List</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Project List</h1>
	<span class="pull-left"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span><br></br>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Project Scope</th>
						<th>Project Objectives</th>
						<th>Sucess Criteria</th>
						<th>Requirements</th>
						<th>Assumptions</th>
						<th>Project Constraints</th>
						<th>Project Risks</th>
						<th>Sumary Milestone Schedule</th>
						<th>Sumary Budget</th>
						<th>Project Approval Requirements</th>
						<th>Stakeholder List</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($project_charter as $project){
						?>
						<tr>
							<td><?php echo $project->project_charter_id; ?></td>
							<td><?php echo $project->scope; ?></td>
							<td><?php echo $project->objective; ?></td>
							<td><?php echo $project->sucess; ?></td>
							<td><?php echo $project->requirements; ?></td>
							<td><?php echo $project->assumptions; ?></td>
							<td><?php echo $project->constraints; ?></td>
							<td><?php echo $project->risks; ?></td>
							<td><?php echo $project->milestone; ?></td>
							<td><?php echo $project->budge; ?></td>
							<td><?php echo $project->aprovalReq; ?></td>
							<td><?php echo $project->stakeholder; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/stakeholder/editproject/<?php echo $project->project_charter_id ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>  <a href="<?php echo base_url(); ?>index.php/stakeholder/deleteproject/<?php echo $project->project_charter_id ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>

						
		</div>
	</div>
</div>
</body>
</html>