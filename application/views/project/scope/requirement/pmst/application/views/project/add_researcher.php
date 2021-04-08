  <!--
<div id="page-wrapper">
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header">Add Members to:  $project[0]->title ?></h1>
      </div>
      
   </div>
  /.row -->

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
              <?php if ($this->session->flashdata('success')) : ?>
                 <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                 </div>
              <?php elseif ($this->session->flashdata('error')) : ?>
                 <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><?php echo $this->session->flashdata('error'); ?></strong>
                 </div>
              <?php endif; ?>
              <div class="row">
                 <div class="col-lg-12">

                    <div class="panel-body">
                       <h1 class="page-header">

                          Add Members to: <?= $project[0]->title ?></h1>

                       </h1>
                       <form action="<?= base_url() ?>project/add_researcher/" method="post">
                          <input id="project_id" name="project_id" type="hidden" placeholder="ID" class="form-control input-md" value="<?= $project[0]->project_id; ?>" required="true" readonly>
                          <!-- Text input-->
                          <div class="form-group">
                             <label for="email">Member E-mail</label>
                             <div>
                                <input id="email" name="email" type="text" placeholder="E-mail" class="form-control input-md" value="" required="true">
                             </div>
                          </div>
                          <!-- Select Basic -->
                          <div class="form-group">
                             <label for="access_level">Access Level</label>
                             <div>
                                <select id="access_level" name="access_level" class="form-control">
                                   <option value="0">Staff</option>
                                   <option value="1">Professor</option>
                                   <option value="2">Project Manager</option>
                                </select>
                             </div>
                          </div>
                          <input id="add_researcher_submit" type="submit" value="Add Member" class="btn btn-lg btn-success btn-block">
                       </form>
                    </div>
                 </div>
              </div>
           </section>
        </div>
     </div>
  </body>
  <?php $this->load->view('frame/footer_view') ?>