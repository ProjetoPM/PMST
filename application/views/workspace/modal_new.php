<!-- Modal -->
<div class="modal fade" id="newWorkspace" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-green">
        <h4 class="modal-title" id="myModalLabel"><?= $this->lang->line('ws_new_worskpace') ?></h4>
      </div>
      <form method="POST" action="<?= base_url("workspace/insert/") ?>">
        <div class="modal-body">
          <label><?= $this->lang->line('ws_name') ?></label>
          <input type="text" name="workspace">
          <label for=""><?= $this->lang->line('ws_status') ?></label>
          <select name="status" id="">
            <option value="1"><?= $this->lang->line('ws_active_status') ?></option>
            <option value="0"><?= $this->lang->line('ws_inactive_status') ?></option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('btn-cancel') ?></button>
          <button class="btn btn-success" type="submit"><?= $this->lang->line('btn-save') ?></button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Fim Modal -->