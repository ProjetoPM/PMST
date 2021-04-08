 <!--
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Update Projects</h1>
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
                 Edit Project
                 <!-- <?= $this->lang->line('tap-title')  ?> -->

               </h1>


               <form action="<?= base_url() ?>project/saveUpdate/" method="post">


                 <input id="project_id" name="project_id" type="hidden" placeholder="Title" class="form-control input-md" value="<?= $project[0]->project_id; ?>" required="true" readonly>



                 <!-- Text input-->
                 <div class="form-group">
                   <label for="title">Title</label>
                   <div>
                     <input id="title" name="title" type="text" placeholder="Title" class="form-control input-md" value="<?= $project[0]->title; ?>" required="true">

                   </div>
                 </div>

                 <!-- Textarea -->
                 <div class="form-group">
                   <label for="description">Description</label>
                   <div>
                     <input id="description" name="description" type="text" placeholder="Description" class="form-control input-md" value="<?= $project[0]->description; ?>" required="true">
                   </div>
                 </div>

                 <!-- Textarea -->
                 <div class="form-group">
                   <label for="objectives">Objectives</label>
                   <div>
                     <input id="objectives" name="objectives" type="text" placeholder="Objectives" class="form-control input-md" value="<?= $project[0]->objectives; ?>" required="true">
                   </div>
                 </div>
                 <input id="new_project-submit" type="submit" value="Update" class="btn btn-lg btn-success btn-block">
               </form>
             </div>
           </div>
         </div>
       </section>
     </div>
   </div>
 </body>
 <?php $this->load->view('frame/footer_view') ?>