<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>CodeIgniter Simple CRUD Tutorial</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">CodeIgniter Simple CRUD Tutorial</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<a href="<?php echo base_url(); ?>index.php/users/addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New User</a>
			<a href="<?php echo base_url(); ?>index.php/users/addnewStore" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  New Store</a>
			<br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name Store</th>
						<th>Address Store</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($store as $str){
						?>
						<tr>
							<td><?php echo $str->idStore; ?></td>
							<td><?php echo $str->nameStore; ?></td>
							<td><?php echo $str->addressStore; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/users/edit/<?php echo $str->idStore; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a> || <a href="<?php echo base_url(); ?>index.php/users/delete/<?php echo $str->idStore; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
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