<form action="<?= base_url('workspace/invite-users') ?>" method="post" id="modal-new-users">
    <div 
        class="modal" 
        id="invite-users" 
        tabindex="-1" 
        role="dialog"
    >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><?= $this->lang->line('ws_add_list_of_users') ?></h3>
                </div>
                <div class="modal-body">
                    <label class="m-b-10">
                        <?= $this->lang->line('ws_new_users') ?>
                    </label>
                    <textarea 
                        oninput="limitText(this, 5000, 'a')" 
                        placeholder="<?= $this->lang->line('ws_placeholder_example') ?>" 
                        class="form-control"
                        name="new_users"
                        rows="4"
                        required></textarea>
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
