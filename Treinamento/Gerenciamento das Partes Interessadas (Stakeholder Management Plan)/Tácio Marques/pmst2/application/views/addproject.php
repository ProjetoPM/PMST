<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Cadastro de Projeto</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body   style="background-color:#DCDCDC;">
<div class="container">
	<h1 class="page-header text-center">Insert Project</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Add New Project
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/Project/insert">
				<div class="form-group">
					<label>Title:</label>
					<input type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label>Description:</label>
					<input type="text" class="form-control" name="description">
				</div>
				<div class="form-group">
					<label>Status:</label><br>
					<input type="radio" name="status" value="1"/>Aberto<br />
					<input type="radio" name="status" value="0"/>Resolvido<br />
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>