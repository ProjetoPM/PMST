<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Edição de Stakelholder</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body  style="background-color:#DCDCDC;">
<div class="container">
	<h1 class="page-header text-center">Edição de Stakelholder</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Edit Stakelholder
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php extract($stakelholder); ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/Stakelholder/update/<?php echo $stakelholder_id; ?>">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
				</div>
				<div class="form-group">
					<label>Roles Resbonsabilies:</label>
					<input type="text" class="form-control" value="<?php echo $roles_responsabilies; ?>" name="roles_responsabilies">
				</div>
				<div class="form-group">
					<label>Status:</label>
					<input type="radio" class="form-control" value="<?php echo $status; ?>" name="status" />Aberto<br />
					<input type="radio" class="form-control" value="<?php echo $status; ?>" name="status" />Fechado<br />
					
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>