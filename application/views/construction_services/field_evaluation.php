<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content pad-modal modal-lg ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Professors' observations</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-9 form-group">

                            <?php if ($_SESSION['access_level'] == "1") { ?>
                                <label for="business_strategy">Description </label>
                                <a class="btn-sm btn-default" id="rd_tp_2" data-toggle="tooltip" data-placement="right" title="<?= $this->lang->line('rd_business_strategy_tp') ?>"><i class="glyphicon glyphicon-comment"></i></a>
                                <input id="rd_txt_2" type="text" name="business_strategy" class="form-control input-md" maxlength="200" required="false">
                        </div>
                    <?php } ?>
                    <div class="col-lg-3">
                        <button style="margin-top: 25px;" id="new_bp_submit" type="submit" value="Save" class="btn btn-success ">
                            <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                        </button>
                    </div>
                    </div>


                    <table class="col-lg-12" id="tableEva">
                        <thead>
                            <tr>
                                <th><?= $this->lang->line('ade_activity_name') ?></th>
                                <th style="max-width: 60px;"><?= $this->lang->line('evaluation_professor') ?></th>
                                <th style="max-width: 60px;"><?= $this->lang->line('evaluation_description') ?></th>
                                <th style="max-width: 50px;"><?= $this->lang->line('evaluation_datetime') ?></th>
                                <th style="max-width: 25px;text-align: center;"><?= $this->lang->line('btn-actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- Aparecer todos os comentarios do campo passado (field), filtrando tbm por project_id, view_id, item_id -->
                            <?php
                            foreach ($duration_estimates as $field) {
                            ?>
                                <tr>
                                    <td><?php echo getUserName($field->user_id) ?></td>
                                    <td><?php echo $field->description; ?></td>
                                    <td><?php echo $field->datatime; ?></td>

                                    <td style="max-width: 20px">
                                        <div class="row" style="margin:auto">
                                            <div class="col-sm-3">
                                                <?php if ($_SESSION['access_level'] == "1") { ?>

                                                    <!-- delete -->
                                                    <form action="<?php echo base_url() ?>schedule/duration-estimates/read/<?php echo $a->duration_estimates_id; ?>" method="post">
                                                        <button type="submit" class="btn btn-default"><em class="fa fa-eye"></em><span class="hidden-xs"></span></button>
                                                    </form>

                                                <?php } else { ?>

                                                    <!-- check -->
                                                    <form action="<?php echo base_url() ?>schedule/duration-estimates/read/<?php echo $a->duration_estimates_id; ?>" method="post">
                                                        <button type="submit" class="btn btn-default"><em class="fa fa-eye"></em><span class="hidden-xs"></span></button>
                                                    </form>

                                                <?php } ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>



                    <table class="col-lg-12">
                        <thead>
                            <tr>
                                <th>Professor</th>
                                <th>Description</th>
                                <th>Data/Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bernadino</td>
                                <td>Ajustar nomenclatura dos dados</td>
                                <td>2020-12-12 / 12:19</td>
                                <td><button type="submit" class="btn btn-default"><em class="fa fa-trash"></em><span class="hidden-xs"></span></button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>