<div class="content-wrapper"><!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Vehicles Received from C.O   </h1>
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
	  <?php  if($_SESSION["loginid"] == 'superadmin' || $_SESSION['login_role'] == 3 || $_SESSION['login_role'] == 5 || true)
              {
                  ?>
         <form method="POST" action="<?php echo base_url()?>Vhlists/save" enctype="multipart/form-data">
						<div class="form-group row">
						<div class="col-sm-offset-1 col-sm-5">
						<div class="input-group">
					
                        
						
						<label class="col-sm-6 col-form-label">Tender Number</label>
                        <div class="form-group row">
					<select class="form-control select2" name="tender_number" id="tender_number">  
						<option value=""> Select tender number</option>		
						<?php /*$tenders_details=mysql_query("SELECT DISTINCT tender_number FROM tenders_details");
						if(!empty(mysql_num_rows($tenders_details)))
						 {
					
						while($rowMakes = mysql_fetch_array($tenders_details)){ 
						*/
						
							$sql = "SELECT DISTINCT tender_number, b.qty as qty FROM tenders_details_new a INNER JOIN tenders_details_new_details b ON a.id=b.tenders_details_new_id and b.item_cat='Vehicle'";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){


$sqlc = "select count(*) as cnr from vehicleD where tender_number='".$rowMakes['tender_number']."'";
$rowc = $this->db->query($sqlc)->row_array();
$net = 	$rowMakes['qty'] - $rowc['cnr'];					
						if($net > 0 )
						{
						?>		 
						<option value="<?php echo $rowMakes['tender_number'];?>" <?php if(!empty($row['tender_number'])) { if ($rowMakes['tender_number']==$row['tender_number']) { echo 'selected'; } } ?>><?php echo $rowMakes['tender_number'];?> (<?php echo $net;?>)</option>			 
                        <?php  }
					}
                        } ?>
                        </select>
                        </div>  
						<div class="error"><?php if(!empty($error["trno"])) echo $error["trno"]; ?>
						</div></div> 
						<div class="input-group">
					
                        
						
						<label class="col-sm-6 col-form-label">TR Number</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="trno" value="<?php if (!empty($_POST['trno']))  echo $_POST['trno']; ?>">
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
								<select class="form-control show-tick" name="vhmake" id="vehicle_make_masters_id">  
						<option value="">Select Make</option>		
						<?php /*$getAllmakes=mysql_query("SELECT * FROM vehicle_make_masters ORDER BY vehicle_make ASC");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ 
						*/
						
							$sql = "SELECT * FROM vehicle_make_masters ORDER BY vehicle_make ASC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){				
						
						?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['vhmake'])) { if ($fetch222['vhmake']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['vehicle_make'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
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
							<label class="col-sm-6 col-form-label" class="">Category</label>
							<div class="form-group row">
							<select class="form-control" id="vhCat" name="vhCat" >
							<option value="">Select Category</option>		
							<?php /*$getAllcat=mysql_query("SELECT * FROM vehicle_category_masters");
							if(!empty($getAllcat)) {
							while($rowCat = mysql_fetch_assoc($getAllcat)){
							*/
								$sql = "SELECT * FROM vehicle_category_masters";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowCat){				


								?>		 
							<option value="<?php echo $rowCat['vehicle_category'];?>" <?php if (!empty($_POST['vhCat'])) { if($_POST['vhCat']==$rowCat['vehicle_category']) { echo 'selected'; } } ?> ><?php echo $rowCat['vehicle_category'];?></option>			 
							<?php  }
							}else{
							echo '<option value="">vehicle category Not Available</option>';
							} ?>
							</select> 
							</div>
							<div class="error"><?php if(!empty($error["vhCat"])) echo $error["vhCat"]; ?>
							</div></div> 
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Description</label>
							<div class="form-group row">
								<select required  class="form-control show-tick select2" name="vehicle_description" id="vehicle_description">  
						<option value="">Select Description</option>		
						<?php 
						
						/*$getAllmakes=mysql_query("SELECT * FROM description_by_vehicle_type_masters ORDER BY name ASC");
						if(!empty(mysql_num_rows($getAllmakes)))
						 {
					
						while($rowMakes = mysql_fetch_array($getAllmakes)){ 
						*/
							$sql = "SELECT * FROM description_by_vehicle_type_masters ORDER BY name ASC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$rowMakes){				
						
						?>		 
						<option value="<?php echo $rowMakes['id'];?>" <?php if(!empty($fetch222['vehicle_make_masters_id'])) { if ($fetch222['vehicle_make_masters_id']==$rowMakes['id']) { echo 'selected'; } } ?>><?php echo $rowMakes['name'];?></option>			 
                        <?php  }
                        }else{
                        echo '<option value="">Makes Not Available</option>';
                        } ?>
                        </select>
							</div>
							</div>
							
							
							<div class="input-group">
							<label class="col-sm-6 col-form-label" class="col-sm-6 col-form-label">Engine No *</label>
							<div class="form-group row">
								<input type="text" class="form-control" name="engineNo" value="<?php if (!empty($_POST['engineNo']))  echo $_POST['engineNo']; ?>" required>
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
						<label class="col-sm-6 col-form-label" class="">Cost of the Vehicle</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="vhCost" value="<?php if (!empty($_POST['vhCost']))  echo $_POST['vhCost']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["vhCost"])) echo $error["vhCost"]; ?>
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
						<label class="col-sm-6 col-form-label" class="">Invoice Number</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="invNo" value="<?php if (!empty($_POST['invNo']))  echo $_POST['invNo']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["invNo"])) echo $error["invNo"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Fabricator Name</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="dlrName" value="<?php if (!empty($_POST['dlrName']))  echo $_POST['dlrName']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["dlrName"])) echo $error["dlrName"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Fabricator Address</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="dlrMobi" value="<?php if (!empty($_POST['dlrMobi']))  echo $_POST['dlrMobi']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["dlrMobi"])) echo $error["dlrMobi"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Purchase Order Number</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="pono" value="<?php if (!empty($_POST['pono']))  echo $_POST['pono']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["pono"])) echo $error["pono"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Purchase Order Date</label>
                        <div class="form-group row">
						<input type="date" class="form-control datepicker" name="poDate" value="<?php if (!empty($_POST['poDate']))  echo $_POST['poDate']; ?>" placeholder="Please choose a date..." >
                        </div>  
						<div class="error"><?php if(!empty($error["poDate"])) echo $error["poDate"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Stock Ledger Number</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="stocklNo" value="<?php if (!empty($_POST['stocklNo']))  echo $_POST['stocklNo']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["stocklNo"])) echo $error["stocklNo"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Page Number</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="pageNo" value="<?php if (!empty($_POST['pageNo']))  echo $_POST['pageNo']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["pageNo"])) echo $error["pageNo"]; ?>
						</div></div> 
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">SL NO</label>
                        <div class="form-group row">
						<input type="text" class="form-control" name="slNo" value="<?php if (!empty($_POST['slNo']))  echo $_POST['slNo']; ?>" >
                        </div>  
						<div class="error"><?php if(!empty($error["slNo"])) echo $error["slNo"]; ?>
						</div></div> 						
						
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Present Condition of Vehicles</label>
                        <div class="form-group row">
						<!--<input type="text" class="form-control" name="present_condition" value="<?php if (!empty($_POST['present_condition']))  echo $_POST['present_condition']; ?>" >-->
						
						<select class="form-control" name="present_condition">
			        <option value="Brand New">Brand New</option>
			        <option value="Road Worthy">Road Worthy</option>
			       <option value="Not Road Worthy">Not Road Worthy</option>
			        </select>
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

