<!-- Right side column. Contains the navbar and content of the page -->
           <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Roles & Permissions
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        
                        <li class="active">Roles & Permissions</li>
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
                           
                           
							  <form action="<?php echo base_url()?>Permissions/set" role="form" method="post" name="uploadForm" id="uploadForm" enctype="multipart/form-data">	
							
							 <div class="box">
                                <div class="box-body table-responsive">
								
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Role</th>
												<th>Module</th>
                                                <th>VIEW</th>
												<th>ADD</th>
                                               <th>EDIT</th>
                                                <th>DELETE</th>
												
												 
                                            </tr>
                                        </thead>
                                        <tbody>
										
										
										
										<tr>
										<td><b>Staff</b></td>
										<td><!--Appointment Records-->Joined Member Records</td>
										<td><input type="checkbox" name="staff[6][view]" value="1" <?php if($permission[16]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[6][add]" value="1" <?php if($permission[16]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[6][edit]" value="1" <?php if($permission[16]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[6][delete]" value="1" <?php if($permission[16]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										<tr>
										<td><b>Staff</b></td>
										<td><!--Patient Records-->Events</td>
										<td><input type="checkbox" name="staff[3][view]" value="1" <?php if($permission[2]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[3][add]" value="1" <?php if($permission[2]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[3][edit]" value="1" <?php if($permission[2]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[3][delete]" value="1" <?php if($permission[2]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										<tr>
										<td><b>Staff</b></td>
										<td><!--Camp Patient Records--> Gallery</td>
										<td><input type="checkbox" name="staff[8][view]" value="1" <?php if($permission[28]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[8][add]" value="1" <?php if($permission[28]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[8][edit]" value="1" <?php if($permission[28]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[8][delete]" value="1" <?php if($permission[28]["delete"] == 1) echo "checked"?>></td>
										
										</tr>

										
										<tr>
										<td><b>Staff</b></td>
										<td>Staff Records</td>
										<td><input type="checkbox" name="staff[1][view]" value="1" <?php if($permission[0]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[1][add]" value="1" <?php if($permission[0]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[1][edit]" value="1" <?php if($permission[0]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[1][delete]" value="1" <?php if($permission[0]["delete"] == 1) echo "checked"?>></td>
										
										</tr>	


										
										
										
										
										<tr>
										<td><b>Staff</b></td>
										<td>Treasurer Records</td>
										<td><input type="checkbox" name="staff[5][view]" value="1" <?php if($permission[20]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[5][add]" value="1" <?php if($permission[20]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[5][edit]" value="1" <?php if($permission[20]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[5][delete]" value="1" <?php if($permission[20]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										<!--<tr>
										<td><b>Staff</b></td>
										<td>Treasurer Room Records</td>
										<td><input type="checkbox" name="staff[7][view]" value="1" <?php if($permission[24]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[7][add]" value="1" <?php if($permission[24]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[7][edit]" value="1" <?php if($permission[24]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[7][delete]" value="1" <?php if($permission[24]["delete"] == 1) echo "checked"?>></td>
										
										</tr>-->
										
										
										<tr>
										<td><b>Staff</b></td>
										<td>Admin Records</td>
										<td><input type="checkbox" name="staff[2][view]" value="1" <?php if($permission[1]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[2][add]" value="1" <?php if($permission[1]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[2][edit]" value="1" <?php if($permission[1]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[2][delete]" value="1" <?php if($permission[1]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										<tr>
										<td><b>Staff</b></td>
										<td>Super Admin Records</td>
										<td><input type="checkbox" name="staff[4][view]"  value="1" <?php if($permission[3]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[4][add]"  value="1" <?php if($permission[3]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[4][edit]"  value="1" <?php if($permission[3]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[4][delete]"  value="1" <?php if($permission[3]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										
										<tr>
										<td><b>Staff</b></td>
										<td><!--TV SCREEN-->Contact Us Records</td>
										<td><input type="checkbox" name="staff[9][view]" value="1" <?php if($permission[32]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[9][add]" value="1" <?php if($permission[32]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[9][edit]" value="1" <?php if($permission[32]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[9][delete]" value="1" <?php if($permission[32]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Staff</b></td>
										<td>Payment History</td>
										<td><input type="checkbox" name="staff[10][view]" value="1" <?php if($permission[33]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[10][add]" value="1" <?php if($permission[33]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[10][edit]" value="1" <?php if($permission[33]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[10][delete]" value="1" <?php if($permission[33]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Staff</b></td>
										<td>Donate Records</td>
										<td><input type="checkbox" name="staff[11][view]" value="1" <?php if($permission[34]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[11][add]" value="1" <?php if($permission[34]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[11][edit]" value="1" <?php if($permission[34]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="staff[11][delete]" value="1" <?php if($permission[34]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										
										
										<tr>
										<td><b>Treasurer</b></td>
										<td>Joined Member Records</td>
										<td><input type="checkbox" name="Treasurer[6][view]" value="1" <?php if($permission[19]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[6][add]" value="1" <?php if($permission[19]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[6][edit]" value="1" <?php if($permission[19]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[6][delete]" value="1" <?php if($permission[19]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										<tr>
										<td><b>Treasurer</b></td>
										<td>Events</td>
										<td><input type="checkbox" name="Treasurer[3][view]" value="1" <?php if($permission[14]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[3][add]" value="1" <?php if($permission[14]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[3][edit]" value="1" <?php if($permission[14]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[3][delete]" value="1" <?php if($permission[14]["delete"] == 1) echo "checked"?>></td>
										
										</tr>


<tr>
										<td><b>Treasurer</b></td>
										<td>Gallery</td>
										<td><input type="checkbox" name="Treasurer[8][view]" value="1" <?php if($permission[31]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[8][add]" value="1" <?php if($permission[31]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[8][edit]" value="1" <?php if($permission[31]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[8][delete]" value="1" <?php if($permission[31]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										<tr>
										<td><b>Treasurer</b></td>
										<td>Staff Records</td>
										<td><input type="checkbox" name="Treasurer[1][view]" value="1" <?php if($permission[12]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[1][add]" value="1" <?php if($permission[12]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[1][edit]" value="1" <?php if($permission[12]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[1][delete]" value="1" <?php if($permission[12]["delete"] == 1) echo "checked"?>></td>
										
										</tr>


										<tr>
										<td><b>Treasurer</b></td>
										<td>Treasurer Records</td>
										<td><input type="checkbox" name="Treasurer[5][view]" value="1" <?php if($permission[23]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[5][add]" value="1" <?php if($permission[23]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[5][edit]" value="1" <?php if($permission[23]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[5][delete]" value="1" <?php if($permission[23]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										<!--<tr>
										<td><b>Treasurer</b></td>
										<td>Treasurer Room Records</td>
										<td><input type="checkbox" name="Treasurer[7][view]" value="1" <?php if($permission[27]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[7][add]" value="1" <?php if($permission[27]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[7][edit]" value="1" <?php if($permission[27]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[7][delete]" value="1" <?php if($permission[27]["delete"] == 1) echo "checked"?>></td>
										
										</tr>-->
										
										
										
										<tr>
										<td><b>Treasurer</b></td>
										<td>Admin Records</td>
										<td><input type="checkbox" name="Treasurer[2][view]" value="1" <?php if($permission[13]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[2][add]" value="1" <?php if($permission[13]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[2][edit]" value="1" <?php if($permission[13]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[2][delete]" value="1" <?php if($permission[13]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										<tr>
										<td><b>Treasurer</b></td>
										<td>Super Admin Records</td>
										<td><input type="checkbox" name="Treasurer[4][view]"  value="1" <?php if($permission[15]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[4][add]"  value="1" <?php if($permission[15]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[4][edit]"  value="1" <?php if($permission[15]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[4][delete]"  value="1" <?php if($permission[15]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										
										<tr>
										<td><b>Treasurer</b></td>
										<td>Contact Us Records</td>
										<td><input type="checkbox" name="Treasurer[9][view]" value="1" <?php if($permission[41]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[9][add]" value="1" <?php if($permission[41]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[9][edit]" value="1" <?php if($permission[41]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[9][delete]" value="1" <?php if($permission[41]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Treasurer</b></td>
										<td>Payment History</td>
										<td><input type="checkbox" name="Treasurer[10][view]" value="1" <?php if($permission[42]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[10][add]" value="1" <?php if($permission[42]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[10][edit]" value="1" <?php if($permission[42]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[10][delete]" value="1" <?php if($permission[42]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Treasurer</b></td>
										<td>Donate Records</td>
										<td><input type="checkbox" name="Treasurer[11][view]" value="1" <?php if($permission[43]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[11][add]" value="1" <?php if($permission[43]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[11][edit]" value="1" <?php if($permission[43]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="Treasurer[11][delete]" value="1" <?php if($permission[43]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										
										<tr>
										<td><b>Admin</b></td>
										<td>Joined Member Records</td>
										<td><input type="checkbox" name="admin[6][view]" value="1" <?php if($permission[17]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[6][add]" value="1" <?php if($permission[17]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[6][edit]" value="1" <?php if($permission[17]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[6][delete]" value="1" <?php if($permission[17]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										<tr>
										<td><b>Admin</b></td>
										<td>Events</td>
										<td><input type="checkbox" name="admin[3][view]" value="1" <?php if($permission[6]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[3][add]" value="1" <?php if($permission[6]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[3][edit]" value="1" <?php if($permission[6]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[3][delete]" value="1" <?php if($permission[6]["delete"] == 1) echo "checked"?>></td>
										
										</tr>


<tr>
										<td><b>Admin</b></td>
										<td>Gallery</td>
										<td><input type="checkbox" name="admin[8][view]" value="1" <?php if($permission[29]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[8][add]" value="1" <?php if($permission[29]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[8][edit]" value="1" <?php if($permission[29]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[8][delete]" value="1" <?php if($permission[29]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Admin</b></td>
										<td>Staff Records</td>
										<td><input type="checkbox" name="admin[1][view]" value="1" <?php if($permission[4]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[1][add]" value="1" <?php if($permission[4]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[1][edit]" value="1" <?php if($permission[4]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[1][delete]" value="1" <?php if($permission[4]["delete"] == 1) echo "checked"?>></td>
										</tr>	


	<tr>
										<td><b>Admin</b></td>
										<td>Treasurer Records</td>
										<td><input type="checkbox" name="admin[5][view]" value="1" <?php if($permission[7]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[5][add]" value="1" <?php if($permission[7]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[5][edit]" value="1" <?php if($permission[7]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[5][delete]" value="1" <?php if($permission[7]["delete"] == 1) echo "checked"?>></td>
										
										</tr>

<!--<tr>
										<td><b>Admin</b></td>
										<td>Treasurer Room Records</td>
										<td><input type="checkbox" name="admin[7][view]" value="1" <?php if($permission[25]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[7][add]" value="1" <?php if($permission[25]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[7][edit]" value="1" <?php if($permission[25]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[7][delete]" value="1" <?php if($permission[25]["delete"] == 1) echo "checked"?>></td>
										
										</tr>-->
										
										
										<tr>
										<td><b>Admin</b></td>
										<td>Admin Records</td>
										<td><input type="checkbox" name="admin[2][view]" value="1" <?php if($permission[5]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[2][add]" value="1"  <?php if($permission[5]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[2][edit]" value="1"  <?php if($permission[5]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[2][delete]" value="1"  <?php if($permission[5]["delete"] == 1) echo "checked"?>></td>
										</tr>
										<tr>
										<td><b>Admin</b></td>
										<td>Super Admin Records</td>
										<td><input type="checkbox" name="admin[4][view]"  value="1" <?php if($permission[7]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[4][add]"  value="1" <?php if($permission[7]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[4][edit]"  value="1" <?php if($permission[7]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[4][delete]"  value="1" <?php if($permission[7]["delete"] == 1) echo "checked"?>></td>
										</tr>
										
										
										
										<tr>
										<td><b>Admin</b></td>
										<td>Contact Us Records</td>
										<td><input type="checkbox" name="admin[9][view]" value="1" <?php if($permission[35]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[9][add]" value="1" <?php if($permission[35]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[9][edit]" value="1" <?php if($permission[35]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[9][delete]" value="1" <?php if($permission[35]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Admin</b></td>
										<td>Payment History</td>
										<td><input type="checkbox" name="admin[10][view]" value="1" <?php if($permission[36]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[10][add]" value="1" <?php if($permission[36]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[10][edit]" value="1" <?php if($permission[36]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[10][delete]" value="1" <?php if($permission[36]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Admin</b></td>
										<td>Donate Records</td>
										<td><input type="checkbox" name="admin[11][view]" value="1" <?php if($permission[37]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[11][add]" value="1" <?php if($permission[37]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[11][edit]" value="1" <?php if($permission[37]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="admin[11][delete]" value="1" <?php if($permission[37]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										
										<tr>
										<td><b>SuperAdmin</b></td>
										<td>Joined Member Records</td>
										<td><input type="checkbox" name="superadmin[6][view]" value="1" <?php if($permission[18]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[6][add]" value="1" <?php if($permission[18]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[6][edit]" value="1" <?php if($permission[18]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[6][delete]" value="1" <?php if($permission[18]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
										
										<tr>
										<td><b> SuperAdmin</b></td>
										<td>Events</td>
										<td><input type="checkbox" name="superadmin[3][view]" value="1" <?php if($permission[10]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[3][add]" value="1" <?php if($permission[10]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[3][edit]" value="1" <?php if($permission[10]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[3][delete]" value="1" <?php if($permission[10]["delete"] == 1) echo "checked"?>></td>
										
										</tr>


<tr>
										<td><b>SuperAdmin</b></td>
										<td>Gallery</td>
										<td><input type="checkbox" name="superadmin[8][view]" value="1" <?php if($permission[30]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[8][add]" value="1" <?php if($permission[30]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[8][edit]" value="1" <?php if($permission[30]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[8][delete]" value="1" <?php if($permission[30]["delete"] == 1) echo "checked"?>></td>
										
										</tr>											
										<tr>
										<td><b>Super Admin</b></td>
										<td>Staff Records</td>
										<td><input type="checkbox" name="superadmin[1][view]" value="1" <?php if($permission[8]["view"] == 1) echo "checked"?> ></td>
										<td><input type="checkbox" name="superadmin[1][add]" value="1" <?php if($permission[8]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[1][edit]" value="1" <?php if($permission[8]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[1][delete]" value="1" <?php if($permission[8]["delete"] == 1) echo "checked"?>></td>
										</tr>


	<tr>
										<td><b>Super Admin</b></td>
										<td>Treasurer Records</td>
										<td><input type="checkbox" name="superadmin[5][view]" value="1" <?php if($permission[22]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[5][add]" value="1" <?php if($permission[22]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[5][edit]" value="1" <?php if($permission[22]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[5][delete]" value="1" <?php if($permission[22]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
<!--<tr>
										<td><b>Super Admin</b></td>
										<td>Treasurer Room Records</td>
										<td><input type="checkbox" name="superadmin[7][view]" value="1" <?php if($permission[26]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[7][add]" value="1" <?php if($permission[26]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[7][edit]" value="1" <?php if($permission[26]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[7][delete]" value="1" <?php if($permission[26]["delete"] == 1) echo "checked"?>></td>
										
										</tr>-->
										
										<tr>
										<td><b>Super Admin</b></td>
										<td>Admin Records</td>
										<td><input type="checkbox" name="superadmin[2][view]" value="1" <?php if($permission[9]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[2][add]" value="1" <?php if($permission[9]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[2][edit]" value="1" <?php if($permission[9]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[2][delete]" value="1" <?php if($permission[9]["delete"] == 1) echo "checked"?>></td>
										</tr>
										<tr>
										<td><b>Super Admin</b></td>
										<td>Super Admin Records</td>
										<td><input type="checkbox" name="superadmin[4][view]"  value="1" <?php if($permission[11]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[4][add]"  value="1" <?php if($permission[11]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[4][edit]"  value="1" <?php if($permission[11]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[4][delete]"  value="1" <?php if($permission[11]["delete"] == 1) echo "checked"?>></td>
										</tr>
										
										
										<tr>
										<td><b>Super Admin</b></td>
										<td>Contact Us Records</td>
										<td><input type="checkbox" name="superadmin[9][view]" value="1" <?php if($permission[38]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[9][add]" value="1" <?php if($permission[38]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[9][edit]" value="1" <?php if($permission[38]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[9][delete]" value="1" <?php if($permission[38]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Super Admin</b></td>
										<td>Payment History</td>
										<td><input type="checkbox" name="superadmin[10][view]" value="1" <?php if($permission[39]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[10][add]" value="1" <?php if($permission[39]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[10][edit]" value="1" <?php if($permission[39]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[10][delete]" value="1" <?php if($permission[39]["delete"] == 1) echo "checked"?>></td>
										
										</tr>										
										<tr>
										<td><b>Super Admin</b></td>
										<td>Donate Records</td>
										<td><input type="checkbox" name="superadmin[11][view]" value="1" <?php if($permission[40]["view"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[11][add]" value="1" <?php if($permission[40]["add"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[11][edit]" value="1" <?php if($permission[40]["edit"] == 1) echo "checked"?>></td>
										<td><input type="checkbox" name="superadmin[11][delete]" value="1" <?php if($permission[40]["delete"] == 1) echo "checked"?>></td>
										
										</tr>
															
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
                       <button type="submit" name="Submit" class="btn btn-primary">Submit</button>

</form>					   </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        

 