<!-- Modal -->
<div class="modal fade" id="inviteUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-green">
                <h3 class="modal-title" id="myModalLabel">Novo usuário</h3>
            </div>
            <form method="POST" action="<?= base_url("workspace/invite") ?>">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group col-md-8">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="text" name="sendTo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="access_level">Nível de Acesso</label>
                            <input class="form-control" name="access_level" type="number" min="0" max="2">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group col-md-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('btn-cancel') ?></button>
                        <button class="btn btn-success" type="submit"><?= $this->lang->line('btn-save') ?></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Fim Modal -->