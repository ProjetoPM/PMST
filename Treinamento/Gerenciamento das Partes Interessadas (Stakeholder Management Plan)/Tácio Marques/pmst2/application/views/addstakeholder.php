<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Cadastro de Stakelholder</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body   style="background-color:#DCDCDC;">
<div class="container">
	<h1 class="page-header text-center">Insert Stakelholder</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Add New Stakelholder
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/Stakelholder/insert <?php echo $id; ?>">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label>Roles Responsabilies:</label>
					<input type="text" class="form-control" name="roles_responsabilies">
				</div>
				<div class="form-group">
					<label>Status:</label><br>
					<input type="radio" name="status" value="1"/>Aberto<br />
					<input type="radio" name="status" value="0"/>Fechado<br />
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>