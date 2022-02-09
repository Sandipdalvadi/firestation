<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Admin
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Admin</li>
                    </ol>
                </section>


                <!-- Main content -->   <!-- Main content -->
                <section class="content">
				<?php
				if($permissions['add'] == 1 )
				{
				?>
								<div >
									<a href="<?php echo base_url()?>Adminmember/add"><button style="margin:3px;float:left" class="btn btn-success btn-sm">ADD Admin</button></a>
								</div>
				<?php }
				?>
                    <div class="row">
					
                               
                        <div class="col-xs-12">
                           
                           
								
							
							 <div class="box">
                                <div class="box-body table-responsive">
								
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR. NO.</th>
                                                <th>Name</th>
												<th>Contact Number</th>
                                               <th>Email</th>
                                              <th>Status</th>
												 <th>Action</th>
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
												  <td><?php echo $row['status']?></td>
												
												
												<td>
													<?php
				if($permissions['edit'] == 1 )
				{
				?>
												<a href="<?php echo base_url()?>Adminmember/edit/<?php echo $row['id'];?>"><button class="btn btn-success btn-sm">Edit</button></a>  
												
				<?php }
?>				
												
													<?php
				if($permissions['delete'] == 1 )
				{
				?><a href="<?php echo base_url()?>Adminmember/status/<?php echo $row['id'];?>" onclick="return confirm('Are you sure want to Delete?')"><button class="btn btn-danger btn-sm">Delete</button>
												</a>
				<?php }
				?></td>
				
				
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


        

 