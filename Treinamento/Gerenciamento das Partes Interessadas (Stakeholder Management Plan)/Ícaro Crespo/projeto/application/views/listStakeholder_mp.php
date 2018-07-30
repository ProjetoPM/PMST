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
	<div class="row">
	<div class="col-sm-10">
		<a href="<?php echo base_url(); ?>index.php/project/index" class="btn btn-primary"><span class="glyphicon"></span> List Projeto</a>
		<a href="<?php echo base_url(); ?>index.php/stakeholder/index" class="btn btn-primary"><span class="glyphicon"></span> List Stakeholder</a>
		<a href="<?php echo base_url(); ?>index.php/projectCharter/index" class="btn btn-primary"><span class="glyphicon"></span> List Carta de Projeto</a>
		<a href="<?php echo base_url(); ?>index.php/stakeholder_mp/index" class="btn btn-primary"><span class="glyphicon"></span> List Stakeholder_mp</a>
		<a href="<?php echo base_url(); ?>index.php/projectCharter_stakeholder/index" class="btn btn-primary"><span class="glyphicon"></span> List Carta de Projeto Stakeholder</a><br><br>
			<a href="<?php echo base_url(); ?>index.php/stakeholder_mp/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Adicionar Stakeholder-mp</a>
			<h2 class="text-center">Listagem Projeto</h2>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>ID Stakeholder</th>
						<th>Interesse</th>
						<th>Poder</th>
						<th>Influência</th>
						<th>Impacto</th>
						<th>Média</th>
						<th>Engajamento Esperado</th>
						<th>Engajamento Atual</th>
						<th>Estratégia</th>
						<th>Escopo</th>
						<th>Observação</th>
						<th>ID Projeto</th>
						<th>Status</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($stakeholder_mp as $stakeholder_mp){
						?>
						<tr>
							<td><?php echo $stakeholder_mp->stakeholder_mp_id; ?></td>
							<td><?php echo $stakeholder_mp->stakeholder_id; ?></td>
							<td><?php echo $stakeholder_mp->interest; ?></td>
							<td><?php echo $stakeholder_mp->power; ?></td>
							<td><?php echo $stakeholder_mp->influence; ?></td>
							<td><?php echo $stakeholder_mp->impact; ?></td>
							<td><?php echo $stakeholder_mp->average; ?></td>
							<td><?php echo $stakeholder_mp->expectedengagement; ?></td>
							<td><?php echo $stakeholder_mp->currentengagement; ?></td>
							<td><?php echo $stakeholder_mp->strategy; ?></td>
							<td><?php echo $stakeholder_mp->scope; ?></td>
							<td><?php echo $stakeholder_mp->observation; ?></td>
							<td><?php echo $stakeholder_mp->project_id; ?></td>
							<td><?php echo $stakeholder_mp->status; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/stakeholder_mp/edit/<?php echo $stakeholder_mp->stakeholder_mp_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a> || <a href="<?php echo base_url(); ?>index.php/stakeholder_mp/delete/<?php echo $stakeholder_mp->stakeholder_mp_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Deletar</a></td>
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