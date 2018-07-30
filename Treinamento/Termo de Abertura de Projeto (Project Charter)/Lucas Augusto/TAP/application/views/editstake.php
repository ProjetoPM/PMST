<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Registro das Partes Interessadas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Registro das Partes Interessadas</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Editar
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span>
			</h3>
			<hr>
			<?php extract($stake); ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/update/<?php echo $id; ?>">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" class="form-control" value="<?php echo $nome; ?>" name="nome">
				</div>
				<div class="form-group">
					<label>Função:</label>
					<input type="text" class="form-control" value="<?php echo $função; ?>" name="função">
				</div>
				<div class="form-group">
					<label>Status:</label>
					<input type="text" class="form-control" value="<?php echo $status; ?>" name="status">
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Atualizar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>