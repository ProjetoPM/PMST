<body class="hold-transition skin-gray sidebar-mini">
	<script>
		(function() {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>
	<div class="card">
		<div class="text-center card-head">
			<section class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel-body">
							<h1 class="page-header">
								<?= $this->lang->line('overleaf_title')  ?>
							</h1>
							<div class="card body">
								<div class="row">
									<div class="col-lg-12">
										<div class="text-center">
											
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_integration" value="Integration" name="step">
												<label class="form-check-label" for="check_integration"><?= $this->lang->line('overleaf_integration') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_scope" value="Scope" name="step">
												<label class="form-check-label" for="check_scope"><?= $this->lang->line('overleaf_scope') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_schedule" value="Schedule" name="step">
												<label class="form-check-label" for="check_schedule"><?= $this->lang->line('overleaf_schedule') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_cost" value="Cost" name="step">
												<label class="form-check-label" for="check_cost"><?= $this->lang->line('overleaf_cost') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_quality" value="Quality" name="step">
												<label class="form-check-label" for="check_quality"><?= $this->lang->line('overleaf_quality') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_communication" value="Communication" name="step">
												<label class="form-check-label" for="check_communication"><?= $this->lang->line('overleaf_communication') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_risk" value="Risk" name="step">
												<label class="form-check-label" for="check_risk"><?= $this->lang->line('overleaf_risk') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_procurement" value="Procurement" name="step">
												<label class="form-check-label" for="check_procurement"><?= $this->lang->line('overleaf_procurement') ?></label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" id="check_stakeholder" value="Stakeholder" name="step">
												<label class="form-check-label" for="check_stakeholder"><?= $this->lang->line('overleaf_stakeholder') ?></label>
											</div>
											<br>
											<br>
											<form action="https://www.overleaf.com/docs" method="post" target="_blank">
												<textarea rows="20" class="form-control" name="snip" id="latex"></textarea>
												<br>
												<button type="submit" class="btn btn-success opt">New Project in Overleaf <i class="far fa-plus-square"></i></button>
											</form>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</body>
<script>
function getCheckboxValue(){
	var l = new Array(9);
	l.push(document.querySelectorById("check_integration"));
	l.push(document.querySelectorById("check_scope"));
	l.push(document.querySelectorById("check_schedule"));
	l.push(document.querySelectorById("check_cost"));
	l.push(document.querySelectorById("check_quality"));
	l.push(document.querySelectorById("check_communication"));
	l.push(document.querySelectorById("check_risk"));
	l.push(document.querySelectorById("check_procurement"));
	l.push(document.querySelectorById("check_stakeholder"));
}

var answer = "";

for(var j = 0; j <= 9; j++){
	if(l[j].checked == true){
		answer += l[j] + " ";
	}
}

// console.log(answer);
</script>
<?php $this->load->view('frame/footer_view') ?>