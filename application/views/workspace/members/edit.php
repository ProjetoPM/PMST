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
      <section class="content">
        <?php $this->load->view('errors/exceptions') ?>
        
        <div class="row">
          <div class="col-lg-12">
            <div class="panel-body">
              <div class="page-header">
                <h1>
                  Member
                </h1>
              </div>

              <?php extract($user) ?>

                <form method="POST" action="<?= base_url("workspace/member/update/{$user[0]->user_id}"); ?>">
                  <input type="hidden" name="status" value="1">


                  <div class=" col-lg-8 form-group">
                    <label for="business_deals">Nome</label>
                    <div>
                      <input type="text" class="form-control input-md" value = "<?= $user[0]->name; ?>" disabled>
                    </div>
                  </div>

                  <div class=" col-lg-4 form-group">
                      <label for="evaluation">Instituição</label>
                      <div>
                      <input type="text" class="form-control input-md" value = "<?= $user[0]->institution; ?>" disabled>
                      </div>
                  </div>

                  <div class=" col-lg-8 form-group">
                    <label for="situation_analysis">Email<?= $this->lang->line('bc_situation_analysis') ?> </label>
                    <div>
                    <input type="text" class="form-control input-md" value = "<?= $user[0]->email; ?>" disabled>
                    </div>
                  </div>

                  <div class=" col-lg-4 form-group">
                      <label for="recommendation">Nível de Acesso</label>
                      <select name="access_level" class="form-control">
                        <?php foreach($access_levels as $level): ?>
                          <?php if($user[0]->access_level === $level->access_level_id){ ?>
                            <option value="">Selected</option>
                         <?php }else{ ?>
                          <option value="<?= $level->access_level_id ?>"> <?= $level->access_level_name ?>
                          </option>
                         <?php } ?>
                          <?php endforeach ?>
                      </select>
                  </div>

                  <div class="col-lg-12 m-t-20">
                    <button id="new_bc_submit" type="submit" value="Save" class="btn btn-lg btn-success pull-right">
                      <i class="glyphicon glyphicon-ok"></i> <?= $this->lang->line('btn-save') ?>
                    </button>
                </form>

                <form action='<?= base_url("workspace/members/{$_SESSION['workspace_id']}"); ?>'>
                  <button class="btn btn-lg btn-info pull-left"> <i class="glyphicon glyphicon-chevron-left"></i> <?= $this->lang->line('btn-back') ?></button>
                </form>
              
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
<script type="text/javascript">
  for (var i = 1; i <= 4; i++) {
    if (document.getElementById("bc_tp_" + i).title == "") {
      document.getElementById("bc_tp_" + i).hidden = true;
    }
    limite_textarea(document.getElementById("bc_txt_" + i).value, "bc_" + i);
  }

  function limite_textarea(valor, txt) {
    var limite = 2000;
    var caracteresDigitados = valor.length;
    var caracteresRestantes = limite - caracteresDigitados;
    $("." + txt).text(caracteresRestantes);
  }
</script>


<?php $this->load->view('frame/footer_view') ?>