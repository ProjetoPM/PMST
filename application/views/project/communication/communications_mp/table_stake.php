<style>
	.multiselect-wrapper .multiselect-input {
		width: 65%;
	}
</style>

<?php
$responsabilityByCommunication = [];
foreach ($communication_stakeholder_responsability as $respC) {
	if ($respC->communication_item_id == $communication_item_id) {
		array_push($responsabilityByCommunication, $respC);
	}
}
$responsabilityByValue = [];
foreach ($responsabilityByCommunication as $respV) {
	if ($respV->communication_responsability_id == $communication_responsability_id) {
		array_push($responsabilityByValue, $respV);
	}
}
?>

<!-- COMMUNICATION_ITEM_ID E VALUE -->

<form id="formResp_<?php echo $communication_responsability_id ?>" action="<?php echo base_url() ?>communication/communications-mp/update-responsability" method="post">
	<input type="hidden" name="communication_item_id" value="<?php echo $communication_item_id; ?>">
	<input type="hidden" name="communication_responsability_id" value="<?php echo $communication_responsability_id; ?>">
	<div class="row" style="padding-left: 0px;">
		<div class="col-sm-10 form-group">
			<select  name="responsability[]" id="responsability_id_<?php echo $communication_responsability_id ?>" class="form-control" multiple>
				<?php
				foreach ($stakeholder as $stakeh) {
				?>
					<option value=<?php echo $stakeh->stakeholder_id ?> <?= (is_numeric(array_search($stakeh->stakeholder_id, array_column($responsabilityByValue, 'stakeholder_id')))) ? 'selected' : '' ?>><?php echo $stakeh->name; ?></option>
				<?php
				}
				?>
			</select>
			<button id="submit1"  type="submit" name="submit" value="Submit" class=" btn-save btn btn-primary btn-sm"><?= $this->lang->line('btn-save') ?></button>
		</div>
	</div>
</form>



<script type="text/javascript">
	// $form1.find('input[type=submit]').click();
	// document.getElementById('formResp_<?php echo $communication_responsability_id ?>').addEventListener('change', function() {
	// 	this.form.submit();
	// });
	// function submeter() {
	// 	$('#submit1').click();
	// 	console.log($stakeholder);
	// }
	var form = document.getElementById('formResp_<?php echo $communication_responsability_id ?>');
	form.addEventListener('submit', function(e) {
		e.preventDefault();

		var form_data = $(this).serialize();
		var form_url = $(this).attr("action");
		var form_method = $(this).attr("method").toUpperCase();


		$.ajax({
			url: form_url,
			type: form_method,
			data: form_data,
			cache: false,
			success: function(returnhtml) {
				$responsabilityByValue.html(returnhtml);
				alert("oi");
			}
		});
	});
</script>