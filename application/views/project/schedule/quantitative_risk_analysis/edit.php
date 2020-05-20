<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> <?= $this->lang->line('agregate_value_edit-title') ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong><?php echo $this->session->flashdata('success'); ?></strong>
		</div>
	<?php elseif ($this->session->flashdata('error')) : ?>
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong><?php echo $this->session->flashdata('error'); ?></strong>
		</div>
	<?php endif; ?>



	<script type="text/javascript">
		function durationTriangular() {
			document.getElementById('duration_triangular').value = 0
			var p = document.getElementById('duration_pessimistic').value;
			var mp = document.getElementById('duration_probable').value;
			var o = document.getElementById('duration_otimistic').value;
			var d = (parseFloat(p) + (parseFloat(mp)) + parseFloat(o)) / 3;
			document.getElementById('duration_triangular').value = d.toFixed(2);
		}

		function costTriangular() {
			document.getElementById('cost_triangular').value = 0
			var pc = document.getElementById('cost_pessimistic').value;
			var mpc = document.getElementById('cost_probable').value;
			var oc = document.getElementById('cost_otimistic').value;
			var c = (parseFloat(pc) + (parseFloat(mpc)) + parseFloat(oc)) / 3;
			document.getElementById('cost_triangular').value = c.toFixed(2);
		}

		function durationBeta() {
			document.getElementById('duration_beta').value = 0
			var p = document.getElementById('duration_pessimistic').value;
			var mp = document.getElementById('duration_probable').value;
			var o = document.getElementById('duration_otimistic').value;
			var d = (parseFloat(p) + (parseFloat(mp) * 4) + parseFloat(o)) / 6;
			document.getElementById('duration_beta').value = d.toFixed(2);
		}

		function costBeta() {
			document.getElementById('cost_beta').value = 0
			var pc = document.getElementById('cost_pessimistic').value;
			var mpc = document.getElementById('cost_probable').value;
			var oc = document.getElementById('cost_otimistic').value;
			var c = (parseFloat(pc) + (parseFloat(mpc) * 4) + parseFloat(oc)) / 6;
			document.getElementById('cost_beta').value = c.toFixed(2);
		}
	</script>


	<?php extract($activity); ?>

	<div class="row">
		<div class="col-lg-12">
			<form action="<?= base_url() ?>Activity/updateQuantitative/<?php echo $id; ?>" method="post">

				<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
				<!-- Textarea -->
				<ul class="abas">
					<!-- Aqui, criação da primeira aba -->

					<div class="col-lg-12 form-group">
						<label for="name"><?= $this->lang->line('activity_name') ?></label>
						<div>
							<input id="name_text" name="name" type="text" class="form-control input-md" required="false" value="<?php echo $activity_name; ?>" disabled>
						</div>
					</div>



					<div class=" col-lg-4 form-group">
						<label for="duration_pessimistic"><?= $this->lang->line('duration_pessimistic') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('duration_pessimistic-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="duration_pessimistic" name="duration_pessimistic" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="durationTriangular(), durationBeta()" value="<?php echo $duration_pessimistic; ?>" onchange="variation()">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="duration_probable"><?= $this->lang->line('duration_probable') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('duration_probable-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="duration_probable" name="duration_probable" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="durationTriangular(), durationBeta()" value="<?php echo $duration_probable; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="duration_otimistic"><?= $this->lang->line('duration_otimistic') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('duration_otimistic-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="duration_otimistic" name="duration_otimistic" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="durationTriangular(), durationBeta()" value="<?php echo $duration_otimistic; ?>">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="duration_beta"><?= $this->lang->line('duration_beta') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('duration_beta-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="duration_beta" name="duration_beta" onchange="durationBeta()" onchange="durationTriangular()" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" readonly=“true” value="<?php echo $duration_beta; ?>">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="duration_triangular"><?= $this->lang->line('duration_triangular') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('duration_triangular-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="duration_triangular" name="duration_triangular" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" readonly=“true” value="<?php echo $duration_triangular; ?>">
						</div>
					</div>

					<br>

					<div class=" col-lg-4 form-group">
						<label for="cost_pessimistic"><?= $this->lang->line('cost_pessimistic') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cost_pessimistic-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cost_pessimistic" name="cost_pessimistic" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="costTriangular(), costBeta()" value="<?php echo $cost_pessimistic; ?>" onchange="variation()">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="cost_probable"><?= $this->lang->line('cost_probable') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cost_probable-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cost_probable" name="cost_probable" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="costTriangular(), costBeta()" value="<?php echo $cost_probable; ?>">
						</div>
					</div>

					<div class=" col-lg-4 form-group">
						<label for="cost_otimistic"><?= $this->lang->line('cost_otimistic') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cost_otimistic-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cost_otimistic" name="cost_otimistic" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" onchange="costTriangular(), costBeta()" value="<?php echo $cost_otimistic; ?>">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="cost_beta"><?= $this->lang->line('cost_beta') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cost_beta-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cost_beta" name="cost_beta" onchange="costBeta()" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" readonly=“true” value="<?php echo $cost_beta; ?>">
						</div>
					</div>

					<div class=" col-lg-6 form-group">
						<label for="cost_triangular"><?= $this->lang->line('cost_triangular') ?></label>
						<a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('cost_triangular-tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
						<div>
							<input id="cost_triangular" name="cost_triangular" type="number" min="0.00" max="10000.00" step="0.01" class="form-control input-md" readonly=“true” value="<?php echo $cost_triangular; ?>">
						</div>
					</div>


					<div class="col-lg-12">
						<button id="activity-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
							<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
						</button>
			</form>

			<form action="<?php echo base_url('Activity/listQuantitative/'); ?><?php echo $project_id; ?>">
				<button onclick="costBeta()" onclick="costTriangular()" onclick="durationBeta()" onclick="durationTriangular()" class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
			</form>
		</div>
	</div>
</div>

<?php $this->load->view('frame/footer_view') ?>