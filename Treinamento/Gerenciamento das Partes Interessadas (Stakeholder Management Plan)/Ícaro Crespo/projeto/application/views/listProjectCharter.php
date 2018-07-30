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
	<div class="col-sm-12">
		<a href="<?php echo base_url(); ?>index.php/project/index" class="btn btn-primary"><span class="glyphicon"></span> List Projeto</a>
		<a href="<?php echo base_url(); ?>index.php/stakeholder/index" class="btn btn-primary"><span class="glyphicon"></span> List Stakeholder</a>
		<a href="<?php echo base_url(); ?>index.php/projectCharter/index" class="btn btn-primary"><span class="glyphicon"></span> List Carta de Projeto</a>
		<a href="<?php echo base_url(); ?>index.php/stakeholder_mp/index" class="btn btn-primary"><span class="glyphicon"></span> List Stakeholder_mp</a>
		<a href="<?php echo base_url(); ?>index.php/projectCharter_stakeholder/index" class="btn btn-primary"><span class="glyphicon"></span> List Carta de Projeto Stakeholder</a>
		<br><br><br>
			<a href="<?php echo base_url(); ?>index.php/projectCharter/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Adicionar Carta de Projeto</a>
			<h2 class="text-center">Listagem Carta de Projeto</h2>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Escopo</th>
						<th>Objetivo</th>
						<th>Sucesso</th>
						<th>Requisitos</th>
						<th>Premissas</th>
						<th>Limitações</th>
						<th>Riscos</th>
						<th>Marco</th>
						<th>Despesa</th>
						<th>Stakeholder</th>
						<th>Requisitos Aprovados</th>
						<th>Início</th>
						<th>Término</th>
						<th>ID do Projeto</th>
						<th>Status</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($projectCharter as $projectCharter){
						?>
						<tr>
							<td><?php echo $projectCharter->project_charter_id; ?></td>
							<td><?php echo $projectCharter->scope; ?></td>
							<td><?php echo $projectCharter->objective; ?></td>
							<td><?php echo $projectCharter->success; ?></td>
							<td><?php echo $projectCharter->requirements; ?></td>
							<td><?php echo $projectCharter->assumptions; ?></td>
							<td><?php echo $projectCharter->constraints; ?></td>
							<td><?php echo $projectCharter->risks; ?></td>
							<td><?php echo $projectCharter->milestone; ?></td>
							<td><?php echo $projectCharter->budge; ?></td>
							<td><?php echo $projectCharter->stakeholder; ?></td>
							<td><?php echo $projectCharter->aprovalReq; ?></td>
							<td><?php echo $projectCharter->start_date; ?></td>
							<td><?php echo $projectCharter->end_date; ?></td>
							<td><?php echo $projectCharter->project_id; ?></td>
							<td><?php echo $projectCharter->status; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/projectCharter/edit/<?php echo $projectCharter->project_charter_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a> || <a href="<?php echo base_url(); ?>index.php/projectCharter/delete/<?php echo $projectCharter->project_charter_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Deletar</a></td>
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