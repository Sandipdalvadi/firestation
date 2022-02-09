<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Contact Us Data
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Contact Us Data</li>
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
                                                <th>First Name</th>											
												<th>Last Name</th>
												<th>Email</th>	
												<th>Phone</th>
												<th>Message</th>
												<th>Date</th>			
												
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
									
											$i=0;
											 
												  foreach($data as $key =>$row){
												  
												  $i++;
										?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                                                   
												  <td><?php echo $row['first_name']?></td>
												   <td><?php echo $row['last_name']?></td> 
 <td><?php echo $row['email']?></td>           												   
												  <td><?php echo $row['phone']?></td>
												    
												   <td><?php echo $row['message']?></td>
												   <td><?php echo $row['created_at']?></td>
											
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


        

 