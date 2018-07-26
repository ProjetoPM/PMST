<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Stakeholder List</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Stakeholder List</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="<?php echo base_url(); ?>index.php/stakeholder/addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Stakeholder</a><br><br>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($stakelholder as $stakeholder){
						?>
						<tr>
							<td><?php echo $stakeholder->stakelholder_id; ?></td>
							<td><?php echo $stakeholder->name; ?></td>
							<td><?php echo $stakeholder->status; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/stakeholder/edit/<?php echo $stakeholder->stakelholder_id ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a>  <a href="<?php echo base_url(); ?>index.php/stakeholder/delete/<?php echo $stakeholder->stakelholder_id ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
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