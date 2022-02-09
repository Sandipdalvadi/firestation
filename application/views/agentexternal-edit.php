<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Edit External Agent
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Edit External Agent</li>
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
                                            <label for="exampleInputPassword1">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $data['name']?>" name="name" id="name"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
											<div class="form-group">
                                            <label for="exampleInputPassword1">Mobile</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $data['mobile']?>"  name="contactno" id="contactno"  required>
                                        </div>
										
											<div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input type="email" class="form-control" disabled value="<?php echo $data['email_id']?>"  name="email" id="email"  required>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Address</label>
                                            <textarea class="form-control"   name="address" id="address" ><?php echo $data['address']?></textarea>
                                        </div>
										
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">Country</label>
                                            <select name="country_id" id="country_id"  class="form-control" required>
												<option value="">Select</option>
												<?php
												foreach($country as $key => $value)
												{
												?>
												<option value="<?php echo $value['id']?>" <?php if($data['country_id'] == $value['id'] ) echo "selected";?>><?php echo $value['name']?></option>
												<?php }
												?>
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">State</label>
                                            <select name="state_id" id="state_id"  class="form-control" required>
												<option value="">Select</option>
<?php
												foreach($state as $key => $value)
												{
												?>
												<option value="<?php echo $value['id']?>" <?php if($data['state_id'] == $value['id'] ) echo "selected";?>><?php echo $value['name']?></option>
												<?php }
												?>																	
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1">District</label>
                                            <select name="district_id" id="district_id"  class="form-control" required>
												<option value="">Select</option>
<?php
												foreach($district as $key => $value)
												{
												?>
												<option value="<?php echo $value['id']?>" <?php if($data['district_id'] == $value['id'] ) echo "selected";?>><?php echo $value['name']?></option>
												<?php }
												?>														
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <select name="city_id" id="city_id"  class="form-control" required>
												<option value="">Select</option>
<?php
												foreach($city as $key => $value)
												{
												?>
												<option value="<?php echo $value['id']?>" <?php if($data['city_id'] == $value['id'] ) echo "selected";?>><?php echo $value['name']?></option>
												<?php }
												?>														
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Locality</label>
                                           <select name="locality_id[]" id="locality_id" required multiple  class="form-control js-example-basic-multiple " required>
												<option value="">Select</option>
												<?php
												foreach($locality as $key => $value)
												{
												?>
												<option value="<?php echo $value['id']?>" <?php if( in_array($value['id'],explode(",",$data['locality_id']) )) echo "selected";?>><?php echo $value['name']?></option>
												<?php }
												?>		
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
								
								
										
                                       
                                    </div><!-- /.box-body -->
									
									

                                    <div class="box-footer">
									<input type="hidden"  value="<?php echo $data['admin_id']?>"  name="cid" id="cid" >
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
	
	$(document).on("keyup", "#Deletename", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>ExternalClient/checkclientedit",
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


$(document).on("change", "#city_id", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Location/populatelocationbycity",
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
			$("#locality_id").html(data);
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	  
   
})
	
	$(document).on("change", "#district_id", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Location/populatecitybydistrict",
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
			$("#city_id").html(data);
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	  
   
})
	
	$(document).on("change", "#state_id", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Location/populatedistrictbystate",
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
			$("#district_id").html(data);
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	  
   
})



	$(document).on("change", "#country_id", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Location/populatestatebycountryid",
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
			$("#state_id").html(data);
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	  
   
})
	
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?php echo base_url()?>Agentexternal/update",
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
				location.href= '<?php echo base_url()?>Agentexternal';
			}
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('.js-example-basic-multiple').select2();
    $('.js-example-basic-single').select2();
	 
});
</script>

</html>