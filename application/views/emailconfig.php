<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Email Notification Settings
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Email Notification Settings</li>
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
					
                       <form method="post" action="<?php echo base_url()?>Emailconfig/save"> 

							
										<div class='col-md-12'>
											<div class="form-group">
												<label for="exampleInputPassword1">FROM EMAIL</label>
												<input type="email"   class="form-control" value="<?php echo $data["from_email"]?>" name="from_email" id="from_email"  required>
												<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
											</div>
										</div>
										
										<div class='col-md-12'>
											<div class="form-group">
												<label for="exampleInputPassword1">TO EMAILS(vasavi admin emails)</label>
												<input type="email"   class="form-control" value="<?php echo $data["to_email"]?>" name="to_email" id="to_email"  required>
												<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
											</div>
										</div>
										
										
										<div class='col-md-12'>
											<div class="form-group">
												<label for="exampleInputPassword1">CC EMAILS(vasavi admin emails multiple values separated by comma)</label>
												<input type="text"   class="form-control" value="<?php echo $data["cc_emails"]?>" name="cc_emails" id="cc_emails"  >
												<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
											</div>
										</div>

										
                      <div class='col-md-12'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registration Email Template To Joined Members</small></h3>
                                 
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                   
                                        <textarea id="editor1" name="registration_email_member" rows="6" cols="80">
                                            <?php echo $data["registration_email_member"]?>
                                        </textarea>                        
                                    
                                </div>
                            </div><!-- /.box -->

                      
                        </div><!-- /.col-->  
						
						
						    <div class='col-md-12'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Registration Email Template To Vasavi Admin</small></h3>
                                 
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                   
                                        <textarea id="editor2" name="registration_email_admin" rows="6" cols="80">
                                           <?php echo $data["registration_email_admin"]?>
                                        </textarea>                        
                                    
                                </div>
                            </div><!-- /.box -->

                      
                        </div><!-- /.col-->  
						
						
						
						   <div class='col-md-12'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    <h3 class='box-title'>Paypal Transaction Success</small></h3>
                                 
                                </div><!-- /.box-header -->
                                <div class='box-body pad'>
                                   
                                        <textarea id="editor3" name="paypal_success_transaction" rows="6" cols="80">
                                           <?php echo $data["paypal_success_transaction"]?>
                                        </textarea>                        
                                    
                                </div>
                            </div><!-- /.box -->

                      
                        </div><!-- /.col-->  
						
						 <div class='col-md-12'>
                                    <div class="box-footer">
									<input type="hidden"  value="1"  name="cid" id="cid" >
                                        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                    </div>
									</div>
						</form>
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
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

   