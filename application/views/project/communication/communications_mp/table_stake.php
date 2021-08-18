
<style>
	.multiselect-wrapper .multiselect-input {
		width: 100%;
		padding-right: 1px;
	}

	.multiselect-input-div {
		height: 34px;
		width: 110px;
	}

	.multiselect-count {
		padding: 1px 4px;
	
	}

	.multiselect-wrapper .multiselect-input {
		width: 100%;
		padding-right: 30px;
	}

	.multiselect-input-div input {
		padding: 5px 1px;

	}

	.multiselect-wrapper {
		width: max-content;
		padding-right: 5px;
	}

	@media (min-width: 768px) {
		.col-sm-10 {
			width: 1%;
		}
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


<form id="formResp_<?php echo $communication_responsability_id ?>_<?php echo $communication_item_id; ?>" action="<?php echo base_url() ?>communication/communications-mp/update-responsability" method="post">
	<input type="hidden" name="communication_item_id" value="<?php echo $communication_item_id; ?>">
	<input type="hidden" name="communication_responsability_id" value="<?php echo $communication_responsability_id; ?>">
	<div class="row" style="padding-left: 0px;">
		<div>
			<select name="responsability[]" id="responsability_id_<?php echo $communication_responsability_id ?>_<?php echo $communication_item_id; ?>" class="form-control" multiple>
				<?php
				foreach ($stakeholder as $stakeh) {
				?>
					<option value=<?php echo $stakeh->stakeholder_id ?> <?= (is_numeric(array_search($stakeh->stakeholder_id, array_column($responsabilityByValue, 'stakeholder_id')))) ? 'selected' : '' ?>><?php echo $stakeh->name; ?></option>
				<?php
				}
				?>
			</select>
			<button style="width: 42px;padding: 5px 1px;" id="submit1<?php echo $communication_responsability_id ?>_<?php echo $communication_item_id; ?>" type=" submit" name="submit" value="Submit" class=" btn-save btn btn-primary btn-sm"><?= $this->lang->line('btn-save') ?></button>
		</div>
	</div>
</form>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>

<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css" />


<script type="text/javascript">

	var form = document.getElementById('formResp_<?php echo $communication_responsability_id ?>_<?php echo $communication_item_id; ?>');
	form.addEventListener('submit', function(e) {
		e.preventDefault();

		var form_data = $(this).serialize();
		var form_url = $(this).attr("action");
		var form_method = $(this).attr("method").toUpperCase();
		// alert(form_data);
		// alert(form_url);
		// alert(form_method);


		$.ajax({
			url: form_url,
			type: form_method,
			data: form_data,
			cache: false,
			success: function(returnhtml) {
				// $responsabilityByValue.html(returnhtml);
				alertify.success('item saved successfully');
			}

		});

	});
</script>

