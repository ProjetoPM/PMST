
<!-- Modal -->
<div class="modal fade" id="scoreDetails<?php $data->weekly_report_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-green">
                <h3 class="modal-title" id="myModalLabel">Score Details</h3>
            </div>

            <table>
                <thead>
                    <tr>
                        <?php $scores = getScorePerReport($data->weekly_report_id)?>
                        <th>Professor</th>
                        <th>Nota</th>
                        <th>Comentários</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($scores as $s): ?>
                        <tr>
                        <th><?= $s->name ?></th>
                        <th><?= $s->grade ?></th>
                        <th><?= $s->comments ?></th>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Fim Modal -->
