<div class="container">
    <br />
    <br />
    <div align="center">
        <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-info btn-lg">Upload Files</button>
    </div>
    <br /><br />
    <div id="gallery">
        <?php
        $images = glob("upload/*.*");
     foreach($images as $image)
     {
         echo '<div class="col-md-1" align="center" ><img src="' . base_url() . $image .'" width="100px" height="100px" style="margin-top:15px; padding:8px; border:1px solid #ccc;" /></div>';
     }
     ?>
    </div>
    <br />
    <br />
</div>
<br />
</body>
</html>
<div id="uploadModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Multiple Files</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="upload_form" align="center" enctype="multipart/form-data">
                    <input type="file" name="image_file" id="image_file" />
                    <br />
                    <br />
                    <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#upload_form').on('submit', function(e){
            e.preventDefault();
            if($('#image_file').val() == '')
            {
                alert("Please Select the File");
            }
            else
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>ScopeManagement/ajax_upload",
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function(data)
                    {
                        $('#uploaded_image').html(data);
                        location.reload();
                    }
                });
            }
        });
    });
</script>
