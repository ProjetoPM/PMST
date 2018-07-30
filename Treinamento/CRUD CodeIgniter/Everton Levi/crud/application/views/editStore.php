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
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Edit Store
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php extract($sto); ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/store/updateSto/<?php echo $idStore; ?>">
				<div class="form-group">
					<label>Name Store:</label>
					<input type="text" class="form-control" value="<?php echo $nameStore; ?>" name="nameStore">
				</div>
				<div class="form-group">
					<label>Address Store:</label>
					<input type="text" class="form-control" value="<?php echo $addressStore; ?>" name="addressStore">
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>