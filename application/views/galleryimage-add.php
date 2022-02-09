<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Add Gallery Images
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Add Gallery Images</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								
                    <div class="row">
					
                               
                        <div class="col-xs-6">
                           
                           
								
							
							 <div class="box">
							 
							  <form role="form" method="post" name="uploadForm" id="uploadForm" enctype='multipart/form-data' >
                                    <div class="box-body">
									
									<?php 
									
									if(!empty($error) )
									{									
									?>
									<!--<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b><?php //echo $error;?></b>
                                    </div>-->
									
									<?php }
									?>
                                      
									  
										<div class="form-group">
                                            <label for="exampleInputPassword1">Category<?php //echo $_SERVER['DOCUMENT_ROOT']?></label>
                                           <select name="category_id" id="category_id" class="form-control" required >
										    <option value="">Select</option>
											<?php
										   foreach($cat as $key=>$value)
										   {
										   ?>
										    <option value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
										   <?php }
										   ?>
										 
										   
										   </select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Sub Category<?php //echo $_SERVER['DOCUMENT_ROOT']?></label>
                                           <select name="sub_category_id"  id="sub_category_id" class="form-control" required >
										    </select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										
										  <div class="form-group">
                                            <label for="exampleInputPassword1">Gallery Title</label>
                                            <input type="text" class="form-control" value="" name="title" id="title"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Upload Image </label>
                                            <input type="file" class="form-control" value="" name="userfile" id="userfile"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
                                       
                                    </div><!-- /.box-body -->
									
									

                                    <div class="box-footer">
									
                                        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                        
							 
							 </div><!-- /.box -->
                        </div>
						
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        

 

    </body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
$(document).ready(function (e) {
	$(document).on("change", "#category_id", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Gallertcat/populatesubcat",
			type: "POST",
			data:  new FormData(document.forms.uploadForm),
			beforeSend: function(){
				//$("#body-overlay").show();
				},
			contentType: false,
    	    processData:false,
			success: function(data)
		    {
			//$("#targetLayer").html(data);
			//$("#targetLayer").css('opacity','1');
			//setInterval(function() {$("#body-overlay").hide(); },500);
			//location.href= '<?php echo base_url()?>Country';
			/*if(data.status == 0 )
			{
				$("#error").show();
				$('#error').html(data.msg)
			}
			else
			{
				$("#error").hide();
				$('#error').html('')
			}*/
			$("#sub_category_id").html(data);
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	});
	   
	   
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?php echo base_url()?>Galleryimage/save",
			type: "POST",
			data:  new FormData(this),
			beforeSend: function(){
				//$("#body-overlay").show();
				},
			contentType: false,
    	    processData:false,
			success: function(data)
		    {
			//$("#targetLayer").html(data);
			//$("#targetLayer").css('opacity','1');
			//setInterval(function() {$("#body-overlay").hide(); },500);
			if(data.status == 0 )
			{
				$("#error").show();
				$('#error').html(data.msg)
			}
			else
			{
				$("#error").hide();
				$('#error').html('');
				location.href= '<?php echo base_url()?>Galleryimage';
			}
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});
</script>


</html>