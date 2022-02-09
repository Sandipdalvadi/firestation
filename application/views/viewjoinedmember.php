<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      View Joined Member
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">View Joined Member</li>
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
							 
							 
	  <form role="form" method="post" name="uploadForm" id="uploadForm" enctype='multipart/form-data' action="<?php echo base_url()?>Joinedmember/update" >
                                    <div class="box-body">
               
                <!-- Personal Information -->
                <div class="form-portlet">
                    <h3>Personal Information</h3>
                    <hr>
                    <div class="row clearfix">

						
<div class="form-group col-lg-12 col-md-12 col-xs-12">
                            <label>Membership Type: </label>
                          <?php echo $profile['membership_type']?>
                        </div>
						

						<div class="form-group col-lg-4 col-md-6 col-xs-12">
                            <label>Email: </label>
                          <?php echo $profile['email']?>
                        </div>
						
						
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                            <label>First Name: </label>
                            <?php echo $profile['name']?>
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Last Name: </label> 
                            	<?php echo $profile['lastname']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Gothram: </label>  
                            <?php echo $profile['gothram']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Occupation: </label>    
                           <?php echo $profile['occupation']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Phone: </label>   
                            <?php echo $profile['contact_no']?>
                        </div>

                      
                        
                    </div>
                    <!-- Row End -->
                </div>
                <!-- End -->
                <!-- Statrt -->
                <div class="form-portlet">
                     <label>Interests In: </label>  
					 
					 	<?php
								if(isset($profile['interests']))
								{
									$arr = explode("/",$profile['interests']);
								}
								else
								{
									$arr = array();
								}
								?>
								
								
                    <div class="row clearfix col-md-12">
                          <div class="form-group clearfix">
                                   
								    <?php if (in_array("Vasavi Jayanthi", $arr)) { 
									 ?>
								   <div class="checkbox">
                                <label>
								
							
                                    
									 <?php if (in_array("Vasavi Jayanthi", $arr)) { 
									 ?>
									 Vasavi Jayanthi
									 <?php
									 } 
									 ?>
									</label>
                            </div>
									<?php }
									?>
							  <?php if (in_array("Kalyanams (Balaji, Sri Rama, Narasimha Swami…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                  
									
										 <?php if (in_array("Kalyanams (Balaji, Sri Rama, Narasimha Swami…)", $arr)) { 
									 ?>
									Kalyanams (Balaji, Sri Rama, Narasimha Swami…)
									 <?php
									 } 
									 ?>
									</label>
                            </div><?php }
									?>
                              <?php if (in_array("Cultural Events (Diwali, Dusshera, Ugadhi…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                    
										
									 <?php if (in_array("Cultural Events (Diwali, Dusshera, Ugadhi…)", $arr)) { 
									 ?>
									Cultural Events (Diwali, Dusshera, Ugadhi…)
									 <?php
									 } 
									?>
									</label>
                            </div><?php
									 } 
									 ?>
                              <?php if (in_array("Social Gatherings (Women’s day, picnic, educational discussions…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                   
										
									
									 <?php if (in_array("Social Gatherings (Women’s day, picnic, educational discussions…)", $arr)) { 
									 ?>
									Social Gatherings (Women’s day, picnic, educational discussions…)
									 <?php
									 } 
									?>
									</label>
                            </div><?php
									 } 
									 ?>

                              <?php if (in_array("Online presentations (health, wealth, stocks, tech talk….)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                   
										
									
										 <?php if (in_array("Online presentations (health, wealth, stocks, tech talk….)", $arr)) { 
									 ?>
									Online presentations (health, wealth, stocks, tech talk….)
									 <?php
									 } 
									 ?>
									</label>
                            </div> <?php
									 } 
									 ?>

                           
                         </div>
                           </div>
                </div>
                <!-- End -->
                <!-- Personal Information -->
                <div class="form-portlet">
                    <h3>Address</h3>
                    <hr>
                    <div class="row clearfix">
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Line 1: </label>    
                           <?php echo $profile['address']?>
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                            <label>Line 2: </label>
                            <?php echo $profile['address2']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>City: </label> 
                            <?php echo $profile['city']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                            <label>State: </label>
                            <?php echo $profile['state']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                            <label>Zip Code: </label>
                            <?php echo $profile['zipcode']?>
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Country: </label>USA
                            
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- End -->
                <!-- Personal Information -->
                <div class="form-portlet">
                    <h3>Spouse</h3>
                    <hr>
                      <div class="row clearfix">

                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>First Name: </label>
                           <?php echo $profile['sfirstname']?>
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Last Name: </label>
                           <?php echo $profile['slastname']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                            <label>Email Id: </label>
                            <?php echo $profile['semail']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Phone number: </label>
                           <?php echo $profile['sphone']?>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-xs-12">
                             <label>Occupation: </label>
                           <?php echo $profile['soccupation']?>
                        </div>
					
</div>
                     
					
					
					
					
					
					                <div class="form-portlet">
                     <label>Interests In: </label>  
					 
					 	<?php
								if(isset($profile['interests']))
								{
									$arr = explode("/",$profile['interests']);
								}
								else
								{
									$arr = array();
								}
								?>
								
								
                    <div class="row clearfix col-md-12">
                          <div class="form-group clearfix">
					
					  <div class="col-lg-12 col-md-12 col-xs-12">
                                 	<?php
								if(isset($profile['sinterests']))
								{
									$arr = explode("/",$profile['sinterests']);
								}
								else
								{
									$arr = array();
								}
								?>   
								    <?php if (in_array("Vasavi Jayanthi", $arr)) { 
									 ?>
								   <div class="checkbox">
                                <label>
								
							
                                    
									 <?php if (in_array("Vasavi Jayanthi", $arr)) { 
									 ?>
									 Vasavi Jayanthi
									 <?php
									 } 
									 ?>
									</label>
                            </div>
									<?php }
									?>
							  <?php if (in_array("Kalyanams (Balaji, Sri Rama, Narasimha Swami…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                  
									
										 <?php if (in_array("Kalyanams (Balaji, Sri Rama, Narasimha Swami…)", $arr)) { 
									 ?>
									Kalyanams (Balaji, Sri Rama, Narasimha Swami…)
									 <?php
									 } 
									 ?>
									</label>
                            </div><?php }
									?>
                              <?php if (in_array("Cultural Events (Diwali, Dusshera, Ugadhi…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                    
										
									 <?php if (in_array("Cultural Events (Diwali, Dusshera, Ugadhi…)", $arr)) { 
									 ?>
									Cultural Events (Diwali, Dusshera, Ugadhi…)
									 <?php
									 } 
									?>
									</label>
                            </div><?php
									 } 
									 ?>
                              <?php if (in_array("Social Gatherings (Women’s day, picnic, educational discussions…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                   
										
									
									 <?php if (in_array("Social Gatherings (Women’s day, picnic, educational discussions…)", $arr)) { 
									 ?>
									Social Gatherings (Women’s day, picnic, educational discussions…)
									 <?php
									 } 
									?>
									</label>
                            </div><?php
									 } 
									 ?>

                              <?php if (in_array("Online presentations (health, wealth, stocks, tech talk….)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                   
										
									
										 <?php if (in_array("Online presentations (health, wealth, stocks, tech talk….)", $arr)) { 
									 ?>
									Online presentations (health, wealth, stocks, tech talk….)
									 <?php
									 } 
									 ?>
									</label>
                            </div> <?php
									 } 
									 ?>

                           
                         </div>
                           
						   
						   
						   
						   
						   
						</div>   
					</div>   
					
					
					
					</div>   
					
					
					
					
					</div>
                    <!-- Row End -->
                </div>
                <!-- End -->

                <div class="form-portlet">
<?php
if($no_child >=1 )
{
?>                   
				   <h3>Children(s)</h3>
                    <hr>
<?php }
?>
          <div class="row clearfix">
                        
						
						
						<?php
						for($i=0;$i<$no_child;$i++)
						{
						?>
						<div class="child-block visible">
                            <div class="col-sm-12">
                                <h4>Child <?php echo $i+1?> Details</h4></div>
                            <div class="form-group col-lg-4 col-md-6 col-xs-12">
                              <label>First Name: </label>
                              
							 <?php if(isset($child[$i]['firstname'])) echo $child[$i]['firstname'];?>
                            </div>

                            <div class="form-group col-lg-4 col-md-6 col-xs-12">
                               <label>Last Name: </label>
                             
								
								<?php if(isset($child[$i]['lastname'])) echo $child[$i]['lastname'];?>
                            </div>
                            <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                <label>Email Id <!--<span class="required">*</span>--></label>
                               <?php if(isset($child[$i]['email'])) echo $child[$i]['email'];?>
                            </div>
                            <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                <label>Phone number <!--<span class="required">*</span>--></label>
                                <?php if(isset($child[$i]['phone'])) echo $child[$i]['phone'];?>
                            </div>
                            <div class="form-group col-lg-4 col-md-6 col-xs-12">
                                <label>Occupation <!--<span class="required">*</span>--></label>
                                <?php if(isset($child[$i]['occupation'])) echo $child[$i]['occupation'];?>
                            </div>
							
												                <div class="form-portlet form-group col-lg-12 col-md-12 col-xs-12">
                     <label>Interests In: </label>  
					 
					 	<?php
								if(isset($profile['interests']))
								{
									$arr = explode("/",$profile['interests']);
								}
								else
								{
									$arr = array();
								}
								?>
								
								
                    <div class="row clearfix col-md-12">
                          <div class="form-group clearfix">
							  <div class="col-lg-12 col-md-12 col-xs-12">
                                <?php
								if(isset($child[$i]['interests']))
								{
									$arr = explode("/",$child[$i]['interests']);
								}
								else
								{
									$arr = array();
								}
								?>
								    <?php if (in_array("Vasavi Jayanthi", $arr)) { 
									 ?>
								   <div class="checkbox">
                                <label>
								
							
                                    
									 <?php if (in_array("Vasavi Jayanthi", $arr)) { 
									 ?>
									 Vasavi Jayanthi
									 <?php
									 } 
									 ?>
									</label>
                            </div>
									<?php }
									?>
							  <?php if (in_array("Kalyanams (Balaji, Sri Rama, Narasimha Swami…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                  
									
										 <?php if (in_array("Kalyanams (Balaji, Sri Rama, Narasimha Swami…)", $arr)) { 
									 ?>
									Kalyanams (Balaji, Sri Rama, Narasimha Swami…)
									 <?php
									 } 
									 ?>
									</label>
                            </div><?php }
									?>
                              <?php if (in_array("Cultural Events (Diwali, Dusshera, Ugadhi…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                    
										
									 <?php if (in_array("Cultural Events (Diwali, Dusshera, Ugadhi…)", $arr)) { 
									 ?>
									Cultural Events (Diwali, Dusshera, Ugadhi…)
									 <?php
									 } 
									?>
									</label>
                            </div><?php
									 } 
									 ?>
                              <?php if (in_array("Social Gatherings (Women’s day, picnic, educational discussions…)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                   
										
									
									 <?php if (in_array("Social Gatherings (Women’s day, picnic, educational discussions…)", $arr)) { 
									 ?>
									Social Gatherings (Women’s day, picnic, educational discussions…)
									 <?php
									 } 
									?>
									</label>
                            </div><?php
									 } 
									 ?>

                              <?php if (in_array("Online presentations (health, wealth, stocks, tech talk….)", $arr)) { 
									 ?><div class="checkbox">
                                <label>
                                   
										
									
										 <?php if (in_array("Online presentations (health, wealth, stocks, tech talk….)", $arr)) { 
									 ?>
									Online presentations (health, wealth, stocks, tech talk….)
									 <?php
									 } 
									 ?>
									</label>
                            </div> <?php
									 } 
									 ?>

                           
                         </div>
                           
						   
						   </div></div></div>
						   
						   
   </div>
                        <!-- Child 1 End -->
						<?php }
						?>
             </div>
                    
                    <!-- Row End -->
                </div>
                <!-- End -->
                <!--Form Portlet-->
              
                <!-- Start -->
                <!--Form Portlet-->
			   



	<div class="form-group">
                                            <label for="exampleInputPassword1">Status</label>
                                           	<select  name="status" >									  
												    <option value='Active' <?php if($profile['status'] == 'Active') echo "selected"?>>Active</option>
													 <option value='Inactive' <?php if($profile['status'] == 'Inactive') echo "selected"?>>Inactive</option>
												   </select>
												   <input type="hidden" name="id" value="<?php echo $profile['id']?>">
											<div class="alert alert-danger alert-dismissable" id="error" style="display:none;margin:0px"></div>
                                        </div>



										
												   
												   
                 <div class="box-footer">
									
                                        <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                    </div>
               </div>
			   </form>
           

                                </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


    