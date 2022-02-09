<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Add Coupon
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Add Coupon</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								
                    <div class="row">
					
                               
                        <div class="col-xs-12">
                           
                           
								
							
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
                                            <label for="exampleInputPassword1">Coupon Code</label>
                                            <input type="text" class="form-control" value=""  name="coupon_code" id="coupon_code"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
									
										
									
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Discount Value</label>
                                            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" value=""  name="discount_value" id="discount_value"  required>
											<div class="alert alert-danger alert-dismissable" id="error5" style="display:none;margin:0px"></div>
                                        </div>
										
										
								<div class="form-group">
                                            <label for="exampleInputPassword1">Discount Mode</label>
                                            <select class="form-control" name="discount_mode" required>
											<option value="PERCENTAGE">Percentage</option>
											<option value="USD">USD</option>
											</select>
                                        </div>
										
										
											<div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="daterange" value="" class="form-control pull-right" id="reservation" required>
                </div>
                <!-- /.input group -->
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	 <!--<script src="http://localhost/bestlabs/labadmin/assets/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="http://localhost/bestlabs/labadmin/assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
 
 
 <script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url()?>assets/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
 
 
  <!-- jQuery 2.0.2 -->
      
		
	<script language="Javascript">
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       //-->
    </script>	
		
	<script type="text/javascript">
	
	
	
	var jqry= jQuery.noConflict();
jqry(document).ready(function (e) {
	//$(function() {
	jqry('#reservation').daterangepicker();
	$(document).on("keyup", "#coupon_code", function () {
		
		//var formData = new FormData(form)  
		$.ajax({
        	url: "<?php echo base_url()?>Specialoffers/checkcouponcode",
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
        	url: "<?php echo base_url()?>Specialoffers/save",
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
			
			
			if( data.status == 0 )
			{
				$("#error").show();
				$('#error').html(data.msg)
			}
			else if( data.status == 2 ){
				$("#error5").show();
				$('#error5').html(data.msg)
			}
			else
			{
				$("#error").hide();
				$('#error').html('');
				location.href= '<?php echo base_url()?>Specialoffers';
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