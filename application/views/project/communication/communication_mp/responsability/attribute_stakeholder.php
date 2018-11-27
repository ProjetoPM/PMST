<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Stakeholder Responsability</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>

  <!-- /.row -->

  <?php if($this->session->flashdata('success')):?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong><?php echo $this->session->flashdata('success'); ?></strong>
    </div>
    <?php elseif($this->session->flashdata('error')):?>
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $this->session->flashdata('error'); ?></strong>
      </div>
    <?php endif;?>


    <div class="col-lg-12 form-group"> 
      <select id="mySelect" onchange="myFunction()">
        <option value="Audi">Audi
          <option value="BMW">BMW
            <option value="Mercedes">Mercedes
              <option value="Volvo">Volvo
              </select>

              <p class="col-lg-12 form-group">When you select a new car, a function is triggered which outputs the value of the selected car.</p>
              <p class="col-lg-12 form-group" id="demo"></p>

            </div>


            <div class="col-lg-12 form-group"> 
              <label>Select Stakeholder</label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="stakeholder"><i class="glyphicon glyphicon-comment"></i></a> 


              <select name="stakeholder_id" class="form-control"> 



                <option name="stakeholder_id1" value="nome1">Lucas Abner</option> 
                <option name="stakeholder_id2" value="nome1">Fulano</option> 
                <option name="stakeholder_id3" value="nome1">Ciclano</option> 
                

              </select> 
            </div> 


            <div class="col-lg-2 form-group"> 
              <label> Interest</label> 
              <a class="btn-sm b2tn-default" data-toggle="tooltip" data-placement="right" title=interest><i class="glyphicon glyphicon-comment"></i></a> 
              <select name="interest" class="form-control average" id="interest" onchange="changed(this)"> 
                <option value="0">0%</option> 
                <option value="10">10%</option> 
                <option value="30">30%</option> 
                <option value="50">50%</option> 
                <option value="70">70%</option> 
                <option value="90">90%</option> 
              </select> 
            </div> 



            <div  id="demo2" class="col-lg-2 form-group"> 
              <label>Mudança</label> 
              <a class="btn-sm btn-default" data-toggle="tooltip" data-placement="right" title="campo de mudança"><i class="glyphicon glyphicon-comment"></i></a> 
              <input type="text" class="form-control" name="average" id="average" onchange="changed(this)" > 
            </div> 



            <script type="text/javascript"> 

              function changed(){ 
               var interest = document.getElementById('interest').value; 
               var aux  = interest * 10; 
               document.getElementById('average').value = parseFloat(aux.toFixed(2)); 
             } 

           </script> 

           <script>
            function myFunction() {
              var x = document.getElementById("mySelect").value;
              document.getElementById("demo").innerHTML = "You selected: " + x;
            }
          </script>


        </div>
      </div>
      <?php $this->load->view('frame/footer_view')?>