<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>					
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">KMPL *</label>
                        <div class="form-group row">
						<input onkeypress="return onlyNumberKey(event)" type="text" maxlength=2  class="form-control" name="kmpl" value="<?php if (!empty($_POST['kmpl']))  echo $_POST['kmpl']; ?>" placeholder="KMPL" required>
                        </div>  
						<div class="error"><?php if(!empty($error["slNo"])) echo $error["slNo"]; ?>
						</div></div>
						
						<div class="input-group">
						<label class="col-sm-6 col-form-label" class="">Current Meter Reading *</label>
                        <div class="form-group row">
						<input onkeypress="return onlyNumberKey(event)" maxlength=6   type="text" class="form-control" name="current_meter_reading" value="<?php if (!empty($_POST['current_meter_reading']))  echo $_POST['current_meter_reading']; ?>" placeholder="Current Meter Reading" required>
                        </div>  
						<div class="error"><?php if(!empty($error["slNo"])) echo $error["slNo"]; ?>
						</div></div>
					
						</div>
						</div>	
						
						<div class="form-group row">
						    
						
					 <center><button  type="submit" name="addEntry"><img src="<?php echo base_url()?>assets/img/add-icon.png" height="40"></button></center>
						</form> 
						<?php } ?>		
      
      </div>
      <div id="Show_Description" class="col-sm-12" style="background-color:#d8e1f0;">
          </div>
      <div class="col-sm-12" style="background-color:#d8e1f0;">
