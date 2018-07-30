<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Welcome to PMBOOK Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
	<h1 class="page-header text-center"> WEB PMBOOK</h1>
<div class="container">
	<h1 class="page-header text-center">Project List</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="<?php echo base_url(); ?>index.php/project/addproject" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Project</a>
			<br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action's</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($project as $pro) { ?>
						<tr>
							<td><?php echo $pro->title; ?></td>
							<td><?php echo $pro->description; ?></td>
							<td><?php if ($pro->status == 0) {
								echo "In Progress";
							} else {
								echo "Disabled";
							} ?></td>
							<td><a href="<?php base_url(); ?>index.php/project/editProject/<?php echo $pro->project_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>
								&nbsp;<a href="<?php echo base_url(); ?>index.php/project/deleteProject/<?php echo $pro->project_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php if ($pro->status == 0){
									echo '&nbsp;<a href="' . base_url() .'index.php/project/openProject/'. $pro->project_id .' " class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span> Open Project</a>';
								} ?>								
							</td>
						</tr> <?php } ?>					
				</tbody>
			</table> 
		</div>
	</div>
</div>

<!-- Tabela stakeholders-->
<div class="container">
	<h1 class="page-header text-center">Stakeholder List</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="<?php echo base_url(); ?>index.php/stakeholder/addstakeholder" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Stakeholder</a>
			<br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Role</th>
						<th>Status</th>
						<th>Action's</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($stakeholder as $st) { ?>
						<tr>
							<td><?php echo $st->name; ?></td>
							<td><?php echo $st->roles_responsabilies; ?></td>
							<td><?php if ($st->status == 0) {
								echo "Active";
							} else {
								echo "Inactive";
							} ?></td>
							<td><a href="<?php base_url(); ?>index.php/stakeholder/editStakeholder/<?php echo $st->stakelholder_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>&nbsp;<a href="<?php echo base_url(); ?>index.php/stakeholder/deleteStakeholder/<?php echo $st->stakelholder_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
						</tr> <?php } ?>
				</tbody>
			</table> 
		</div>
	</div>
</div>
</body>
</html>