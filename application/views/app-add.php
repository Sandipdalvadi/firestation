<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       NEW APPOINTMENT
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">NEW APPOINTMENT</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								
                    <div class="row">
					
                               
                        <div class="col-xs-6">
                           
                           
								
							
							 <div class="box">
							 
							  <form role="form" method="post" name="uploadForm" id="uploadForm">
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
                                            <label for="exampleInputPassword1">PATIENT IC/PP NUMBER </label>
                                            <input type="text" class="form-control" value="" name="ic_or_pp_name_username" id="ic_or_pp_name_username"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										  <div class="form-group">
                                             <label for="">Select Doctor</label>
                      <select id="doctor" class="form-control">
					  <?php
					  foreach($res as $key => $value)
					  {
					  ?>
                          <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
					  <?php }
					  ?>

                      </select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										   <div class="form-group">
                                            <label for="">Appointment type</label>
                      <select id="apptype" name="apptype" class="form-control">
                          <option value="NEW APPOINTMENT">NEW APPOINTMENT</option>
                          <option value="PREGNANCY">PREGNANCY</option>
                          <option value="GYNAE PROBLEM">GYNAE PROBLEM</option>
                         <option value="REGULAR GYNAE CHECKUP">REGULAR GYNAE CHECKUP</option>
						   <option value="FERTILITY PROBLEM">FERTILITY PROBLEM</option>
						     <option value="GENERAL PROBLEM">GENERAL PROBLEM</option>
							   <option value="POST DELIVERY/PREGNANCY">POST DELIVERY/PREGNANCY</option>
							    <option value="BABY VACCINATION">BABY VACCINATION</option>
                        
                      </select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
                                      
										
									   <div class="form-group">
                                        <label>Appointment Date:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input id="datemask" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
									
									
									
																				 <div class="form-group">
                                            <label for="exampleInputPassword1">Comments</label>
                                            <textarea  class="form-control" value="" name="qualification" id="qualification" placeholder="Patient may describe problem,if they want" required></textarea>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										 <div class="form-group">
                                            <label for="exampleInputPassword1"></label>
                                            <button type="button" id="btncheck" class="btn btn-success form-control" >CHECK AVAILABILITY</button>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										

										
										
										
								
                                    </div><!-- /.box-body -->
									
									

                                    <div class="box-footer">
									<table id="example" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>Serial Number</th>
                <th>Time</th>
                
                <th>ACTION</th>
               
            </tr>
        </thead>
        <tbody id="resdata1">

			
			
         
        </tbody>
       
    </table>
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
	
	
	$(document).on("click", "#btncheck", function () {
	//alert("you clicked me")
	doctor = $("#doctor").val();
	apptype = $("#apptype").val();
	appdate = $("#datemask").val();
	
			$.ajax({
		type: "POST",
		url: "<?php echo base_url()?>Appointment/checkdoctorsavl",
		data:{doctor:doctor,apptype:apptype,appdate:appdate},
		beforeSend: function(){
			
		},
		success: function(data){			
			$("#resdata1").html(data);
        
		},
		complete: function() {
       
    },
		});
		
})




	
	$(document).on("keyup", "#ic_or_pp_name_username", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Appointment/checkcountry",
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
	
	
	$(document).on("click", ".btnbook", function () {
	//alert("you clicked me")
	time = $(this).data("id");
	this1 = $(this);
	doctor = $("#doctor").val();
	apptype = $("#apptype").val();
	appdate = $("#datemask").val();
	ic_or_pp_name_username = $("#ic_or_pp_name_username").val();
	
			$.ajax({
		type: "POST",
		url: "<?php echo base_url()?>Appointment/bookapp",
		data:{doctor:doctor,apptype:apptype,appdate:appdate,time:time,ic_or_pp_name_username:ic_or_pp_name_username},
		beforeSend: function(){
			
		},
		success: function(data){	
			
			this1.hide();
			alert("Appointment Booked Successfully")
			location.href= '<?php echo base_url()?>Appointment';
        
		},
		complete: function() {
       
    },
		});
		
})



	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?php echo base_url()?>Appointment/save",
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
				alert("Appointment Booked Successfully")
				location.href= '<?php echo base_url()?>Appointment';
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