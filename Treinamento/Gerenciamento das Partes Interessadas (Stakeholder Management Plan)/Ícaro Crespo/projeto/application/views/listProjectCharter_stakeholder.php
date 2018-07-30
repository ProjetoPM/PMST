<?php
	include 'header.php';
?>
		<br><br><br>
		<a href="<?php echo base_url(); ?>index.php/projectCharter_stakeholder/add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Adicionar</a>
		<h2 class="text-center">Listagem Carta de Projeto Stakeholder</h2>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID Carta de Projeto</th>
						<th>ID Stakeholder</th>
						<th>Status</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach($projectCharter_stakeholder as $projectCharter_stakeholder){
						?>
						<tr>
							<td><?php echo $projectCharter_stakeholder->project_charter_id; ?></td>
							<td><?php echo $projectCharter_stakeholder->stakeholder_id; ?></td>
							<td><?php echo $projectCharter_stakeholder->status; ?></td>
							<td><center>
								<form method="post" action="<?php echo base_url(); ?>index.php/projectCharter_stakeholder/edit">
									<input type="hidden" name="idPC" value="<?php echo $projectCharter_stakeholder->project_charter_id; ?>">
									<input type="hidden" name="idS" value="<?php echo $projectCharter_stakeholder->stakeholder_id; ?>">
									<input type="submit" class="btn btn-success" value="Editar">
								</form>
								<form method="post" action="<?php echo base_url(); ?>index.php/projectCharter_stakeholder/delete">
									<input type="hidden" name="idPC" value="<?php echo $projectCharter_stakeholder->project_charter_id; ?>">
									<input type="hidden" name="idS" value="<?php echo $projectCharter_stakeholder->stakeholder_id; ?>">
									<input type="submit" class="btn btn-danger" value="Deletar">
								</form>
								</center>
								</td>
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