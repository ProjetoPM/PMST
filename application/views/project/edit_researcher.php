<body class="hold-transition skin-gray sidebar-mini">
	<script>
		(function() {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('success'); ?></strong>
					</div>
				<?php elseif ($this->session->flashdata('error')) : ?>
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><?php echo $this->session->flashdata('error'); ?></strong>
					</div>
				<?php endif; ?>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">

								Researcher

								<?php extract($user); ?>
								<?php extract($user_project); ?>
								<?php var_dump($user_project); ?>

							</h1>
							<form method="POST" action='<?= base_url("researcher/update/$user_id"); ?>'>
								<input type="hidden" name="status" value="1">
								<input type="hidden" name="project_id" value=<?php $user_project[0]["project_id"] ?>>

								<div class="form-group">
									<label for="email">Member E-mail</label>
									<div>
										<input id="email" name="email" type="text" placeholder="E-mail" class="form-control input-md" value="<?= $user["email"] ?>" disabled="disabled">
									</div>
								</div>
								<!-- Select Basic -->
								<div class="form-group">
									<label for="access_level">Access Level</label>
									<div>
										<select id="access_level" name="access_level" class="form-control">
											<option value="0">Staff</option>
											<option value="1">Professor</option>
											<option value="2">Project Manager</option>
											<option value="3">Admin</option>
										</select>
									</div>
								</div>
						</div>
						<div class="col-lg-12">
							<button id="researcher-submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
								<i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
							</button>
							</form>
							<form action="<?php echo base_url('user/list/'); ?><?php echo $_SESSION['project_id']; ?>">

								<button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
							</form>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-1.11.1.js" type="text/javascript"></script>
<script type="text/javascript">
	function testInput(event) {
		var value = String.fromCharCode(event.which);
		var pattern = new RegExp(/[a-zåäö ]/i);
		return pattern.test(value);
	}
</script>


<?php $this->load->view('frame/footer_view') ?>