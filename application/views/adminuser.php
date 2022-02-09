<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Admin Users
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Admin Users</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								<div >
									<a href="<?php echo base_url()?>Adminusers/add"><button style="margin:3px;float:left" class="btn btn-success btn-sm">ADD Admin Users</button></a>
								</div>
                    <div class="row">
					<br><br>
			
 <form role="form" method="post" name="uploadForm" id="uploadForm">
					 <div class="col-xs-12" style="border: 1px solid #ccc; padding:10px; margin:10px; margin-right:30px; width:98%">
					 		<fieldset>
					   <legend>Search Admin Users:</legend>
											<div class="col-xs-4">
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
										</div>
										<div class="col-xs-4">
											
										 <div class="form-group">
                                            <label for="exampleInputPassword1">State</label>
                                            <select name="state_id" id="state_id"  class="form-control" required>
												<option value="">Select</option>												
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										</div>
										<div class="col-xs-4">
										 <div class="form-group">
                                            <label for="exampleInputPassword1">District</label>
                                            <select name="district_id" id="district_id"  class="form-control" required>
												<option value="">Select</option>												
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										</div>
										<div class="col-xs-4">
										<div class="form-group">
                                            <label for="exampleInputPassword1">City</label>
                                            <select name="city_id" id="city_id"  class="form-control" required>
												<option value="">Select</option>												
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										</div>
										<div class="col-xs-4">
										<div class="form-group">
                                            <label for="exampleInputPassword1">Locality</label>
                                            <select name="locality_id[]" multiple id="locality_id"    class="js-example-basic-multiple form-control  " required>
												<option value="">Select</option>												
											</select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										</div>
										<!--<div class="col-xs-4">
										<div class="form-group">
										 <label for="exampleInputPassword1">&nbsp;</label>
                                        <button type="submit" name="Submit" class="btn btn-primary" style="margin-top:24px">Search</button>
                                   </div>
									</div>-->
									 </fieldset>
					 </div>
                               
                       
						
						
						</form>
						<br><br>
						
						<div class="col-xs-12">
                           
                           
								
							
							 <div class="box">
                                <div class="box-body table-responsive">
								
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR. NO.</th>
                                                <th>Name</th>
                                                <th>Email</th>                                             
                                                <th>Mobile </th> 
												 <th>Locality </th> 
												 <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultdata">
										<?php
									
											$i=0;
											  //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
												  foreach($externaleclients as $key =>$row){
												  
												  $i++;
										?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['email_id']?></td>
												<td><?php echo $row['mobile']?></td>     												
                                                <td><?php echo $row['localityname']?></td>   
												<td><a href="<?php echo base_url()?>Adminusers/edit/<?php echo $row['admin_id'];?>"><button class="btn btn-success btn-sm">Edit</button></a>  
												<a href="<?php echo base_url()?>Adminusers/status/<?php echo $row['admin_id'];?>" onclick="return confirm('Are you sure want to Delete?')"><button class="btn btn-danger btn-sm">Delete</button>
												</td>
                                            </tr>
                                        <?php }
										
										?>										
                                        </tbody>
                                        <!--<tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  
	

	


  <script src="<?php echo base_url()?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
		
			
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



	<script type="text/javascript">
jQuery(document).ready(function ($) {
	
	
	
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
	
	$(document).on("keyup", "#email_id", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Adminusers/checkemail",
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


$(document).on("keyup", "#mobile", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Adminusers/checkmobile",
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
				$("#error2").show();
				$('#error2').html(data.msg)
			}
			else
			{
				$("#error2").hide();
				$('#error2').html('')
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
        	url: "<?php echo base_url()?>Adminusers/SearchAgents",
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
			/*if(data.status == 0 )
			{
				$("#error").show();
				$('#error').html(data.msg)
			}
			else
			{
				$("#error").hide();
				$('#error').html('');
				location.href= '<?php echo base_url()?>Agent';
			}*/
			 $("#example1").dataTable().fnDestroy()
			 $('#resultdata').html('')
				$('#resultdata').html(data)

        $("#example1").dataTable({
           // ... skipped ...
        });
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
	
	function search(refobj){
		  var form = document.getElementById('uploadForm');
	  		$.ajax({
        	url: "<?php echo base_url()?>Adminusers/SearchAgents",
			type: "POST",
			data:  new FormData(form),
			beforeSend: function(){
				//$("#body-overlay").show();
				},
			contentType: false,
    	    processData:false,
			success: function(data)
		    {
				
			
			//alert("data table ppulate")
			//$.noConflict();
			 refobj("#example1").dataTable().fnDestroy()
			 //$('#example1').DataTable().destroy();
			refobj('#resultdata').html('')
				refobj('#resultdata').html(data)

        refobj("#example1").dataTable({
           // ... skipped ...
        });
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	   
	}
	
	
	
	var jqry = jQuery.noConflict();
    $('.js-example-basic-multiple').select2().on('change', function () {
      // alert(this.value)
	  //$("#uploadForm").submit();
		search(jqry);
	   
	   
      });
    $('.js-example-basic-single').select2().on('change', function () {
      // alert(this.value)
      });
	 
	
});


</script>




<script>

	
jQuery(document).ready(function($) {
	//$("#example1")
	var jqry  = jQuery.noConflict();
	//var table =  $("#example1").dataTable();
	
	
	
});


</script>  

 