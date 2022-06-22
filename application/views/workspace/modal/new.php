<!-- Modal -->
<div class="modal fade" id="newWorkspace" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-green">
        <h3 class="modal-title" id="myModalLabel">
          <?= $this->lang->line('ws_new_workspace') ?>
        </h3>
      </div>
      <form method="POST" action="<?= base_url("workspace/insert/") ?>">
        <div class="modal-body">
          <div class="form-group">
            <div class="col-md-12">
              <label><?= $this->lang->line('ws_name') ?></label>
              <span id="count-a"></span>
              <span class="btn-sm btn-default" id="wr_tp_1" data-toggle="tooltip" data-placement="top" title="<?= $this->lang->line('wr_tool_evaluation_tp') ?>">
                <i class="glyphicon glyphicon-comment"></i>
              </span>
              <textarea name="workspace_name" oninput="limitText(this, 35, 'a')" class="form-control" rows="1" required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 m-t-15">
            <div class="form-group">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('btn-cancel') ?></button>
              <button class="btn btn-success" type="submit"><?= $this->lang->line('btn-save') ?></button>
            </div>
          </div> 
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- Fim Modal -->