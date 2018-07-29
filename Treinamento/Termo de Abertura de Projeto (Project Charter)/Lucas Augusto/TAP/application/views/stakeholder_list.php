<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Gerenciador de Projetos</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Gerenciador de Projetos</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			 <a href="<?php echo base_url(); ?>index.php/tap/addtap" class="btn btn-primary"><span class ="glyphicon glyphicon-plus"></span> Novo Termo de Abertura do Projeto </a>
			 <a href="<?php echo base_url(); ?>index.php/tap/showtap" class="btn btn-primary"> Visualizar Termo de Abertura de Projeto</a>
			<a href="<?php echo base_url(); ?>index.php/stakeholder/addstake" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Novo Stakeholder</a><br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Função</th>
						<th>Status</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($stakelholder as $cont){
						?>
						<tr>
							<td><?php echo $cont->stakelholder_id; ?></td>
							<td><?php echo $cont->name; ?></td>
							<td><?php echo $cont->roles_responsabilies; ?></td>
							<td><?php echo $cont->status; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/stakeholder/edit/<?php echo $cont->stakelholder_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a> || <a href="<?php echo base_url(); ?>index.php/stakeholder/delete/<?php echo $cont->stakelholder_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
		</div>
	</div>
</div>
</body>
</html>