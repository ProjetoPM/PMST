<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Gerenciamento das Partes Interessadas</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Gerenciamento das Partes Interessadas</h1>
	<?php extract($stakeholder); ?>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<h3>Editar <?php echo $name?>
				<span class="pull-right"><a href="<?php echo base_url(); ?>index.php/stakeholder" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a></span>
			</h3>
			<hr>
			<form method="POST" action="<?php echo base_url(); ?>index.php/stakeholder/update/<?php echo $stakeholder_id; ?>">
				<div class="form-group">
					<label>ID:</label>
					<input type="text" class="form-control" value="<?php echo $stakeholder_id; ?>" name="stakeholder_id" readonly>
				</div>
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
				</div>
				<div class="form-group">
					<label>Papéis de Responsabilidade:</label>
					<textarea class="form-control" name="roles_responsabilies"><?php echo $roles_responsabilies; ?></textarea>
				</div>
				<div class="form-group">
					<label>Status:</label>
					<?php 
						if($status == 1){
					?>
						<input type="radio" checked name="status">
						<label>On</label>
						<input type="radio" name="status">
						<label>Off</label>

					<?php
						}else{
					?>
						<input type="radio" name="status">
						<label>On</label>
						<input type="radio" checked name="status">
						<label>Off</label>
					<?php
						}
					?>
				</div>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Salvar</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>