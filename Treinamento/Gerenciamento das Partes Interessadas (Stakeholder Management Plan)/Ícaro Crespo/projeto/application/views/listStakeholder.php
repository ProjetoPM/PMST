<?php
	include 'header.php';
?>
		<br><br><br>
		<a href="<?php echo base_url(); ?>index.php/stakeholder/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
		<h2 class="text-center">Listagem Stakeholder</h2>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Responsabilidades de Papéis</th>
						<th>Status</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($stakeholder as $stakeholder){
						?>
						<tr>
							<td><?php echo $stakeholder->stakeholder_id; ?></td>
							<td><?php echo $stakeholder->name; ?></td>
							<td><?php echo $stakeholder->roles_responsabilies; ?></td>
							<td><?php echo $stakeholder->status; ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/stakeholder/edit/<?php echo $stakeholder->stakeholder_id; ?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Editar</a> || <a href="<?php echo base_url(); ?>index.php/stakeholder/delete/<?php echo $stakeholder->stakeholder_id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Deletar</a></td>
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