<?php
	include 'header.php';
?>
		<br><br><br>
		<a href="<?php echo base_url(); ?>index.php/project/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
		<h2 class="text-center">Listagem Projeto</h2>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th><center>ID</center></th>
					<th><center>Título</center></th>
					<th><center>Descrição</center></th>
					<th><center>Status </center></th>
					<th><center>Ação</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach($project as $project){
				?>
				<tr>
					<td><?php echo $project->project_id; ?></td>
					<td><?php echo $project->title; ?></td>
					<td><?php echo $project->description; ?></td>
					<td><center><?php echo $project->status; ?></center></td>
					<td><a href="<?php echo base_url(); ?>index.php/project/edit/<?php echo $project->project_id;?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a> || <a href="<?php echo base_url(); ?>index.php/project/delete/<?php echo $project->project_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Deletar</a></td>
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