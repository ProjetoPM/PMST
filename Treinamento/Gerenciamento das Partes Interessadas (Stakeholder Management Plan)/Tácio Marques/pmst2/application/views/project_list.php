<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>View Projects</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color:#DCDCDC;">
<div class="container">
	<h1 class="page-header text-center">View Project</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="<?php echo base_url(); ?>index.php/Project/addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Project</a><br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>GPI</th>
						<th>Description</th>
						<th>Status</th>
						<th>Action</th>          			
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($project as $projec){
						?>
						<tr>   
							<td><?php echo $projec->project_id; ?></td>
							<td><?php echo $projec->title; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/PartesInteressadas/addnew/<?php echo $projec->project_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Gerenciar Partes Interessadas </a></td>
							<td><?php echo $projec->description; ?></td>
							<td><?php echo $projec->status; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/Project/edit/<?php echo $projec->project_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>  <a href="<?php echo base_url(); ?>index.php/Project/delete/<?php echo $projec->project_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
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