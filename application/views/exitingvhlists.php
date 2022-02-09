
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Existing Vehicle Entry  </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
	  <div class="container-fluid">
	   <?php echo  $this->session->flashdata('message'); ?>
  <div class="form-group row">
    
    <div class="col-sm-12" style="background-color:#d8e1f0;">
	  <?php  //if($_SESSION["loginid"] == 'superadmin' || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3 || $_SESSION['login_role'] == 4 || $_SESSION['login_role'] == 8)
		  if(true)
              {
                  ?>
         <form method="POST" action="<?php echo base_url()?>Exitingvhlists/save" enctype="multipart/form-data">
						<div class="form-group row">
						<div class="col-sm-offset-1 col-sm-5">
						
						<div class="input-group">
					
                        
						
						<label class="col-sm-6 col-form-label">TR Number</label>
                        <div class="form-group row">
						<input type="text" class="form-control" required name="trno" value="<?php if (!empty($_POST['trno']))  echo $_POST['trno']; ?>">
                        </div>  
						<div class="error"><?php if(!empty($error["trno"])) echo $error["trno"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label">Vehicle Number *</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="vhno" value="<?php if (!empty($_POST['vhno']))  echo $_POST['vhno']; ?>" required>
                        </div>  
						<div class="error"><?php if(!empty($error["vhno"])) echo $error["vhno"]; ?>
						</div></div> 
							
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Vehicle Make</label>
							<div class="form-group row">
								<!--<select class="form-control show-tick" name="vhmake" id="vhmake">  
						<option value="">Select Make</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM vehicle_make_masters ORDER BY vehicle_make ASC");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ ?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['vhmake'])) { if ($fetch222['vhmake']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['vehicle_make'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } */?>
                        </select>-->


<select required class="form-control show-tick" name="vhmake" id="vehicle_make_masters_id">  
						<option value="">Select Make</option>		
						<?php 
						$sql = "SELECT * FROM vehicle_make_masters  ORDER BY id DESC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){					   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['vehicle_make'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
                        </select>

						
							</div>
							<div class="error"><?php if(!empty($error["vMake"])) echo $error["vMake"]; ?>
							</div></div>
							
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Vehicle Type</label>
							<div class="form-group row">
						<select class="form-control show-tick" name="vhsubmodel" id="vehicle_type_masters_id">  
					
						
                        </select>    
							</div>
							</div>
							
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Vehicle Variant</label>
							<div class="form-group row">
							<select class="form-control show-tick" name="vhmodel" id="vehicle_varient_masters_id">  
					
						
                        </select> 
							</div>
							</div>
							
							
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Description</label>
							<div class="form-group row">
								<select class="form-control show-tick" name="vehicle_description" id="vehicle_description">  
						<option value="">Select Description</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM description_by_vehicle_type_masters ORDER BY name ASC");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ ?>		 
						<option value="<?php echo $rowMakes['name'];?>" <?php if(!empty($fetch222['vehicle_make_masters_id'])) { if ($fetch222['vehicle_make_masters_id']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } */ ?>
						
							
						<?php 
						$sql = "SELECT * FROM description_by_vehicle_type_masters  ORDER BY name ASC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows222 = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows222 as $key=>$rows2){					   ?>		 
						<option value="<?php echo $rows2['id'];?>" ><?php echo $rows2['name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
						
                        </select>
							</div>
							</div>
							
							
							
							
							
							
							
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Chasis Number *</label>
							<div class="form-group row">
								<input type="text" class="form-control" name="chassisNo" value="<?php if (!empty($_POST['chassisNo']))  echo $_POST['chassisNo']; ?>" required>
							</div>
							</div>
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="">Fuel Type</label>
							<div class="form-group row">
							<select class="form-control" id="fuelType" name="fuelType" >
							<option value="">Select Fuel</option>		 
							<option value="Petrol" <?php if (!empty($_POST['fuelType'])) { if($_POST['fuelType']=='Petrol') { echo 'selected'; } } ?> >Petrol</option>
							<option value="Diesel" <?php if (!empty($_POST['fuelType'])) { if($_POST['fuelType']=='Diesel') { echo 'selected'; } } ?> >Diesel</option>
					
							</select> 
							</div>
							<div class="error"><?php if(!empty($error["fuelType"])) echo $error["fuelType"]; ?>
							</div></div> 
					
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">RC registration Date *</label>
                        <div class="form-group row">
						<input type="date" class="form-control datepicker" name="dlrDate" value="<?php if (!empty($_POST['dlrDate']))  echo $_POST['dlrDate']; ?>" placeholder="Please choose a date..." required>
                        </div>  
						<div class="error"><?php if(!empty($error["dlrDate"])) echo $error["dlrDate"]; ?>
						</div></div> 
						
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">RC Expiry Date </label>
                        <div class="form-group row">
						<input type="date" class="form-control datepicker" name="expiryDt" disabled value="<?php if (!empty($_POST['expiryDt']))  echo $_POST['expiryDt']; ?>" placeholder="Please choose a date..." >
                        </div>  
						<div class="error"><?php if(!empty($error["dlrDate"])) echo $error["dlrDate"]; ?>
						</div></div> 
						</div>
						<div class=" col-sm-5">
					
					
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Present Condition of Vehicles</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="present_condition" value="<?php if (!empty($_POST['present_condition']))  echo $_POST['present_condition']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["slNo"])) echo $error["slNo"]; ?>
						</div></div> 	
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">GPS status</label>
                        <div class="form-group row">
						<select class="form-control" name="gps_status">
			        <option value="Attached">Attached</option>
			        <option value="Not Attached">Not Attached</option>
			       
			        </select>
                        </div>  
					</div> 	
					
					
					<div class="input-group">
							<label class="col-sm-6 col-form-label" class="">Category</label>
							<div class="form-group row">
							<select class="form-control" id="vhCat" name="vhCat" >
							<option value="">Select Category</option>		
							<?php /*$getAllcat=mysql_query("SELECT * FROM vehicle_category_masters");
							if(!empty($getAllcat)) {
							while($rowCat = mysql_fetch_assoc($getAllcat)){ ?>		 
							<option value="<?php echo $rowCat['vehicle_category'];?>" <?php if (!empty($_POST['vhCat'])) { if($_POST['vhCat']==$rowCat['vehicle_category']) { echo 'selected'; } } ?> ><?php echo $rowCat['vehicle_category'];?></option>			 
							<?php  }
							}else{
							echo '<option value="">vehicle category Not Available</option>';
							}*/

							?>
							
							<?php 
						$sql = "SELECT * FROM vehicle_category_masters  ORDER BY vehicle_category ASC";
						$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows222 = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows222 as $key=>$rowMakes){					   ?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['vehicle_category'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Not Available</option>';
                        } ?>
						
						
							</select> 
							</div>
							<div class="error"><?php if(!empty($error["vhCat"])) echo $error["vhCat"]; ?>
							</div></div> 
							
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Engine No *</label>
							<div class="form-group row">
								<input type="text" class="form-control" name="engineNo" value="<?php if (!empty($_POST['engineNo']))  echo $_POST['engineNo']; ?>" required>
							</div>
							</div>
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">KMPL *</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="kmpl" value="<?php if (!empty($_POST['kmpl']))  echo $_POST['kmpl']; ?>" placeholder="KMPL" required>
                        </div>  
						<div class="error"><?php if(!empty($error["slNo"])) echo $error["slNo"]; ?>
						</div></div>
						
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Current Meter Reading *</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="current_meter_reading" value="<?php if (!empty($_POST['current_meter_reading']))  echo $_POST['current_meter_reading']; ?>" placeholder="Current Meter Reading" required>
                        </div>  
						<div class="error"><?php if(!empty($error["slNo"])) echo $error["slNo"]; ?>
						</div></div>
						
						

<div class="input-group">

<select class="form-control show-tick  select2" required  name="district_unit" id="district_unit">  
						<option value="">Select District</option>		
						<?php 
						
						/*$getAllmakes=mysql_query("SELECT * FROM units_masters ORDER BY id ASC");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){
*/

	$sql = "SELECT * FROM units_masters  ORDER BY id DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){				


							?>		 
						<option value="<?php echo $rowMakes['id'];?>" ><?php echo $rowMakes['unit_name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select></div>
						
						
						
						
						
							<div class="">
						<div class="form-check">
  <input class="form-check-input" type="radio" value="1" checked name="service_type" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
   Servicabe
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="2" name="service_type" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Un Servicabe
  </label>
</div>  </div>
						
						
						
						
						
					
						</div>
						</div>	
						
						<div class="form-group row">
						    
						
					 <center>	<button  type="submit" name="addEntry"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="40"></button></center>
						</form> 
						<?php } ?>		
      
      </div>
      <!--<div id="Show_Description" class="col-sm-12" style="background-color:#d8e1f0;">
          </div>-->
      <div class="col-md-12" style="background-color:#d8e1f0;">
<div class="box-body"><table id="examplecom" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
                <th>District</th> 
              <th>TR Number</th>
						   <th>Vehicle Number</th>
						   <th>Make</th>
						   <th>Type</th>
						   <th>Variant</th>		
					<th>Service Type</th>		
						   
                
              </tr>
            </thead>
            <tbody>
              <?php
              
               /*if($_SESSION["loginid"] == 'superadmin'  || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3 || $_SESSION['login_role'] == 5 || $_SESSION['login_role'] == 8)
              {
                 
			  $totalInvoices = mysql_query("SELECT * FROM vehicleD  ORDER BY vhid DESC");
              }else{
                   $totalInvoices = mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION["loginid"]."' OR updated_by = '".$_SESSION['district']."'  ORDER BY vhid DESC");
              }
			  */
			  //$totalInvoices = mysql_query("SELECT * FROM vehicleD  ORDER BY vhid DESC");
			  
			  $sql = "SELECT * FROM vehicleD where 1  ";
			  if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
			
		}
		else
		{
			//$sql .= "  and local_entry_unit_id='".$this->session->userdata('unit')."'";
		}
			 
$sqlD = "select * from users_districts where user_id='".$this->session->userdata('loginUser')."'";
						$nd= $this->db->query($sqlD)->num_rows();
						if($nd >=1 )
						{
							$rowsD = $this->db->query($sqlD)->result_array();
							$idd = 0;
							foreach($rowsD as $keyD=>$rowMakesD){
								$idd .= ",".$rowMakesD["district_id"];
							}
							$sql .= " AND local_entry_unit_id in (".$idd.") ";
						}
						
			//and local_entry_unit_id

			 $sql .= "  and local_entry_unit_id IS NOT NULL AND local_entry_unit_id !=''  ORDER BY vhid DESC";
			 
			 //echo $sql;die;
			$totalInvoices = $this->db->query($sql)->num_rows();
					
					
					
				  	$count = 0;
					$tot = 0;
					//if(mysql_num_rows($totalInvoices) > 0)
					//{
				  // while($row = mysql_fetch_array($totalInvoices)) { 
				  if($totalInvoices > 0)
					{
				  $rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){	
				   $count++;
				    $tot = $tot+$row['total_income'];
					
					
					
					//make
					$rmd1['unit_name'] = '';
					if($row['vhmake'] != '' && $row['vhmake'] != null )
					{
					 $sql = "SELECT * FROM  units_masters WHERE id = ".$row['local_entry_unit_id']."";
				
					$rmd1 = $this->db->query($sql)->row_array();
					}
					//print_r($rmd1);die;
					
					
					
					//make
					$rm1['vehicle_make'] = '';
					if($row['vhmake'] != '' && $row['vhmake'] != null )
					{
					$sql = "SELECT * FROM  vehicle_make_masters WHERE id = ".$row['vhmake']."";
					$rm1 = $this->db->query($sql)->row_array();
					}
					//model
					$rm2['vehicle_model'] = '';
					if($row['vhmodel'] != '' && $row['vhmodel'] != null )
					{
					$sql = "SELECT * FROM  vehicle_variant_masters WHERE id = ".$row['vhmodel']."";
					$rm2 = $this->db->query($sql)->row_array();
					}
					$rm3['vehicle_type'] = '';
					if($row['vhsubmodel'] != '' && $row['vhsubmodel'] != null )
					{
					$sql = "SELECT * FROM  vehicle_type_masters WHERE id = ".$row['vhsubmodel']."";
					$rm3 = $this->db->query($sql)->row_array();
					}
				    
				   ?>
               <tr>
                <td><?php echo $rmd1['unit_name']; ?></td>
                <td><?php echo $row['trno']; ?></td>
                 <td><?php echo $row['vhno']; ?></td>
                 <td><?php echo $rm1['vehicle_make']; ?></td>
                  <td><?php echo $rm2['vehicle_variant']; ?></td>
                   <td><?php echo $rm3['vehicle_type']; ?></td>
                   
                   
                <th><?php echo ($row['service_type'])=="2"?'Unservicable':'Servicable'; ?></th>		
			 
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  } ?>
            </tbody>
            
            
          </table></div>
          </div>
  </div>
</div>
	  
	 
	 
      <!-- /.form-group row -->
      <!-- Main form-group row -->
      
      <!-- /.form-group row (main form-group row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --></div>