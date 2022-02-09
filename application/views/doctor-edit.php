<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Edit Doctor
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Edit Doctor</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								
                    <div class="row">
					
                               
                        <div class="col-xs-6">
                           
                           
								
							
							 <div class="box">
							 
							  <form role="form" method="post" name="uploadForm" id="uploadForm">
                                    <div class="box-body">
									
									
                                      
                                       <div class="form-group">
                                            <label for="exampleInputPassword1">IC/PP NUMBER </label>
                                            <input type="text" class="form-control" value="<?php echo $data['ic_or_pp_name_username']?>" name="ic_or_pp_name_username" id="ic_or_pp_name_username"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										   <div class="form-group">
                                            <label for="exampleInputPassword1">Password </label>
                                            <input type="text" class="form-control" value="<?php echo $data['password']?>" name="password" id="password"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $data['name']?>" name="name" id="name"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">Contact Number</label>
                                            <input type="text" class="form-control" value="<?php echo $data['contact_no']?>" name="contact_no" id="contact_no"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="text" class="form-control" value="<?php echo $data['email']?>" name="email" id="email"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
											
										 <div class="form-group">
                                            <label for="exampleInputPassword1">FROM TIME</label>
                                            <!--<input type="text" class="form-control" value="" name="from_time" id="from_time"  required>-->
											<select class="form-control" name="from_time" id="from_time" >
											
											<?php
											for ($i = 6; $i <= 23; $i++){
  for ($j = 0; $j <= 45; $j+=15){    
	$time = str_pad($i, 2, '0', STR_PAD_LEFT).':'.str_pad($j, 2, '0', STR_PAD_LEFT);
	?>
	<option value="<?php echo $time?>" <?php if($data['from_time'] == $time ) echo "selected";?>><?php echo $time?></option>
	<?php
  }
 
}?>
											
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">TO TIME</label>
                                            <!--<input type="text" class="form-control" value="" name="from_time" id="from_time"  required>-->
											<select class="form-control" name="to_time" id="to_time" >
											
											<?php
											for ($i = 6; $i <= 23; $i++){
  for ($j = 0; $j <= 45; $j+=15){    
	$time = str_pad($i, 2, '0', STR_PAD_LEFT).':'.str_pad($j, 2, '0', STR_PAD_LEFT);
	?>
	<option value="<?php echo $time?>" <?php if($data['to_time'] == $time ) echo "selected";?>><?php echo $time?></option>
	<?php
  }
 
}?>
											
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">TIME SLOT</label>
                                            <!--<input type="text" class="form-control" value="" name="from_time" id="from_time"  required>-->
											<select class="form-control" name="slot" id="slot" >
											<option value="2" <?php if($data['slot'] == 2 ) echo "selected";?>>2 minutes</option>
											<option value="3" <?php if($data['slot'] == 3 ) echo "selected";?>>3 minutes</option>
											<option value="4" <?php if($data['slot'] == 4 ) echo "selected";?>>4 minutes</option>
											<option value="5" <?php if($data['slot'] == 5 ) echo "selected";?>>5 minutes</option>
											<option value="10" <?php if($data['slot'] == 10 ) echo "selected";?>>10 minutes</option>
											<option value="15" <?php if($data['slot'] == 15 ) echo "selected";?>>15 minutes</option>
											<option value="20" <?php if($data['slot'] == 20 ) echo "selected";?>>20 minutes</option>
											<option value="30" <?php if($data['slot'] == 30 ) echo "selected";?>>30 minutes</option>
											<option value="45" <?php if($data['slot'] == 45 ) echo "selected";?>>45 minutes</option>
											<option value="60" <?php if($data['slot'] == 60 ) echo "selected";?>>1 Hour</option>	
											
											
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">Qualification</label>
                                            <input type="text" class="form-control" value="<?php echo $data['qualification']?>" name="qualification" id="qualification"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">Specilisation</label>
                                            <input type="text" class="form-control" value="<?php echo $data['specilisation']?>" name="specilisation" id="specilisation"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
								
										<div class="form-group">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text" class="form-control" value="<?php echo $data['address']?>" name="address" id="address"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
                                       
                                    </div><!-- /.box-body -->
										
									
										
                                       
                                    </div><!-- /.box-body -->
									
									

                                    <div class="box-footer">
									<input type="hidden"  value="<?php echo $data['id']?>"  name="cid" id="cid" >
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
	
	$(document).on("keyup", "#ic_or_pp_name_username", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Doctor/checkcountryedit",
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
			if(data.status == 0 )
			{
				$("#error").show();
				$('#error').html(data.msg)
			}
			else
			{
				$("#error").hide();
				$('#error').html('')
			}
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
   
})
	
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?php echo base_url()?>Doctor/update",
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
				location.href= '<?php echo base_url()?>Doctor';
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