<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Joined Member
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Joined Member</li>
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
                                <div class="box-body table-responsive">
								
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR. NO.</th>
												<th>Email</th>	
                                                <th>First Name</th>											
												<th>Last Name</th>
												<th>Phone</th>
												<th>Date</th>												
												<th>Membership Type</th>
												<th>Action</th>
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
                                                <td><?php echo $row['email']?></td>                                               
												  <td><?php echo $row['name']?></td>
												   <td><?php echo $row['lastname']?></td>                                               
												  <td><?php echo $row['contact_no']?></td>
												    <td><?php echo $row['created_at']?></td>
												   <td><?php echo $row['membership_type']?></td>
												   <td>
										<select onchange="redirect(<?php echo $row['id']?>,this.value)" >												  
												    <option value='Active' <?php if($row['status'] == 'Active') echo "selected"?>>Active</option>
													 <option value='Inactive' <?php if($row['status'] == 'Inactive') echo "selected"?>>Inactive</option>
												   </select>
												   
												   	<a href="<?php echo base_url()?>Joinedmember/view/<?php echo $row['id'];?>"><button class="btn btn-success btn-sm">View Details</button></a>  
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


      <script>
	  function redirect(id,status)
	  {
		  //alert(id)
		  //alert(status)
		  location.href="<?php echo base_url()?>Joinedmember/changestatus/"+id+"/"+status
	  }
</script>	  

 