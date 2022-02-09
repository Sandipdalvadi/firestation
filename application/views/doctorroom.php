<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Assign Doctor Room
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active"> Assign Doctor Room</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
								
                    <div class="row">
					
                               
                        <div class="col-xs-12">
                           
                           
								
							
							 <div class="box">
                                <div class="box-body table-responsive">
								
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR. NO.</th>
                                                <th>Doctor Name</th>
												<th>Contact Number</th>
                                               <th>Email</th>
                                               
												 <th>Room</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
									
											$i=0;
											  //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
												  foreach($country as $key =>$row){
												  
												  $i++;
										?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['name']?></td>
                                                 <td><?php echo $row['contact_no']?></td>                                  
                                                 <td><?php echo $row['email']?></td>
												<td>
												<select name="droom"  class="form-control droom">
												<option value="">Select</option>
												<?php
												foreach($room as $key2=>$val2)
												{
												?>
												<option value="<?php echo $row['id']?>$$$<?php echo $val2['name']?>" <?php if($val2['name'] == $row['room'] ) echo "selected";?>><?php echo $val2['name']?></option>
												<?php }
												?>
												</select>
												
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
        
<script type="text/javascript">
$(document).ready(function (e) {
	
	$(document).on("change", ".droom", function () {
		
		rooms = $(this).val();		
		$.ajax({
        	url: "<?php echo base_url()?>Doctor/assignroom",
			type: "POST",
			data:  {rooms:rooms},
			beforeSend: function(){
				//$("#body-overlay").show();
				},
			//contentType: false,
    	   // processData:false,
			success: function(data)
		    {
			//$("#targetLayer").html(data);
			//$("#targetLayer").css('opacity','1');
			//setInterval(function() {$("#body-overlay").hide(); },500);
			//location.href= '<?php echo base_url()?>Country';
			alert("Room Assigned To Doctor Successfully")
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
			},
		  	error: function() 
	    	{
	    	} 	        
	   });
   
})
	
	$("#uploadFormDelete123").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?php echo base_url()?>Doctor/save",
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

 