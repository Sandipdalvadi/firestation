<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Paypal Settings
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Paypal Settings</li>
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
							 
							  <form role="form" method="post" name="uploadForm" id="uploadForm" action="<?php echo base_url()?>Paypal/save">
                                    <div class="box-body">
									
									
                                    
										
										  
										
                                       <div class="form-group">                                    
                                        <label>
                                            <input type="radio" name="paypal_live_test_mode" class="minimal"  value="1" <?php if($data['paypal_live_test_mode'] == 1) echo "checked"?> /> Live
                                        </label>
										&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>
                                            <input type="radio"  value="0" <?php if($data['paypal_live_test_mode'] == 0) echo "checked"?> name="paypal_live_test_mode" class="minimal"/> Sandbox/Test Mode                                                    
                                        </label>
                                       
                                    </div>

										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Paypal Business Email Live</label>
                                            <input type="text" class="form-control" value="<?php echo $data['paypal_business_email_live']?>" name="paypal_business_email_live" id="paypal_business_email_live"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Paypal Business Email Sandbox</label>
                                            <input type="text" class="form-control" value="<?php echo $data['paypal_business_email_sandbox']?>" name="paypal_business_email_sandbox" id="paypal_business_email_sandbox"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Paypal Live URL</label>
                                            <input type="text" class="form-control" value="<?php echo $data['paypal_url_live']?>" name="paypal_url_live" id="paypal_url_live"  required>
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>
										
										<div class="form-group">
                                            <label for="exampleInputPassword1">Paypal Sand Box URL</label>
                                            <input type="text" class="form-control" value="<?php echo $data['paypal_url_sandbox']?>" name="paypal_url_sandbox" id="paypal_url_sandbox"  required>
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


        

 

    </body>
	


</html>