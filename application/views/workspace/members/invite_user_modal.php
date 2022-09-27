<form action="<?= base_url("workspace/invite") ?>" method="post" id="modal-new-user">
    <div 
        class="modal" 
        id="invite-user" 
        tabindex="-1" 
        role="dialog"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><?= $this->lang->line('ws_add_new_user') ?></h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input placeholder="email@example.com" class="form-control" type="email" name="sendTo" required>
                    </div>
                    <div class="form-group">
                        <label for=""><?= $this->lang->line('access_level') ?></label>
                        <select name="access_level" class="form-control">
                            <option value="0"><?= getAcesslevelNameByAcessLevelId(0) ?></option>
                            <option value="1"><?= getAcesslevelNameByAcessLevelId(1) ?></option>
                            <option value="2"><?= getAcesslevelNameByAcessLevelId(2) ?></option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        <?= $this->lang->line('btn-close') ?>
                    </button>
                    <button type="submit" class="btn btn-success">
                        <?= $this->lang->line('btn-send') ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
