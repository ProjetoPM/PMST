  <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
  <?php
  $this->load->view('frame/header_view');
  $this->load->view('frame/topbar');
  $this->load->view('frame/sidebar_nav_view');
  ?>

  <body class="hold-transition skin-gray sidebar-mini">
    <script>
      (function() {
        if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
          var body = document.getElementsByTagName('body')[0];
          body.className = body.className + ' sidebar-collapse';
        }
      })();
    </script>
    <div class="wrapper">
      <div class="content-wrapper">
        <section class="content-header">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title" style="text-align: center;">
                    <strong>Notifications
                      <!-- <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="Definir"><i class="glyphicon glyphicon-comment"></i></a> -->
                    </strong>
                  </h3>
                </div>
              </div>
            </div>
        </section>
        <section class="content" style="padding-top: 1px;">

          <!-- row -->
          <div class="row">
            <div class="col-md-12">
              <div class="panel-body">
                <!-- The time line -->
                <ul class="timeline">
                  <!-- timeline time label -->
                  <?php
                  krsort($log_list);
                  $inicio = true;
                  $date;
                  foreach ($log_list as $l) {
                    if ($inicio || $l->date != $date) {
                      $date = $l->date;
                      $inicio = false; ?>

                      <li class="time-label" align="center">
                        <span class="bg-red">
                          <?php echo $l->date ?>
                        </span>
                      </li>



                    <?php } ?>

                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>

                      <?php
                      if ($l->action_type == 'insert') { ?>
                        <i class=" fa fa-save bg-green"></i>
                      <?php } elseif ($l->action_type  == 'update') { ?>
                        <i class="fa fa-pencil bg-orange"></i>
                      <?php } elseif ($l->action_type == 'delete') { ?>
                        <i class="fa fa-trash bg-red"></i>
                      <?php } elseif ($l->action_type  == 'send message') { ?>
                        <i class="fa fa-comments bg-blue"></i>
                      <?php } elseif ($l->action_type  == 'sign') { ?>
                        <i class="fa fa-check-square bg-green"></i>
                      <?php } elseif ($l->action_type  == 'unsubscribe') { ?>
                        <i class="fa fa-check-square bg-red"></i>
                      <?php } ?>
                     



                      <div class="timeline-item" align="center">
                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo $l->time ?> </span>
                        <h3 class="timeline-header"></i><a href="#"></a>
                          <?php

                          $reItalico = '/-([^&$@#%""]+[^ \t\n\r\f\v])-/';
                          $replacementItalico = '<i>$1</i>';
                          $negrito = '/"([^&@#$%<>]+[^ \t\n\r\f\v])"/';
                          $replacementNegrito = '<b>$1</b>';
                          $l->action = preg_replace(
                            array($negrito, $reItalico),
                            array($replacementNegrito, $replacementItalico),
                            $l->action
                          );

                          echo $l->action ?></h3>
                      </div>
                    </li>

                  <?php } ?>
                </ul>
              </div>
              <!-- /.col -->
            </div>
          </div>


          <!-- /.row -->
        </section>
      </div>
    </div>
  </body>


  <!-- /.content-wrapper -->

  <?php $this->load->view('frame/footer_view') ?>