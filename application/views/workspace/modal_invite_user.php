<!-- Modal -->
<div class="modal fade" id="inviteUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-green">
                <h4 class="modal-title" id="myModalLabel"><?= $this->lang->line('ws_new_worskpace') ?></h4>
            </div>
            <form method="POST" action="<?= base_url("workspace/invite") ?>">
                <div class="modal-body">
                    <label for="email">email</label>
                    <input type="text" name="sendTo">
                    <label for="access_level">Nível de Acesso</label>
                    <input type="number" name="access_level">
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