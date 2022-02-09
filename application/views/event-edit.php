<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Edit Event
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Edit Event</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								
                    <div class="row">
					
                               
                        <div class="col-xs-12">
                           
                           
								
							
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
                                            <label for="exampleInputPassword1">Event Title</label>
                                            <input type="text" class="form-control" value="<?php echo $data['title']?>" name="title" id="title"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Event Location</label>
                                            <input type="text" class="form-control" value="<?php echo $data['location']?>" name="location" id="location"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Event Type</label>
                                           <select class="form-control" name="event_type" id="event_type">
										   <option value="Free" <?php if($data['event_type'] == "Free" ) echo "selected";?>>Free</option>
										    <option value="Paid" <?php if($data['event_type'] == "Paid" ) echo "selected";?>>Paid</option>
											<option value="Sponsorship"  <?php if($data['event_type'] == "Sponsorship" ) echo "selected";?>>Sponsorship</option>
										   </select>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
																			
										
										
										<div class="form-group" id="flatprice" style="display:<?php if($data['event_type'] == "Paid" ) echo "block"; else echo "none";?>">
                                            <label for="exampleInputPassword1">Event Price</label>
                                            <input type="text" class="form-control" value="<?php echo $data['price']?>" name="price" id="price"  >
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										<div class="form-group" id="spprice" style="display:<?php if($data['event_type'] == "Sponsorship" ) echo "block"; else echo "none";?>">
                                            <label for="exampleInputPassword1">Sponsorship Price</label>
                                            
											<?php
											$sss= explode(",",$data['sponsorship']);
											foreach($sp as $key => $val)
											{
											?>
											<br><input type="checkbox" name="sponsorship[]" <?php if(in_array($val['id'],$sss)) echo "checked";?> value="<?php echo $val['id']?>"><?php echo $val['name']?>($ <?php echo $val['amount']?>) 
											<?php }
											?>
                                        </div>
										
										
										
										
										
										
										
										 <?php
				  $event_date_Arr = explode(" ",$data['event_date']);
				  //$datarange1 = $datarange1[1]."/".$datarange1[2]."/".$datarange1[0];
				  $event_date1 = explode("-",trim($event_date_Arr[0]));
				
				  $event_date = $event_date1[1]."/".$event_date1[2]."/".$event_date1[0]." ".$event_date_Arr[1];
				 
				  ?>	
										
										<div class="form-group"> <label for="exampleInputPassword1">Event Date</label>
                <div class='input-group date' id='datetimepicker1' >
                    <input type='text' class="form-control"  name="event_date" value="<?php echo $event_date?>"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Amount Per Additional Person</label>
                                            <input type="text" class="form-control" value="<?php echo $data['extra_cost_per_person']?>" name="extra_cost_per_person" id="extra_cost_per_person"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
									 <?php
				  $datarange1 = explode("-",$data['start_date']);
				  $datarange1 = $datarange1[1]."/".$datarange1[2]."/".$datarange1[0];
				  $datarange2 = explode("-",$data['end_date']);
				  $datarange2 = $datarange2[1]."/".$datarange2[2]."/".$datarange2[0];
				  
				  $dt =  $datarange1." - ".$datarange2;
				  ?>	
											<div class="form-group">
                <label>Registration Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="daterange" value="<?php echo $dt?>" class="form-control pull-right" id="reservation" required>
                </div>
                <!-- /.input group -->
              </div>
										
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Upload Event Image </label>
                                            <input type="file" class="form-control" value="" name="userfile" id="userfile"  >
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Event Description</label>
                                            <textarea class="form-control" name="description" required><?php echo $data['description']?></textarea>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
                                       
                                    </div><!-- /.box-body -->
									
									

                                    <div class="box-footer">
									<input type="hidden" name="cid" value="<?php echo $data['id']?>">
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
	
	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	 <!--<script src="http://localhost/bestlabs/labadmin/assets/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="http://localhost/bestlabs/labadmin/assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
 
 
 <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url()?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
 
	<script type="text/javascript">
		var jqry= jQuery.noConflict();
jqry(document).ready(function (e) {
	jqry('#reservation').daterangepicker();
	
	
	
	$("#event_type").on('change',(function(e) {
	ty = $(this).val();
	if( ty == "Paid")
	{
		$("#flatprice").show();
		$("#price").attr("required", true);
		$("#spprice").hide();
	}
	else if( ty == "Sponsorship" ){
		
		$("#flatprice").hide();
		$("#price").attr("required", false);
		$("#spprice").show();
	}
	else
	{
		$("#spprice").hide();
		$("#flatprice").hide();
		$("#price").attr("required", false);
	}
})
)
	   
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?php echo base_url()?>Events/update",
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
				location.href= '<?php echo base_url()?>Events';
			}
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
	}));
});
</script>
<link href="https://www.jqueryscript.net/demo/Clean-Data-Timepicker-with-jQuery-Bootstrap-3/build/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Clean-Data-Timepicker-with-jQuery-Bootstrap-3/build/js/bootstrap-datetimepicker.min.js"></script>
 <script src="<?php echo base_url()?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script type="text/javascript">
            jQuery(function ($) {
                //$('#datetimepicker1').datetimepicker();
				$('#datetimepicker1').datetimepicker({
         format : 'MM/DD/YYYY HH:mm'
    });
	
	
				$('#datetimepicker2').datetimepicker({
               viewMode: 'years'
            });
			$('#datetimepicker3').datetimepicker({
                viewMode: 'years',
               format: 'MM/YYYY'
            });
            });
        </script>

</html>