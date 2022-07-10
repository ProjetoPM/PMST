<div class="col-md-12 m-b-15">
    <div class="process-title">
        <?= $this->lang->line('wr_process') ?> #${++number}
    </div>
    <div class="around col-md-12">
        <div class="form-group col-md-6">
            <label for="add[${room}][process_group]">
                <?= $this->lang->line("wr_process_group") ?>
            </label>
            <select 
                name="add[${room}][process_group]" 
                class="form-control" 
                id="add[${room}][process_group]" 
                oninput="getProcessesName('${room}', <?= strcmp($this->uri->segment(2), 'edit') === 0 ? 'true' : 'false' ?>, <?= strcmp($this->uri->segment(2), 'edit') === 0 ? 'false' : 'true' ?>, <?= strcmp($this->uri->segment(2), 'new') === 0 ? 'true' : 'false' ?>)" 
                required
            >
                <option selected disabled value="">
                    <?= $this->lang->line('wr_select_process_group') ?>
                </option>
                <?php foreach($pmbok_processes as $process): ?>
                    <option value="<?=$process->pmbok_group_id?>">
                        <?=$process->group_name?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="add[${room}][process_name]">
                <?= $this->lang->line("wr_process_name") ?>
            </label>
            <select 
                name="add[${room}][process_name]" 
                class="form-control" 
                id="add[${room}][process_name]" 
                required
            >
                <option selected disabled value="">
                    <?= $this->lang->line('wr_process_group_first') ?>
                </option>
            </select>
        </div>
        <div class="form-group col-md-10">
            <label for="add[${room}][process_description]">
                <?= $this->lang->line("wr_process_description") ?>*&nbsp;
            </label>
            <span id="count-${room}"></span>
            <textarea 
                oninput="limitText(this,2e3,'${room}')" 
                class="form-control" 
                name="add[${room}][process_description]" 
                id="add[${room}][process_description]" 
                required
            ></textarea>
        </div>
        <div class="form-group col-md-2">
            <label for=""><?= $this->lang->line("wr_actions") ?></label>
            <br>
            <span class="file-upload">
                <input 
                    class="file-upload__input-${room}" 
                    style="display: none;" 
                    type="file" 
                    name="files[${room}][]" 
                    id="files-${room}" 
                    multiple
                >
                <button 
                    onclick="openFileButton(${room}, this, '<?= $this->lang->line('wr_no_file_selected') ?>')"
                    class="btn btn-default file-upload__button-${room} m-b-5 m-r-7" 
                    data-toggle="toggle" 
                    title="Upload files" 
                    type="button"
                >
                    <i class="fa fa-upload"></i>
                </button>
                <button 
                    onclick="remove('${room}')" 
                    data-toggle="toggle" 
                    title="Upload files" 
                    type="button" 
                    class="btn btn-danger m-b-5 m-r-7"
                >
                    <i class="fa fa-trash"></i>
                </button>
            </span>
        </div>
        <div class="f-u__label col-md-12 form-group">
            <label><?= $this->lang->line("wr_upload_files") ?></label>
            <div>
                <span class="badge-file file-upload__label-${room}">
                    <?= $this->lang->line("wr_no_file_selected") ?>
                </span>
            </div>
        </div>
    </div>
</div>