<div class="box-body"><table id="examplecom" class="table table-bordered table-hover display nowrap table-responsive" >
            <thead>
              <tr style="background:#428df5; color:#FFFFFF; text-transform:uppercase;">
                  <th>Tender NUmber</th>
              <th>TR Number</th>
						   <th>Vehicle Number</th>
						   <th>Make</th>
						   <th>Type</th>
						   <th>Variant</th>		
					
						   <th></th>
                
              </tr>
            </thead>
            <tbody>
              <?php
              
               if($_SESSION["loginid"] == 'superadmin'  || $_SESSION['login_role'] == 7 || $_SESSION['login_role'] == 3 || $_SESSION['login_role'] == 5)
              {
                 
			  //$totalInvoices = mysql_query("SELECT * FROM vehicleD  ORDER BY vhid DESC");
              }else{
                   //$totalInvoices = mysql_query("SELECT * FROM vehicleD WHERE allotedUnit = '".$_SESSION["loginid"]."'  ORDER BY vhid DESC");
              }
				  	$count = 0;
					$tot = 0;
					//if(mysql_num_rows($totalInvoices) > 0)
					//{
				  // while($row = mysql_fetch_array($totalInvoices)) { 
				  
				  	$sql = "SELECT * FROM vehicleD  where 1  ";
						
				if($this->session->userdata('unit') == '' || $this->session->userdata('unit') == NULL && !is_numeric($this->session->userdata('unit')) )	
		{
			
			
		}
		else
		{
			$sql .= "  and allotedUnit='".$this->session->userdata('unit')."'";
		}
					$sql .= "  ORDER BY vhid DESC";
					$totalInvoices = $this->db->query($sql)->num_rows();
					if($totalInvoices > 0)
					{
						$rows = $this->db->query($sql)->result_array();
				   //while($row = mysqli_fetch_array($totalInvoices)) {
					foreach($rows as $key=>$row){				
				   $count++;
				    $tot = $tot+$row['total_income'];
					
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
					//mysql_query("SELECT * FROM  vehicle_make_masters WHERE id = ".$id."");
  //echo "SELECT * FROM pattern WHERE patern_id  =  '".$id."'";
               // $editres = mysql_fetch_array($find);

               
// return($editres['vehicle_make']);
				    
				   ?>
              <tr>
                 <td><?php echo $row['tender_number']; ?></td>
                <td><?php echo $row['trno']; ?></td>
                 <td><?php echo $row['vhno']; ?></td>
                 <td><?php echo $rm1['vehicle_make']; ?></td>
                  <td><?php echo $rm2['vehicle_variant']; ?></td>
                   <td><?php echo $rm3['vehicle_type']; ?></td>
                   
                   
                
			   <td> <?php  if($_SESSION["loginid"] == 'superadmin' or true)
              {
                  ?>
        <a class="deletemecommon" href="<?php echo base_url()?>Vhlists/delete/<?php echo $row['vhId']; ?>"><img src="<?php echo base_url()?>assets/img/deleteicon.png" height="20"></a>
        <?php } ?>
        </td>
              
               
              </tr>
			  
			  	
            
            
            <?php 
				  }
				  }else { ?>
            <tr bgcolor="">
              <td align="center" colspan="9"><b>No Records Found</b></td>
            </tr>
            <?php } ?>
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
  <!-- /.content-wrapper -->