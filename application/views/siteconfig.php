<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Site Settings
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Site Settings</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
							<?php
				if($this->session->flashdata('message') )
				{
				?>
				<div class="alert alert-success"><?php
				echo $this->session->flashdata('message');
				?>
				</div>
				<?php }
				?>
				<?php
				if($this->session->flashdata('message1') )
				{
				?>
				<div class="alert alert-danger"><?php
				echo $this->session->flashdata('message1');
				?>
				</div>
				<?php }
				?>					
                    <div class="row">
					
                               
                        <div class="col-xs-12">
                           
                           
								
							
							 <div class="box">
							 
							  <form role="form" method="post" name="uploadForm" id="uploadForm" action="<?php echo base_url()?>Siteconfig/save">
                                    <div class="box-body">
									
									
                                    
										
										  
								

										
									
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Vasavi Registration Amount (USD)</label>
                                            <input type="text"   onkeypress="return isNumberKey(event)" class="form-control" value="<?php echo $data['registration_amount']?>" name="registration_amount" id="registration_amount"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item Description for Vasavi Registration Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_desc_reg_only']?>" name="paypal_item_desc_reg_only" id="paypal_item_desc_reg_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item ID for Vasavi Registration Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_id_reg_only']?>" name="paypal_item_id_reg_only" id="paypal_item_id_reg_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item Description for Donation Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_desc_donation_only']?>" name="paypal_item_desc_donation_only" id="paypal_item_desc_donation_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item ID for Vasavi Donation Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_id_donation_only']?>" name="paypal_item_id_donation_only" id="paypal_item_id_donation_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item Description for Donation and Vasavi Registration Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_desc_donation_reg_only']?>" name="paypal_item_desc_donation_reg_only" id="paypal_item_desc_donation_reg_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item ID for Donation and Vasavi Registration Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_id_donation_reg_only']?>" name="paypal_item_id_donation_reg_only" id="paypal_item_id_donation_reg_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										
										
											<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item Description for Vasavi Events Registration Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_desc_event_only']?>" name="paypal_item_desc_event_only" id="paypal_item_desc_event_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item ID for Vasavi Events Registration Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_id_event_only']?>" name="paypal_item_id_event_only" id="paypal_item_id_event_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item Description for Vasavi Events Registration and Membership Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_desc_event_member_only']?>" name="paypal_item_desc_event_member_only" id="paypal_item_desc_event_member_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item ID for Vasavi Events Registration  and Membership Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_id_event_member_only']?>" name="paypal_item_id_event_member_only" id="paypal_item_id_event_member_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item Description for Vasavi Events Registration and Donation Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_desc_event_donation_only']?>" name="paypal_item_desc_event_donation_only" id="paypal_item_desc_event_donation_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item ID for Vasavi Events Registration  and Donation Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_id_event_donation_only']?>" name="paypal_item_id_event_donation_only" id="paypal_item_id_event_donation_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
										
											<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item Description for Vasavi Events Registration,Membership and Donation Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_desc_event_donation_mem_only']?>" name="paypal_item_desc_event_donation_mem_only" id="paypal_item_desc_event_donation_mem_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">PayPal Item ID for  Vasavi Events Registration,Membership and Donationn Only</label>
                                            <input type="text"   class="form-control" value="<?php echo $data['paypal_item_id_event_donation_mem_only']?>" name="paypal_item_id_event_donation_mem_only" id="paypal_item_id_event_donation_mem_only"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										
									
										
										
									
										
                                       
                                    </div><!-- /.box-body -->
									
									

                                    <div class="box-footer">
									<input type="hidden"  value="1"  name="cid" id="cid" >
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
 

    </body>
	


</html>